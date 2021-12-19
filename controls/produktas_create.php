<?php

include 'libraries/produktai.class.php';
$brandsObj = new produktai();

include 'libraries/sandeliai.class.php';
$sandeliai = new sandeliai();

$formErrors = null;
$data = array();

// nustatome privalomus laukus
$required = array('pavadinimas', 'kiekis', 'alergenas', 'matavimo_vienetas', 'fk_SANDELYSid_SANDELYS');

// maksimalūs leidžiami laukų ilgiai
$maxLengths = array (
	'pavadinimas' => 20
);

// paspaustas išsaugojimo mygtukas
if(!empty($_POST['submit'])) {
	// nustatome laukų validatorių tipus
	$validations = array (
		'pavadinimas' => 'anything',
		'kiekis' => 'anything',
		'alergenas' => 'anything',
		'matavimo_vienetas' => 'anything',
		'fk_SANDELYSid_SANDELYS' => 'anything');

	// sukuriame validatoriaus objektą
	include 'utils/validator.class.php';
	$validator = new validator($validations, $required, $maxLengths);

	if($validator->validate($_POST)) {
		// suformuojame laukų reikšmių masyvą SQL užklausai
		$dataPrepared = $validator->preparePostFieldsForSQL();

		// įrašome naują įrašą
		$brandsObj->insertProduktas($dataPrepared);

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
include 'templates/produktas_form.tpl.php';

?>