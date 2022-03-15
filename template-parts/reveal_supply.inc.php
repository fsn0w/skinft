<?php

$after_reveal = false; // false or true
$contract = "0xcFf1D4DBF5C54546a553866C12094a624a33450a";
$network = "https://api-rinkeby.etherscan.io";
$path = "/var/www/html/wp-content/themes/skinft/assets/json/";
$api = "PVP6WAPH57Z2TCHRTA5PCTX9H5Q866IC75";

$after_reveal = (isset($_GET['after_reveal'])?true:$after_reveal);

$result = file_get_contents($network."/api?module=stats&action=tokensupply&contractaddress=".$contract."&apikey=".$api);
$contract_supply = json_decode($result, true);

$token = (null !== get_query_var('api') ? get_query_var('api') : get_query_var('token'));

echo 'TOKEN !!! > '.get_query_var('token');

if ($token < 1 || $token > 7777) {
    $token = 1;
}

if ($after_reveal && $token <= $contract_supply["result"]):
  $json = file_get_contents($path."real/".$token);

  $nft = json_decode($json, true);
  $nft_image = str_replace("://", "/", $nft['image']);
  $nft_skin_image = str_replace("://", "/", $nft['skin image']);

else: 
  $json = '{"name": "SkinFT #'.$token.'", "image": "ipfs://Qmar8wmqb6JZjKwrxfSxtVf81KqJH3qEZz4uy21hk43YyV"}';
  $nft = false;
endif;

?>