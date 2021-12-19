<?php

include 'libraries/staliukai.class.php';
$carsObj = new staliukai();

include 'libraries/padavejai.class.php';
$waitersObj = new padavejai();

$formErrors = null;
$data = array();

// nustatome privalomus laukus
$required = array();

// maksimalūs leidžiami laukų ilgiai
$maxLengths = array (
);

// vartotojas paspaudė išsaugojimo mygtuką
if(!empty($_POST['submit'])) {
	// nustatome laukų validatorių tipus
	$validations = array (		
		);

	// sukuriame laukų validatoriaus objektą
	include 'utils/validator.class.php';
	$validator = new validator($validations, $required, $maxLengths);

	// laukai įvesti be klaidų
	if($validator->validate($_POST)) {
		// suformuojame laukų reikšmių masyvą SQL užklausai
		$dataPrepared = $validator->preparePostFieldsForSQL();

		// sutvarkome checkbox reikšmes
		/*if(isset($dataPrepared['radijas']) && $dataPrepared['radijas'] == 'on') {
			$dataPrepared['radijas'] = 1;
		} else {
			$dataPrepared['radijas'] = 0;
		}

		if(isset($dataPrepared['grotuvas']) && $dataPrepared['grotuvas'] == 'on') {
			$dataPrepared['grotuvas'] = 1;
		} else {
			$dataPrepared['grotuvas'] = 0;
		}

		if(isset($dataPrepared['kondicionierius']) && $dataPrepared['kondicionierius'] == 'on') {
			$dataPrepared['kondicionierius'] = 1;
		} else {
			$dataPrepared['kondicionierius'] = 0;
		}*/

		// atnaujiname duomenis
		$carsObj->updateTable($dataPrepared);

		// nukreipiame vartotoją į automobilių puslapį
		header("Location: index.php?module={$module}&action=list");
		die();
	} else {
		// gauname klaidų pranešimą
		$formErrors = $validator->getErrorHTML();
		// laukų reikšmių kintamajam priskiriame įvestų laukų reikšmes
		$data = $_POST;
	}
} else {
	// išrenkame elemento duomenis ir jais užpildome formos laukus.
	$data = $carsObj->getTable($id);
}

// įtraukiame šabloną
include 'templates/staliukas_form.tpl.php';

?>