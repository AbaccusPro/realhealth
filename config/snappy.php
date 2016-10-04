<?php

return array(


    'pdf' => array(
        'enabled' => true,
        'binary'  => 'C:\wkhtmltopdf\bin\wkhtmltopdf',
                     //'/usr/local/bin/wkhtmltopdf.sh',
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),
    'image' => array(
        'enabled' => true,
        'binary'  => '/usr/local/bin/wkhtmltoimage',
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),


);
