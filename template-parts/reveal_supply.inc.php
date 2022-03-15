<?php

$after_reveal = false; // false or true
$contract = "0xcFf1D4DBF5C54546a553866C12094a624a33450a";
$network = "https://api-rinkeby.etherscan.io";

$after_reveal = (isset($_GET['after_reveal'])?true:$after_reveal);
$path = "/var/www/html/wp-content/themes/skinft/assets/json/";

$contract="0xcFf1D4DBF5C54546a553866C12094a624a33450a";
$api="PVP6WAPH57Z2TCHRTA5PCTX9H5Q866IC75";

$result = file_get_contents($network."/api?module=stats&action=tokensupply&contractaddress=".$contract."&apikey=".$api);
$contract_supply = json_decode($result, true);

?>