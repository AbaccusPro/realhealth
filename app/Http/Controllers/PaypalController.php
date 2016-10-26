<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

//se agregan las librerias pertenecientes a la api de paypal
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
    //variable global del controlador que hace referencia al contexto de la api de paypal
    private $_api_context;
 	
	public function __construct()
	{
		// setup PayPal api context
		$paypal_conf = \Config::get('paypal'); //en esta linea de codigo estamos trayendo la configuración que esta en el archivo que se encuentra en la carpeta config/paypal.php
		$this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
		$this->_api_context->setConfig($paypal_conf['settings']);
	}

	public function postPayment(){
		//este es el metodo para crear la compra de paypal
		//se crea un objeto de tipo payery se le asigna el metodo paypal
		$payer = new Payer();
		$payer->setPaymentMethod('paypal');
		
		//variables que se utilizan para el pago
		$subtotal = 0; //subtotal en caso que exista mas de un pago
		$currency = 'USD'; // el tipo de moneda a utilizar

		//se crea el nuevo item 
		$item = new Item();
		//se asignan sus atributos... en la documentacion de paypal se pueden ver que tipo de tributos permite este objeto.
		$item->setName('Fitness Pass')
		->setCurrency($currency)
		->setDescription('Access to the fitness module')
		->setQuantity(1)
		->setPrice(15);

		//el subtotal  cambia de avlor en base a los items que sean.. en este caso solo es uno
		$subtotal += 15;

		/*$item_list = new ItemList();
		$item_list->setItems($item);*/
 
 		//se crea el total
		$total = $subtotal;
 
 		//se crea el monto y se le asignansus atiributos
		$amount = new Amount();
		$amount->setCurrency($currency)
			->setTotal($total);
		
		//se crea la transaccion y se le asignan sus atributos
		$transaction = new Transaction();
		$transaction->setAmount($amount)
			//->setItemList($item_list) esta comentado porque como solo es un articulo no tiene caso agregarle el item lost.. ademas daba error por la estructura del json que generaba... para este caso no es necesario trabajar con mas de un item, ya que el pago solo sera por una suscripció, no obstante dejo la referencia por si es necesario procesar mas de un modulo o no se como lo vayan a manejar.
			->setDescription('Pedido de prueba en mi Laravel RealHealth');

		//el redireccionado de url que basicamente trabaja con las url de la api de paypal
		$redirect_urls = new RedirectUrls();
		$redirect_urls->setReturnUrl(\URL::route('payment.status'))
			->setCancelUrl(\URL::route('payment.status'));

		//el nuevo pago
		$payment = new Payment();
		$payment->setIntent('Sale')//el tipo de pago es tipo sale pero existen otros este hace referencia a efectivo... estos tipos se pueden ver en la doc de la api de paypal.
			->setPayer($payer)//se pasa el pago
			->setRedirectUrls($redirect_urls)// se pasan la urls
			->setTransactions([$transaction]); //se pasa la transaccion

		//se utiliza try catch para ver el tipo de error en cso que algo salga mal con la transacción
		try {
			$payment->create($this->_api_context); //se crea el pago refiriendonos a la api context
		} catch (\PayPal\Exception\PayPalConnectionException $ex) {
			if (\Config::get('app.debug')) {
				//si algo sale mal va a imprimir el mensaje de error en pantalla
				echo "Exception: " . $ex->getMessage() . PHP_EOL;
				$err_data = json_decode($ex->getData(), true);
				exit;
			} else {
				die('Ups! Algo salió mal');
			}
		}
		
		// se menajen los links de pago 
		foreach($payment->getLinks() as $link) {
			if($link->getRel() == 'approval_url') {
				$redirect_url = $link->getHref();
				break;
			}
		}

		// add payment ID to session (variable de sesion donde se gaurda el id del pago)
		\Session::put('paypal_payment_id', $payment->getId());
 
 		//si la variable $redirect_url no esta definida se redirecciona
		if(isset($redirect_url)) {
			// redirect to paypal
			return \Redirect::away($redirect_url);
		}
 
 		//si todo sale bien se redirecciona a la variable 
		return \Redirect('users')
			->with('message', 'Ups! Error desconocido.');
	}

	public function getPaymentStatus(Request $request){
		// Get the payment ID before session clear
		$payment_id = \Session::get('paypal_payment_id');
 
		// clear the session payment ID
		\Session::forget('paypal_payment_id');
 		
 		// se obtiene el PayerID y el token en base a el pago que se realizo en la pagina de paypal
		$payerId = $request->input('PayerID');
		$token = $request->input('token');
 
 		//si alguno de los dos elementos esta vacio el pago no se realiza y se redirecciona a la ruta de usuarios con un mensaje de error
		if (empty($payerId) || empty($token)) {
			return \Redirect('users')
				->with('message', 'Hubo un problema al intentar pagar con Paypal');
		}
 
 		// se crea una variable con el contexto de paypal y el id del pago
		$payment = Payment::get($payment_id, $this->_api_context);
 
 		//se crea el objeto de ejecucion y se ejecuta el pago y se le asigna el id del pago..
		$execution = new PaymentExecution();
		$execution->setPayerId($payerId);
 
 		//finalmente se ejecuta toda la operación en la variable $result
		$result = $payment->execute($execution, $this->_api_context);
 
 		//si el resultado es aprovado
		if ($result->getState() == 'approved') {
 
			//$this->saveOrder(); //aqui se deberia guardar todo lo necesario en la base de datos..
 			
 			//se redirecciona a la ruta de usuarios con el mensaje de confirmación
			return \Redirect('users')
				->with('message', 'Compra realizada de forma correcta');
		}
		//de lo contrario se le manda el mensaje de error de que la compra fue rechazada
		return \Redirect('users')
			->with('message', 'La compra fue cancelada');
	}

	public function pay(){
		//se retorna la vista de pago de paypal
		return view('payment.pay');
	}


}
