<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li>Gaminių sąrašas</li>
</ul>
<div id="actions">
	<a href='index.php?module=<?php echo $module; ?>&action=issamus_create'>Naujas receptas</a>
</div>
<div class="float-clear"></div>

<?php if(isset($_GET['remove_error'])) { ?>
	<div class="errorBox">
		Gaminys nebuvo pašalintas. Pirmiausia pašalinkite ruošiamas_produktu ryšius.
	</div>
<?php } ?>

<table class="listTable">
	<tr>
		<th>ID</th>
		<th>Pavadinimas</th>
        <th>Galiojimo data</th>
        <th>Pagaminimo data</th>
        <th>Kaina €</th>
        <th>Tipas</th>
		<th>Restoranas</th>
		<th></th>
	</tr>
	<?php
		// suformuojame lentelę
		foreach($data as $key => $val) {
			echo
				"<tr>"
					. "<td>{$val['id_GAMINYS']}</td>"
					. "<td>{$val['pavadinimas']}</td>"
                    . "<td>{$val['galiojimo_data']}</td>"
                    . "<td>{$val['pagaminimo_data']}</td>"
                    . "<td>{$val['kaina']} €</td>"
					. "<td>{$val['tipas']}</td>"
					. "<td>{$val['fk_restoranas_pavadinimas']}</td>"
					. "<td>"	. "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['id_GAMINYS']}\"); return false;' title=''>šalinti</a>&nbsp;"
						. "<a href='index.php?module={$module}&action=issamus_edit&id={$val['id_GAMINYS']}' title=''>redaguoti</a>"
					. "</td>"
				. "</tr>";
		}
	?>
</table>

<?php
	// įtraukiame puslapių šabloną
	include 'templates/paging.tpl.php';
?>