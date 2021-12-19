<?php

include 'libraries/uzsakymai.class.php';
$ordersObj = new uzsakymai();

if(!empty($id)) {
	// pašaliname sąskaitas priklausančias užsakymui
	$ordersObj->deleteBillsByOrderId($id);

	// šaliname užsakymą
	$ordersObj->deleteOrder($id);

	// nukreipiame į užsakymų puslapį
	header("Location: index.php?module={$module}&action=list");
	die();
}

?>