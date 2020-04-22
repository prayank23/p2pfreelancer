<?php
$auth_token = 'wLPa7y3FQZ2eTWhW3LS3ko-pVtQf_Fst-AEEMcGb';

$headers   = array();
$headers[] = 'Authorization: Token ' . $auth_token;
$curl      = curl_init();

$res=curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
print_r($res);

"https://api-sandbox.coingate.com/v2"
?>