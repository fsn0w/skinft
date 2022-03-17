<?php

$reveal_time = 'Apr 10, 2022 08:00:00';

$contract = "0x83ED072c0630Cf55a54Cef4E3ae88B78e65af2E6";
$network = "https://api.etherscan.io";
$path = "/var/www/html/wp-content/themes/skinft/assets/json/";
$api = "PVP6WAPH57Z2TCHRTA5PCTX9H5Q866IC75";

$cdate = strtotime(current_time("M j, Y H:i:s"));
$sdate = strtotime($reveal_time);
$after_reveal = ((isset($_GET['after_reveal']) || $cdate>$sdate)?true:false);

$result = file_get_contents($network."/api?module=stats&action=tokensupply&contractaddress=".$contract."&apikey=".$api);
$contract_supply = json_decode($result, true);

$token = (get_query_var('api') !== '' ? get_query_var('api') : get_query_var('token'));

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