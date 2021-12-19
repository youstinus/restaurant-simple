<?php

include 'libraries/padavejai.class.php';
$waitersObj = new padavejai();

if(!empty($id)) {
	// patikriname, ar padavėjas neturi sudarytų sutarčių
	$count = $waitersObj->getOrdersCountByWaiter($id);

	$removeErrorParameter = '';
	if($count == 0) {
		// šaliname darbuotoją
		$waitersObj->deleteWaiter($id);
	} else {
		// nepašalinome, nes padavėjas sudaręs bent vieną sutartį, rodome klaidos pranešimą
		$removeErrorParameter = '&remove_error=1';
	}

	// nukreipiame į darbuotojų puslapį
	header("Location: index.php?module={$module}&action=list{$removeErrorParameter}");
	die();
}

?>