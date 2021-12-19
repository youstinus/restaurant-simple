<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li>Restoranai</li>
</ul>
<div id="actions">
	<a href='index.php?module=<?php echo $module; ?>&action=create'>Naujas restoranas</a>
</div>
<div class="float-clear"></div>

<?php if(isset($_GET['remove_error'])) { ?>
	<div class="errorBox">
		Markė nebuvo pašalinta. Pirmiausia pašalinkite markės modelius.
	</div>
<?php } ?>

<table class="listTable">
	<tr>
		<th>ID</th>
		<th>Pavadinimas</th>
		<th>Adresas</th>
		<th>El. paštas</th>
		<th>Telefonas</th>
		<th>Įmonės kodas</th>
		<th>Banko sąskaita</th>
		<th></th>
	</tr>
	<?php
		// suformuojame lentelę
		foreach($data as $key => $val) {
			echo
				"<tr>"
					. "<td>{$val['id_RESTORANAS']}</td>"
					. "<td>{$val['pavadinimas']}</td>"
					. "<td>{$val['adresas']}</td>"
					. "<td>{$val['el_pastas']}</td>"
					. "<td>{$val['telefonas']}</td>"
					. "<td>{$val['imones_kodas']}</td>"
					. "<td>{$val['banko_saskaita']}</td>"
					. "<td>"
						. "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['id_RESTORANAS']}\"); return false;' title=''>šalinti</a>&nbsp;"
						. "<a href='index.php?module={$module}&action=edit&id={$val['id_RESTORANAS']}' title=''>redaguoti</a>"
					. "</td>"
				. "</tr>";
		}
	?>
</table>

<?php
	// įtraukiame puslapių šabloną
	include 'templates/paging.tpl.php';
?>