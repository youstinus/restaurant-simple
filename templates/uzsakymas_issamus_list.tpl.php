<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li>Užsakymai</li>
</ul>
<div id="actions">
	<!-- <a href='index.php?module=<?php echo $module; ?>&action=report_delayed_cars'>Vėluojamų grąžinti automobilių ataskaita</a> -->
	<a href='index.php?module=<?php echo $module; ?>&action=create'>Išsamus užsakymas</a>
	<!-- <a href='index.php?module=<?php echo $module; ?>&action=create'>Naujas užsakymas</a> -->
</div>
<div class="float-clear"></div>

<?php if(isset($_GET['create_error'])) { ?>
	<div class="errorBox">
		Užsakymas nebuvo sukurtas, nes užsakymas su numeriu [<?php echo "{$_GET['create_error']}" ?>] jau egzistuoja
	</div>
<?php } ?>

<table class="listTable">
	<tr>
		<th>ID</th>
		<th>Nr.</th>
		<th>Suma</th>
		<th>Data</th>
		<th>Būsena</th>
		<th>Restoranas</th>
		<th>Staliukas</th>
		<th>Padavėjas</th>
		<th></th>
	</tr>
	<?php
		// suformuojame lentelę
		foreach($data as $key => $val) {
			echo
				"<tr>"
					. "<td>{$val['id_UZSAKYMAS']}</td>"
					. "<td>{$val['uzsakymo_numeris']}</td>"
					. "<td>{$val['suma']} €</td>"
					. "<td>{$val['data']}</td>"
					. "<td>{$val['busena']}</td>"
					. "<td>{$val['fk_restoranas_pavadinimas']}</td>"
					. "<td>{$val['fk_staliukas_numeris']}</td>"
					. "<td>{$val['fk_padavejas_vardas']} {$val['fk_padavejas_pavarde']}</td>"
					. "<td>"
						. "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['id_UZSAKYMAS']}\"); return false;' title=''>šalinti</a>&nbsp;"
						. "<a href='index.php?module={$module}&action=edit&id={$val['id_UZSAKYMAS']}' title=''>redaguoti</a>"
					. "</td>"
				. "</tr>";
		}
	?>
</table>

<?php
	// įtraukiame puslapių šabloną
	include 'templates/paging.tpl.php';
?>