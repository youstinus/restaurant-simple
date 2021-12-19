<?php

include 'libraries/restoranai.class.php';
$restoranai = new restoranai();

if(!empty($id)) {
	// patikriname, ar šalinama markė nepriskirta modeliui
	//$count = $restoranai->getModelCountOfBrand($id);

	//$removeErrorParameter = '';
	//if($count == 0) {
		// šaliname markę
		$restoranai->deleteRestaurant($id);
	//} else {
		// nepašalinome, nes markė priskirta modeliui, rodome klaidos pranešimą
	//	$removeErrorParameter = '&remove_error=1';
	//}

	// nukreipiame į markių puslapį
	header("Location: index.php?module={$module}&action=list{$removeErrorParameter}");
	die();
}

?>