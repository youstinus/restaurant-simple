<?php

include 'libraries/uzsakymai.class.php';
$ordersObj = new uzsakymai();

include 'libraries/restoranai.class.php';
$restaurantsObj = new restoranai();

include 'libraries/staliukai.class.php';
$tablesObj = new staliukai();

include 'libraries/padavejai.class.php';
$waitersObj = new padavejai();

$formErrors = null;
$data = array();

// nustatome privalomus laukus
$required = array('uzsakymo_numeris', 'suma', 'data', 'busena', 'fk_RESTORANASid_RESTORANAS', 'fk_STALIUKASid_STALIUKAS', 'fk_PADAVEJASid_PADAVEJAS');

// maksimalūs leidžiami laukų ilgiai
$maxLengths = array();

// vartotojas paspaudė išsaugojimo mygtuką
if (!empty($_POST['submit'])) {
	include 'utils/validator.class.php';

	// nustatome laukų validatorių tipus
	$validations = array(
		'uzsakymo_numeris' => 'positivenumber',
		'suma' => 'price',
		'data' => 'date',
		'busena' => 'positivenumber',
		'fk_RESTORANASid_RESTORANAS' => 'positivenumber',
		'fk_STALIUKASid_STALIUKAS' => 'positivenumber',
		'fk_PADAVEJASid_PADAVEJAS' => 'positivenumber'
	);

	// sukuriame laukų validatoriaus objektą
	$validator = new validator($validations, $required, $maxLengths);

	// laukai įvesti be klaidų
	if ($validator->validate($_POST)) {
		// suformuojame laukų reikšmių masyvą SQL užklausai
		$dataPrepared = $validator->preparePostFieldsForSQL();

		$count = isset($dataPrepared['uzsakymo_numeris']) ? $ordersObj->getOrdersCountByNumber($dataPrepared['uzsakymo_numeris']) : 1;

		$removeErrorParameter = '';
		if($count == 0) {
			// įrašome naują sutartį
			$ordersObj->insertOrder($dataPrepared);
		} else {
			$removeErrorParameter = '&create_error='.$dataPrepared['uzsakymo_numeris'];
		}

		// nukreipiame vartotoją į sutarčių puslapį
		if ($formErrors == null) {
			header("Location: index.php?module={$module}&action=list{$removeErrorParameter}");
			die();
		}
	} else {
		// gauname klaidų pranešimą
		$formErrors = $validator->getErrorHTML();

		// laukų reikšmių kintamajam priskiriame įvestų laukų reikšmes
		/*$data = $_POST;
		if (isset($_POST['kiekiai']) && sizeof($_POST['kiekiai']) > 0) {
			$i = 0;
			foreach ($_POST['kiekiai'] as $key => $val) {
				$data['uzsakytos_paslaugos'][$i]['kiekis'] = $val;
				$i++;
			}
		}*/
	}
}

// įtraukiame šabloną
include 'templates/uzsakymas_form.tpl.php';
