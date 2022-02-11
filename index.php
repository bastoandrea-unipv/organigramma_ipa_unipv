<?php

require_once("lib.php");

if (isset($_GET['crea']) && $_GET['crea'] == 'yes' ) {
	$file="ipa.json";
	if ($_GET['file'] != '') {
		$file = $_GET['file'];
	}
	$ipa= new Tree($file);
	$bigArray=$ipa->readJsonFirst('1','uni_pv');
	file_put_contents("array.json",json_encode($bigArray));
	
	return 1;
}


$ipa_unipv = new Tree("array.json");

$bigArray=$ipa_unipv->readJson();
//print_r($bigArray);
//$idcd = $ipa_unipv->getUO($bigArray,'4','BCG67J'); // ROOT 6 => '' // 4 => BCG67J Area IDCD
//$idcd = $ipa_unipv->getUO($bigArray,'4','XZFQJ8'); // ROOT 6 => ''
$idcd = $ipa_unipv->getUO($bigArray,'6',''); // ROOT 6 => ''

//print_r($idcd);
require("view.php");




