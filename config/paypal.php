<?php
return array(
    // set your paypal credential
    'client_id' => 'AQLtEpnl4LQYIlvPlEgKqRtaR-0eGfty487PwrxrKB9cWxoFu8jnpZWvUf47D17Ezac2iyw7_5w0dMMd',
    'secret' => 'EIW8_E5jZRh6CsbLw00_5tMgzhSRMj5RwOopaxJ970NAoRujiOOSuMdSLjwtYVj0ck-KKXxNibKq35V_',

    /**
     * SDK configuration 
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',

        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,

        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,

        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',

        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE',
    ),
);        