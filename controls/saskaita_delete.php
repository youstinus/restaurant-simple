<?php

include 'libraries/saskaitos.class.php';
$billsObj = new saskaitos();

if(!empty($id)) {
	
	// šaliname sąskaitą
	$billsObj->deleteBill($id);

	// nukreipiame į sutarčių puslapį
	header("Location: index.php?module={$module}&action=list");
	die();
}

?>