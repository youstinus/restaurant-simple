<?php

include 'libraries/staliukai.class.php';
$tablesObj = new staliukai();

if(!empty($id)) {
	// patikriname, ar automobilis neįtrauktas į sutartis
	$count = $tablesObj->getBillsCountOfTable($id);

	$removeErrorParameter = '';
	if($count == 0) {
		// šaliname automobilį
		$tablesObj->deleteTable($id);
	} else {
	// nepašalinome, nes automobilis įtrauktas bent į vieną sutartį, rodome klaidos pranešimą
		$removeErrorParameter = '&remove_error=1';
	}

	// nukreipiame į automobilių puslapį
	header("Location: index.php?module={$module}&action=list{$removeErrorParameter}");
	die();
}

?>