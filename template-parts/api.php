<?php
/*
 * Template Name: API
 *
 */

header('Content-Type: application/json');

$path = "/var/www/html/wp-content/themes/skinft/assets/json/";

$after_reveal = false;

$contract="0xcFf1D4DBF5C54546a553866C12094a624a33450a";
$api="PVP6WAPH57Z2TCHRTA5PCTX9H5Q866IC75";

$token = get_query_var('api');

$result = file_get_contents("https://api-rinkeby.etherscan.io/api?module=stats&action=tokensupply&contractaddress=".$contract."&apikey=".$api);
$contract_supply = json_decode($result, true);

if ($after_reveal && $token <= $contract_supply["result"]):
   $json = file_get_contents($path."nft_json/real_json/".$token);
else: 
  $json = '{"name": "SkinFT #'.$token.'", "image": "ipfs://Qmar8wmqb6JZjKwrxfSxtVf81KqJH3qEZz4uy21hk43YyV"}';
endif;

if($json === FALSE):
    echo 'missing';
else: 
    echo $json;
endif;

?>