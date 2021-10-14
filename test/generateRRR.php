<?php

require_once '../generate_rrr.php';
require_once '../check_connection.php';

$orderId = mt_rand() . date('YmdHis');

$data = array(
    'payerName' => 'Wallace Myem',
    'payerEmail' => 'email@email.com',
    'payerPhone' => '080123456789',
    'totalAmount' => 7000,
    'description' => 'This actually generates RRR',
    'orderId' => $orderId,

);

$jsonData = generateRRR($data);

// $jsonData = substr($get_details, 7, -1);
$response = json_decode($jsonData, true);

//$decode = json_decode($get_details, true);
echo $jsonData; 
echo "\r\n";
echo $response["statuscode"];
echo "\r\n";
echo $response["RRR"];
echo "\r\n";
echo $response["status"];
echo "\r\n";
if (is_connected() === true){
    echo "true";
}else{
    echo "false";
}

;?>