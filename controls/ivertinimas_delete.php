<?php

include 'libraries/ivertinimai.class.php';
$evaluationsObj = new ivertinimai();

if(!empty($id)) {
	// patikriname, ar šalinamas modelis nenaudojamas, t.y. nepriskirtas jokiam automobiliui
	//$count = $modelsObj->getCarCountOfModel($id);

	//$removeErrorParameter = '';
	//if($count == 0) {
		// pašaliname modelį
		$evaluationsObj->deleteEvaluation($id);
	//} else {
		// nepašalinome, nes modelis priskirtas bent vienam automobiliui, rodome klaidos pranešimą
	//	$removeErrorParameter = '&remove_error=1';
	//}

	// nukreipiame į modelių puslapį
	header("Location: index.php?module={$module}&action=list{$removeErrorParameter}");
	die();
}

?>