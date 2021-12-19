<?php

include 'libraries/cars.class.php';
$carsObj = new cars();

if(!empty($id)) {
	// patikriname, ar automobilis neįtrauktas į sutartis
	$count = $carsObj->getContractCountOfCar($id);

	$removeErrorParameter = '';
	if($count == 0) {
		// šaliname automobilį
		$carsObj->deleteCar($id);
	} else {
		// nepašalinome, nes automobilis įtrauktas bent į vieną sutartį, rodome klaidos pranešimą
		$removeErrorParameter = '&remove_error=1';
	}

	// nukreipiame į automobilių puslapį
	header("Location: index.php?module={$module}&action=list{$removeErrorParameter}");
	die();
}

?>