<?php

include 'libraries/restoranai.class.php';
$restoranai = new restoranai();

$formErrors = null;
$data = array();

// nustatome privalomus laukus
$required = array('pavadinimas', 'adresas', 'el_pastas', 'telefonas', 'imones_kodas', 'banko_saskaita');

// maksimalūs leidžiami laukų ilgiai
$maxLengths = array(
	'pavadinimas' => 40,
	'adresas' => 40,
	'el_pastas' => 40,
	'telefonas' => 14,
	'imones_kodas' => 40,
	'banko_saskaita' => 40
);

// paspaustas išsaugojimo mygtukas
if (!empty($_POST['submit'])) {
	// nustatome laukų validatorių tipus
	$validations = array(
		'pavadinimas' => 'anything',
		'adresas' => 'anything',
		'el_pastas' => 'email',
		'telefonas' => 'phone',
		'imones_kodas' => 'anything',
		'banko_saskaita' => 'anything'
	);

	// sukuriame validatoriaus objektą
	include 'utils/validator.class.php';
	$validator = new validator($validations, $required, $maxLengths);

	if ($validator->validate($_POST)) {
		// suformuojame laukų reikšmių masyvą SQL užklausai
		$dataPrepared = $validator->preparePostFieldsForSQL();

		// įrašome naują įrašą
		$restoranai->insertRestaurant($dataPrepared);

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
include 'templates/restoranas_form.tpl.php';
 