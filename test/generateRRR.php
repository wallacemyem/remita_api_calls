<?php

require_once '../generate_rrr_split.php';
$orderId = mt_rand() . date('YmdHis');

$data = array(
    'payerName' => 'Wallace Myem',
    'payerEmail' => 'email@email.com',
    'payerPhone' => '080123456789',
    'totalAmount' => 7000,
    'description' => 'This actuall generates RRR',
    'orderId' => $orderId,

);

$get_details = generateSplitRRR($data);

$jsonData = substr($get_details, 7, -1);
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

;?>