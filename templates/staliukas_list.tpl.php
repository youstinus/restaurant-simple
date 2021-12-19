<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li>Staliukai</li>
</ul>
<div id="actions">
	<a href='index.php?module=<?php echo $module; ?>&action=create'>Naujas staliukas</a>
</div>
<div class="float-clear"></div>

<?php if(isset($_GET['remove_error'])) { ?>
	<div class="errorBox">
		Staliukas nebuvo pašalinta, nes jam priklauso bent viena sąskaita.
	</div>
<?php } ?>

<table class="listTable">
	<tr>
		<th>ID</th>
		<th>Nr.</th>
		<th>Vietų skaičius</th>
		<th>Padavėjas</th>
		<th></th>
	</tr>
	<?php
		// suformuojame lentelę
		foreach($data as $key => $val) {
			echo
				"<tr>"
					. "<td>{$val['id_STALIUKAS']}</td>"
					. "<td>{$val['numeris']}</td>"
					. "<td>{$val['vietu_skaicius']}</td>"
					. "<td>{$val['fk_padavejas_vardas']} {$val['fk_padavejas_pavarde']}</td>"
					. "<td>"
						. "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['id_STALIUKAS']}\"); return false;' title=''>šalinti</a>&nbsp;"
						. "<a href='index.php?module={$module}&action=edit&id={$val['id_STALIUKAS']}' title=''>redaguoti</a>"
					. "</td>"
				. "</tr>";
		}
	?>
</table>

<?php
	// įtraukiame puslapių šabloną
	include 'templates/paging.tpl.php';
?>