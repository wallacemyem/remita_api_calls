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

$decode = json_decode($get_details, true);
echo $get_details;

;?>