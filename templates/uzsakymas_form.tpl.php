<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li><a href="index.php?module=<?php echo $module; ?>&action=list">Užsakymai</a></li>
	<li><?php if (!empty($id)) echo "Užsakymo redagavimas";
		else echo "Naujas užsakymas"; ?></li>
</ul>
<div class="float-clear"></div>
<div id="formContainer">
	<?php if ($formErrors != null) { ?>
		<div class="errorBox">
			Neįvesti arba neteisingai įvesti šie laukai:
			<?php
			echo $formErrors;
			?>
		</div>
	<?php } ?>
	<form action="" method="post">
		<fieldset>
			<legend>Užsakymo informacija</legend>
			<p>
				<label class="field" for="uzsakymo_numeris">Numeris<?php echo in_array('uzsakymo_numeris', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="uzsakymo_numeris" name="uzsakymo_numeris" class="textbox textbox-70" value="<?php echo isset($data['uzsakymo_numeris']) ? $data['uzsakymo_numeris'] : ''; ?>">
				<?php if (key_exists('uzsakymo_numeris', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['uzsakymo_numeris']} simb.)</span>"; ?>
			</p>
			<p>
				<label class="field" for="suma">Suma<?php echo in_array('suma', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="suma" name="suma" class="textbox textbox-70" value="<?php echo isset($data['suma']) ? $data['suma'] : ''; ?>">
				<?php if (key_exists('suma', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['suma']} simb.)</span>"; ?>
			</p>
			<p>
				<label class="field" for="data">Data<?php echo in_array('data', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="data" name="data" class="textbox date textbox-70" value="<?php echo isset($data['data']) ? $data['data'] : ''; ?>">
				<?php if (key_exists('data', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['data']} simb.)</span>"; ?>
			</p>
			<p>
				<label class="field" for="busena">Būsena<?php echo in_array('busena', $required) ? '<span> *</span>' : ''; ?></label>
				<select id="busena" name="busena">
					<option value="">---------------</option>
					<?php
					$ordersStates = $ordersObj->getOrderStates();
					foreach ($ordersStates as $key => $val) {
						$selected = "";
						if (isset($data['busena']) && $data['busena'] == $val['id_uzsakymo_busenos']) {
							$selected = " selected='selected'";
						}
						echo "<option{$selected} value='{$val['id_uzsakymo_busenos']}'>{$val['name']}</option>";
					}
					?>
				</select>
			</p>
			<p>
				<label class="field" for="fk_RESTORANASid_RESTORANAS">Restoranas<?php echo in_array('fk_RESTORANASid_RESTORANAS', $required) ? '<span> *</span>' : ''; ?></label>
				<select id="fk_RESTORANASid_RESTORANAS" name="fk_RESTORANASid_RESTORANAS">
					<option value="">---------------</option>
					<?php
					$restaurants = $restaurantsObj->getRestaurants();
					foreach ($restaurants as $key => $val) {
						$selected = "";
						if (isset($data['fk_RESTORANASid_RESTORANAS']) && $data['fk_RESTORANASid_RESTORANAS'] == $val['id_RESTORANAS']) {
							$selected = " selected='selected'";
						}
						echo "<option{$selected} value='{$val['id_RESTORANAS']}'>{$val['pavadinimas']}</option>";
					}
					?>
				</select>
			</p>
			<p>
				<label class="field" for="fk_STALIUKASid_STALIUKAS">Staliukas<?php echo in_array('fk_STALIUKASid_STALIUKAS', $required) ? '<span> *</span>' : ''; ?></label>
				<select id="fk_STALIUKASid_STALIUKAS" name="fk_STALIUKASid_STALIUKAS">
					<option value="">---------------</option>
					<?php
					// išrenkame klientus
					$tables = $tablesObj->getTables();
					foreach ($tables as $key => $val) {
						$selected = "";
						if (isset($data['fk_STALIUKASid_STALIUKAS']) && $data['fk_STALIUKASid_STALIUKAS'] == $val['id_STALIUKAS']) {
							$selected = " selected='selected'";
						}
						echo "<option{$selected} value='{$val['id_STALIUKAS']}'>{$val['numeris']}</option>";
					}
					?>
				</select>
			</p>
			<p>
				<label class="field" for="fk_PADAVEJASid_PADAVEJAS">Padavėjas<?php echo in_array('fk_PADAVEJASid_PADAVEJAS', $required) ? '<span> *</span>' : ''; ?></label>
				<select id="fk_PADAVEJASid_PADAVEJAS" name="fk_PADAVEJASid_PADAVEJAS">
					<option value="">---------------</option>
					<?php
					// išrenkame klientus
					$waiters = $waitersObj->getWaiters();
					foreach ($waiters as $key => $val) {
						$selected = "";
						if (isset($data['fk_PADAVEJASid_PADAVEJAS']) && $data['fk_PADAVEJASid_PADAVEJAS'] == $val['id_PADAVEJAS']) {
							$selected = " selected='selected'";
						}
						echo "<option{$selected} value='{$val['id_PADAVEJAS']}'>{$val['vardas']} {$val['pavarde']}</option>";
					}
					?>
				</select>
			</p>
			<p class="required-note">* pažymėtus laukus užpildyti privaloma</p>
			<p>
				<input type="submit" class="submit button" name="submit" value="Išsaugoti">
			</p>
			<input type="hidden" name="id_UZSAKYMAS" value="<?php echo isset($data['id_UZSAKYMAS']) ? $data['id_UZSAKYMAS'] : ''; ?>" />
	</form>
</div>