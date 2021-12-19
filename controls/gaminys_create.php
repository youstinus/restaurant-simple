<?php

include 'libraries/gaminiai.class.php';
$gaminiaiObj = new gaminiai();

include 'libraries/restoranai.class.php';
$restaurants = new restoranai();

$formErrors = null;
$data = array();

// nustatome privalomus laukus
$required = array('pavadinimas', 'pagaminimo_data', 'galiojimo_data', 'kaina', 'tipas', 'fk_RESTORANASid_RESTORANAS');

// maksimalūs leidžiami laukų ilgiai
$maxLengths = array (
	'pavadinimas' => 20
);

// paspaustas išsaugojimo mygtukas
if(!empty($_POST['submit'])) {
	// nustatome laukų validatorių tipus
	$validations = array (
		'pavadinimas' => 'anything',
		'pagaminimo_data' => 'anything',
		'galiojimo_data' => 'anything',
		'kaina' => 'anything',
		'tipas' => 'anything',
		'fk_RESTORANASid_RESTORANAS' => 'anything'
	);

	// sukuriame validatoriaus objektą
	include 'utils/validator.class.php';
	$validator = new validator($validations, $required, $maxLengths);

	if($validator->validate($_POST)) {
		// suformuojame laukų reikšmių masyvą SQL užklausai
		$dataPrepared = $validator->preparePostFieldsForSQL();

		// įrašome naują įrašą
		$gaminiaiObj->insertGaminys($dataPrepared);

		// nukreipiame į markių puslapį
		header("Location: index.php?module={$module}&action=list");
		die();
	} else {
		// gauname klaidų pranešimą
		$formErrors = $validator->getErrorHTML();
		// gauname įvestus laukus
		$data = $_POST;
	}
}

// įtraukiame šabloną
include 'templates/gaminys_form.tpl.php';

?>