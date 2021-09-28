<?php

// You can use this API to validate the status of your transaction 
// using the Remita Retrieval Reference (RRR).
// status code '00' and '01' denote successful transactions and you can 
// consider RRR as paid upon receiving either of these response codes.
// See full list of response codes here: https://api.remita.net/#8b78cebc-d1f1-4e4c-bcca-55703ccfea7e

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