<?php
/*
 * Template Name: API
 *
 */

header('Content-Type: application/json');

include_once('reveal_supply.inc.php'); // $path, $after_reveal, $contract_supply

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