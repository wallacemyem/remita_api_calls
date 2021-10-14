<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => '{{gateway-url}}/echannelsvc/merchant/api/paymentinit',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{ 
	"serviceTypeId": "{{serviceTypeId}}",
	"amount": "{{totalAmount}}",
	"orderId": "{{orderId}}",
	"payerName": "Michael Alozie",
	"payerEmail": "alozie@systemspecs.com.ng",
	"payerPhone": "09062067384",
	"description": "Payment for Donation 3",
	"customFields": [{
		"name": "Payer TIN",
		"value": "1234567890",
		"type": "ALL"
		},
		 {
		 "name": "Contract Date",
		"value": "2018/06/27",
		"type": "ALL"
		},
		 {
		 "name": "Tax Period",
		"value": "2018/06/20",
		"type": "ALL"
		}]
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: remitaConsumerKey={{merchantId}},remitaConsumerToken={{apiHash}}'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;