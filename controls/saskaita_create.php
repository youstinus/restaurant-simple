<?php

include 'libraries/saskaitos.class.php';
$billsObj = new saskaitos();

include 'libraries/staliukai.class.php';
$tablesObj = new staliukai();

include 'libraries/uzsakymai.class.php';
$ordersObj = new uzsakymai();

include 'libraries/restoranai.class.php';
$restaurantsObj = new restoranai();

$formErrors = null;
$data = array();

// nustatome privalomus laukus
$required = array('numeris', 'data', 'bendra_suma', 'apmoketa', 'fk_STALIUKASid_STALIUKAS', 'fk_UZSAKYMASid_UZSAKYMAS', 'fk_RESTORANASid_RESTORANAS');

// vartotojas paspaudė išsaugojimo mygtuką
if(!empty($_POST['submit'])) {
	include 'utils/validator.class.php';

	// nustatome laukų validatorių tipus
	$validations = array (
		'numeris' => 'positivenumber',
		'data' => 'date',
		'bendra_suma' => 'price',
		'apmoketa' => 'boolean',
		'fk_STALIUKASid_STALIUKAS' => 'positivenumber',
		'fk_UZSAKYMASid_UZSAKYMAS' => 'positivenumber',
		'fk_RESTORANASid_RESTORANAS' => 'positivenumber'
	);

	// sukuriame laukų validatoriaus objektą
	$validator = new validator($validations, $required);

	// laukai įvesti be klaidų
	if($validator->validate($_POST)) {
		// suformuojame laukų reikšmių masyvą SQL užklausai
		$dataPrepared = $validator->preparePostFieldsForSQL();

		if(isset($dataPrepared['apmoketa']) && $dataPrepared['apmoketa'] == 'on') {
			$dataPrepared['apmoketa'] = 1;
		} else {
			$dataPrepared['apmoketa'] = 0;
		}

		// patikriname, ar nėra sutarčių su tokiu pačiu numeriu
		$tmp = $billsObj->getBillByNumber($dataPrepared['numeris']);

		if(isset($tmp['numeris'])) {
			// sudarome klaidų pranešimą
			$formErrors = "Sąskaita su įvestu numeriu jau egzistuoja.";
			// laukų reikšmių kintamajam priskiriame įvestų laukų reikšmes
			$data = $_POST;
		} else {
			// įrašome naują sutartį
			$billsObj->insertBill($dataPrepared);

			// įrašome užsakytas paslaugas
			//$billsObj->updateOrderedServices($dataPrepared);
		}
		
		// nukreipiame vartotoją į sutarčių puslapį
		if($formErrors == null) {
			header("Location: index.php?module={$module}&action=list");
			die();
		}
	} else {
		// gauname klaidų pranešimą
		$formErrors = $validator->getErrorHTML();

		// laukų reikšmių kintamajam priskiriame įvestų laukų reikšmes
		$data = $_POST;
		if(isset($_POST['kiekiai']) && sizeof($_POST['kiekiai']) > 0) {
			$i = 0;
			foreach($_POST['kiekiai'] as $key => $val) {
				$data['uzsakytos_paslaugos'][$i]['kiekis'] = $val;
				$i++;
			}
		}
	}
}

// įtraukiame šabloną
include 'templates/saskaita_form.tpl.php';

?>