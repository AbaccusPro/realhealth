<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

class PaypalController extends Controller
{
    private $_api_context;
 
	public function __construct()
	{
		// setup PayPal api context
		$paypal_conf = \Config::get('paypal');
		$this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
		$this->_api_context->setConfig($paypal_conf['settings']);
	}

	public function postPayment(){
		$payer = new Payer();
		$payer->setPaymentMethod('paypal');
		
		$subtotal = 0;
		$currency = 'USD';
 
		$item = new Item();
		$item->setName('Fitness Pass')
		->setCurrency($currency)
		->setDescription('Access to the fitness module')
		->setQuantity(1)
		->setPrice(15);

		$subtotal += 15;

		/*$item_list = new ItemList();
		$item_list->setItems($item);*/
 
		$total = $subtotal;
 
		$amount = new Amount();
		$amount->setCurrency($currency)
			->setTotal($total);
		
		$transaction = new Transaction();
		$transaction->setAmount($amount)
			//->setItemList($item_list)
			->setDescription('Pedido de prueba en mi Laravel RealHealth');

		$redirect_urls = new RedirectUrls();
		$redirect_urls->setReturnUrl(\URL::route('payment.status'))
			->setCancelUrl(\URL::route('payment.status'));

		$payment = new Payment();
		$payment->setIntent('Sale')
			->setPayer($payer)
			->setRedirectUrls($redirect_urls)
			->setTransactions([$transaction]);

		try {
			$payment->create($this->_api_context);
		} catch (\PayPal\Exception\PayPalConnectionException $ex) {
			if (\Config::get('app.debug')) {
				echo "Exception: " . $ex->getMessage() . PHP_EOL;
				$err_data = json_decode($ex->getData(), true);
				exit;
			} else {
				die('Ups! Algo salió mal');
			}
		}
		
		foreach($payment->getLinks() as $link) {
			if($link->getRel() == 'approval_url') {
				$redirect_url = $link->getHref();
				break;
			}
		}

		// add payment ID to session
		\Session::put('paypal_payment_id', $payment->getId());
 
		if(isset($redirect_url)) {
			// redirect to paypal
			return \Redirect::away($redirect_url);
		}
 
		return \Redirect('users')
			->with('message', 'Ups! Error desconocido.');
	}

	public function getPaymentStatus(Request $request){
		// Get the payment ID before session clear
		$payment_id = \Session::get('paypal_payment_id');
 
		// clear the session payment ID
		\Session::forget('paypal_payment_id');
 
		$payerId = $request->input('PayerID');
		$token = $request->input('token');
 
		if (empty($payerId) || empty($token)) {
			return \Redirect('users')
				->with('message', 'Hubo un problema al intentar pagar con Paypal');
		}
 
		$payment = Payment::get($payment_id, $this->_api_context);
 
		$execution = new PaymentExecution();
		$execution->setPayerId($payerId);
 
		$result = $payment->execute($execution, $this->_api_context);
 
 
		if ($result->getState() == 'approved') {
 
			//$this->saveOrder();
 
			return \Redirect('users')
				->with('message', 'Compra realizada de forma correcta');
		}
		return \Redirect('users')
			->with('message', 'La compra fue cancelada');
	}

	public function pay(){

		return view('payment.pay');
	}


}
