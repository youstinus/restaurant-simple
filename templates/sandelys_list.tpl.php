<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li>Sandėliai</li>
</ul>
<div id="actions">
	<a href='index.php?module=<?php echo $module; ?>&action=create'>Naujas sandėlys</a>
</div>
<div class="float-clear"></div>

<?php if(isset($_GET['remove_error'])) { ?>
	<div class="errorBox">
		Sandėlys nebuvo pašalintas.
	</div>
<?php } ?>

<table class="listTable">
	<tr>
		<th>ID</th>
		<th>Paskutinė revizija</th>
		<th>Talpa m&sup3;</th>
		<th>Temperatūra °C</th>
		<th>Restoranas</th>
		<th></th>
	</tr>
	<?php
		// suformuojame lentelę
		foreach($data as $key => $val) {
			echo
				"<tr>"
					. "<td>{$val['id_SANDELYS']}</td>"
					. "<td>{$val['paskutine_revizija']}</td>"
					. "<td>{$val['talpa']} m&sup3;</td>"
					. "<td>{$val['temperatura']} °C</td>"
					. "<td>{$val['fk_restoranas_pavadinimas']}</td>"
					. "<td>"
						. "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['id_SANDELYS']}\"); return false;' title=''>šalinti</a>&nbsp;"
						. "<a href='index.php?module={$module}&action=edit&id={$val['id_SANDELYS']}' title=''>redaguoti</a>"
					. "</td>"
				. "</tr>";
		}
	?>
</table>

<?php
	// įtraukiame puslapių šabloną
	include 'templates/paging.tpl.php';
?>