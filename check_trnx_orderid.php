<?php

require_once 'config/config.php';

function check_trnx_orderid($orderId){

    $api_hash = hash('sha512',  $orderId . API_KEY . MERCHANT_ID);

    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://remitademo.net/remita/exapp/api/v1/send/api/echannelsvc/'.MERCHANT_ID.'/'.$orderId.'/'.$api_hash.'/orderstatus.reg',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Authorization: remitaConsumerKey={{merchantId}},remitaConsumerToken={{apiHash}}'
    ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;

}