<?php
/*
 * Template Name: API
 *
 */

header('Content-Type: application/json');

include_once('reveal_supply.inc.php'); // $path, $after_reveal, $contract_supply, $json, $nft

if($json === FALSE):
    echo 'missing';
else: 
    echo $json;
endif;

?>