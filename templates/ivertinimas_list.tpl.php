<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li>Gaminių įvertinimai</li>
</ul>
<div id="actions">
	<a href='index.php?module=<?php echo $module; ?>&action=create'>Naujas įvertinimas</a>
</div>
<div class="float-clear"></div>

<?php if(isset($_GET['remove_error'])) { ?>
	<div class="errorBox">
		Įvertinimas nebuvo pašalintas. Pirmiausia pašalinkite to modelio automobilius.
	</div>
<?php } ?>

<table class="listTable">
	<tr>
		<th>ID</th>
		<th>Įvertinimas</th>
		<th>Komentaras</th>
		<th>Klientas</th>
		<th>Gaminys</th>
		<th></th>
	</tr>
	<?php
		// suformuojame lentelę
		foreach($data as $key => $val) {
			echo
				"<tr>"
					. "<td>{$val['id_IVERTINIMAS']}</td>"
					. "<td>{$val['ivertinimo_tipas']}</td>"
					. "<td>{$val['komentaras']}</td>"
					. "<td>{$val['fk_asmuo_vardas']} {$val['fk_asmuo_pavarde']}</td>"
					. "<td>{$val['fk_gaminys_pavadinimas']}</td>"
					. "<td>"
						. "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['id_IVERTINIMAS']}\"); return false;' title=''>šalinti</a>&nbsp;"
						. "<a href='index.php?module={$module}&action=edit&id={$val['id_IVERTINIMAS']}' title=''>redaguoti</a>"
					. "</td>"
				. "</tr>";
		}
	?>
</table>

<?php
	// įtraukiame puslapių šabloną
	include 'templates/paging.tpl.php';
?>