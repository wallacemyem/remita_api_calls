<?php

include '../check_trnx_rrr.php';
$check = check_trnx_rrr('110008246444');

$decode = json_decode($check, true);

echo $check;