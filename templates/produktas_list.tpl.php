<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li>Produktai</li>
</ul>
<div id="actions">
	<a href='index.php?module=<?php echo $module; ?>&action=create'>Naujas produktas</a>
</div>
<div class="float-clear"></div>

<?php if(isset($_GET['remove_error'])) { ?>
	<div class="errorBox">
		Produktas nebuvo pašalintas.
	</div>
<?php } ?>

<table class="listTable">
	<tr>
		<th>ID</th>
		<th>Pavadinimas</th>
		<th>Kiekis</th>
		<th>Matavimo vienetai</th>
		<th>Alergenas</th>
		<th>Sandėlys</th>
		<th></th>
	</tr>
	<?php
		// suformuojame lentelę
		foreach($data as $key => $val) {
			echo
				"<tr>"
					. "<td>{$val['id_PRODUKTAS']}</td>"
					. "<td>{$val['pavadinimas']}</td>"
					. "<td>{$val['kiekis']}</td>"
					. "<td>{$val['matavimo_vienetas']}</td>"
					. "<td>{$val['alergenas']}</td>"
					. "<td>{$val['fk_SANDELYSid_SANDELYS']}</td>"
					. "<td>"
						. "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['id_PRODUKTAS']}\"); return false;' title=''>šalinti</a>&nbsp;"
						. "<a href='index.php?module={$module}&action=edit&id={$val['id_PRODUKTAS']}' title=''>redaguoti</a>"
					. "</td>"
				. "</tr>";
		}
	?>
</table>

<?php
	// įtraukiame puslapių šabloną
	include 'templates/paging.tpl.php';
?>