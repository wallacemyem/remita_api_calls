<?php

include '../check_trnx_orderid.php';
$check = check_trnx_rrr('5b16ee7969080');

$decode = json_decode($check, true);

echo $check;