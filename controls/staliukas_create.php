<?php

include 'libraries/staliukai.class.php';
$tablesObj = new staliukai();

include 'libraries/padavejai.class.php';
$waitersObj = new padavejai();

$formErrors = null;
$data = array();

// nustatome privalomus laukus
$required = array('numeris', 'vietu_skaicius', 'fk_PADAVEJASid_PADAVEJAS');

// maksimalūs leidžiami laukų ilgiai
$maxLengths = array (
);

// vartotojas paspaudė išsaugojimo mygtuką
if(!empty($_POST['submit'])) {
	// nustatome laukų validatorių tipus
	$validations = array (
		 'numeris' => 'positivenumber',
		 'vietu_skaicius' => 'positivenumber',
		 'fk_PADAVEJASid_PADAVEJAS' => 'positivenumber'
		);

	// sukuriame laukų validatoriaus objektą
	include 'utils/validator.class.php';
	$validator = new validator($validations, $required, $maxLengths);

	// laukai įvesti be klaidų
	if($validator->validate($_POST)) {
		// suformuojame laukų reikšmių masyvą SQL užklausai
		$dataPrepared = $validator->preparePostFieldsForSQL();

		// įrašome naują įrašą
		$tablesObj->insertTable($dataPrepared);

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
	// tikriname, ar nurodytas elemento id. Jeigu taip, išrenkame elemento duomenis ir jais užpildome formos laukus.
	if(!empty($id)) {
		// išrenkame automobilį
		$data = $tablesObj->getTable($id);
	}
}

// įtraukiame šabloną
include 'templates/staliukas_form.tpl.php';

?>