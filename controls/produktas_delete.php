<?php

include 'libraries/produktai.class.php';
$productsObj = new produktai();

if(!empty($id)) {
	// patikriname, ar šalinama markė nepriskirta modeliui
	//$count = $productsObj->getModelCountOfBrand($id);

	$removeErrorParameter = '';
	//if($count == 0) {
		// šaliname produktą
		$productsObj->deleteProduct($id);
	//} else {
		// nepašalinome, nes markė priskirta modeliui, rodome klaidos pranešimą
	//	$removeErrorParameter = '&remove_error=1';
	//}

	// nukreipiame į markių puslapį
	header("Location: index.php?module={$module}&action=list{$removeErrorParameter}");
	die();
}

?>