<?php

include 'libraries/gaminiai.class.php';
$gaminiaiObj = new gaminiai();

if(!empty($id)) {
	// patikriname, ar šalinama markė nepriskirta modeliui
	$count = $gaminiaiObj->getProduktuCountOfGaminys($id);

	$removeErrorParameter = '';
	if($count == 0) {
		// šaliname markę
		$gaminiaiObj->deleteProductLinks($id);
		$gaminiaiObj->deleteGaminys($id);
	} else {
		// nepašalinome, nes markė priskirta modeliui, rodome klaidos pranešimą
		$removeErrorParameter = '&remove_error=1';
	}

	// nukreipiame į markių puslapį
	header("Location: index.php?module={$module}&action=list{$removeErrorParameter}");
	die();
}

?>