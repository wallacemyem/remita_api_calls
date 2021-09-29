<?php

include '../check_trnx_rrr.php';
$check = check_trnx_rrr('110008246689');

$decode = json_decode($check, true);

echo $check["RRR"];