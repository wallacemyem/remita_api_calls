<?php

include '../check_trnx_rrr.php';
$check = check_trnx_rrr('100007846253');

$decode = json_decode($check, true);

echo $check;