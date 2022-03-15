<?php
/*
 * Template Name: API
 *
 */

header('Content-Type: application/json');

/*
$after_reveal = false; // false or true

$after_reveal = (isset($_GET['after_reveal'])?true:$after_reveal);
$path = "/var/www/html/wp-content/themes/skinft/assets/json/";

$contract="0xcFf1D4DBF5C54546a553866C12094a624a33450a";
$api="PVP6WAPH57Z2TCHRTA5PCTX9H5Q866IC75";

$result = file_get_contents("https://api-rinkeby.etherscan.io/api?module=stats&action=tokensupply&contractaddress=".$contract."&apikey=".$api);
$contract_supply = json_decode($result, true);
*/

include_once('reveal_supply.inc.php');

$token = get_query_var('api');

if ($after_reveal && $token <= $contract_supply["result"]):
   $json = file_get_contents($path."real/".$token);
else: 
  $json = '{"name": "SkinFT #'.$token.'", "image": "ipfs://Qmar8wmqb6JZjKwrxfSxtVf81KqJH3qEZz4uy21hk43YyV"}';
endif;

if($json === FALSE):
    echo 'missing';
else: 
    echo $json;
endif;

?>