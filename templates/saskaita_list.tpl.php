<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li>Sąskaitos</li>
</ul>
<div id="actions">
	<!-- <a href='index.php?module=<?php echo $module; ?>&action=report_delayed_cars'>Vėluojamų grąžinti automobilių ataskaita</a> -->
	<!-- <a href='index.php?module=<?php echo $module; ?>&action=report'>Sutarčių ataskaita</a> -->
	<a href='index.php?module=<?php echo $module; ?>&action=create'>Nauja Sąskaita</a>
</div>
<div class="float-clear"></div>

<table class="listTable">
	<tr>
		<th>ID</th>
		<th>Nr.</th>
		<th>Data</th>
		<th>Bendra suma</th>
		<th>Ar apmokėta</th>
		<th>Staliukas</th>
		<th>Užsakymas</th>
		<th>Restoranas</th>
		<th></th>
	</tr>
	<?php
		// suformuojame lentelę
		foreach($data as $key => $val) {
			echo
				"<tr>"
					. "<td>{$val['id_SASKAITA']}</td>"
					. "<td>{$val['numeris']}</td>"
					. "<td>{$val['data']}</td>"
					. "<td>{$val['bendra_suma']} €</td>"
					. "<td>{$val['apmoketa']}</td>"
					. "<td>{$val['fk_staliukas_numeris']}</td>"
					. "<td>{$val['fk_uzsakymas_numeris']}</td>"
					. "<td>{$val['fk_restoranas_pavadinimas']}</td>"
					. "<td>"
						. "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['id_SASKAITA']}\"); return false;' title=''>šalinti</a>&nbsp;"
						. "<a href='index.php?module={$module}&action=edit&id={$val['id_SASKAITA']}' title=''>redaguoti</a>"
					. "</td>"
				. "</tr>";
		}
	?>
</table>

<?php
	// įtraukiame puslapių šabloną
	include 'templates/paging.tpl.php';
?>