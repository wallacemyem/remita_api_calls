<?php

require_once 'config/config.php';

    
function generateRRR($data){
        $api_hash = hash('sha512', MERCHANT_ID . SERVICE_TYPE_ID . $data['orderId'] . $data['totalAmount'] . API_KEY);

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => ''.BASE_URL.'/echannelsvc/merchant/api/paymentinit',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{ 
            "serviceTypeId": "'.SERVICE_TYPE_ID.'",
            "amount": "'.$data['totalAmount'].'",
            "orderId": "'.$data['orderId'].'",
            "payerName": "'.$data['payerName'].'",
            "payerEmail": "'.$data['payerEmail'].'",
            "payerPhone": "'.$data['payerPhone'].'",
            "description": "'.$data['description'].'"
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: remitaConsumerKey='.MERCHANT_ID.',remitaConsumerToken='.$api_hash.''
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;

}