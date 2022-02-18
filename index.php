<?php

require_once("lib.php");

$url = $_SERVER['REQUEST_URI']; 
$url_components = parse_url($url); 
@parse_str($url_components['query'], $params); 

if (isset($params['crea']) && $params['crea'] == 'yes' ) {
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
if (isset($params['view']) ) {
	if ($params['view'] == "chart") {
		if (isset($params['getUO']) && strlen($params['getUO']) == 6) {
			$ab=$ipa_unipv->readJson('4',$params['getUO']);
			$aa=array();
			foreach ($ab as $abc) {
				$aa=$ipa_unipv->getChild($abc);
			}
			array_push($aa,$abc);
			
			require("grid.php");
		} else {
			$aa=$bigArray;
			require("grid.php");
		}

	} elseif ($params['view'] == "list") {

		if (isset($params['getUO']) && strlen($params['getUO']) == 6) {

			$idcd = $ipa_unipv->getUO($bigArray,'4',$params['getUO']); // ROOT 6 => ''
			require("view.php");
	
		} else {

			$idcd = $ipa_unipv->getUO($bigArray,'6',''); // ROOT 6 => ''
			require("view.php");
		}
	}
} else {
		if (isset($params['getUO']) && strlen($params['getUO']) == 6) {

			$idcd = $ipa_unipv->getUO($bigArray,'4',$params['getUO']); // ROOT 6 => ''
			require("view.php");
	
		} else {

			$idcd = $ipa_unipv->getUO($bigArray,'6',''); // ROOT 6 => ''
			require("view.php");
		}

}

