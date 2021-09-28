<?php

require_once 'config/config.php';

function check_trnx_rrr($rrr){

        $api_hash = hash('sha512',  $rrr . API_KEY . MERCHANT_ID);
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://www.remitademo.net/remita/ecomm/'.MERCHANT_ID.'/'.$rrr.'/'.$api_hash.'/status.reg',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: remitaConsumerKey='.MERCHANT_ID.',remitaConsumerToken='.$api_hash.''
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
}