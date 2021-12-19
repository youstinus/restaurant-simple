<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li><a href="index.php?module=<?php echo $module; ?>&action=list">Sąskaitos</a></li>
	<li><?php if (!empty($id)) echo "Sąskaitos redagavimas";
		else echo "Nauja Sąskaita"; ?></li>
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
			<legend>Sąskaitos informacija</legend>
			<p>
				<label class="field" for="numeris">Numeris<?php echo in_array('numeris', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="numeris" name="numeris" class="textbox textbox-70" value="<?php echo isset($data['numeris']) ? $data['numeris'] : ''; ?>">
			</p>
			<p>
				<label class="field" for="data">Data<?php echo in_array('data', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="data" name="data" class="textbox date textbox-70" value="<?php echo isset($data['data']) ? $data['data'] : ''; ?>">
			</p>
			<p>
				<label class="field" for="bendra_suma">Bendra suma<?php echo in_array('bendra_suma', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="bendra_suma" name="bendra_suma" class="textbox textbox-70" value="<?php echo isset($data['bendra_suma']) ? $data['bendra_suma'] : ''; ?>">
			</p>
			<p>
				<label class="field" for="apmoketa">Apmokėta</label>
				<input type="checkbox" id="apmoketa" name="apmoketa" <?php echo (isset($data['apmoketa']) && ($data['apmoketa'] == 1 || $data['apmoketa'] == 'on'))  ? ' checked="checked"' : ''; ?>>
			</p>
			<p>
				<label class="field" for="fk_STALIUKASid_STALIUKAS">Staliukas<?php echo in_array('fk_STALIUKASid_STALIUKAS', $required) ? '<span> *</span>' : ''; ?></label>
				<select id="fk_STALIUKASid_STALIUKAS" name="fk_STALIUKASid_STALIUKAS">
					<option value="">---------------</option>
					<?php
					// išrenkame staliukus
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
				<label class="field" for="fk_UZSAKYMASid_UZSAKYMAS">Užsakymas<?php echo in_array('fk_UZSAKYMASid_UZSAKYMAS', $required) ? '<span> *</span>' : ''; ?></label>
				<select id="fk_UZSAKYMASid_UZSAKYMAS" name="fk_UZSAKYMASid_UZSAKYMAS">
					<option value="">---------------</option>
					<?php
					// išrenkame užsakymus
					$orders = $ordersObj->getOrders();
					foreach ($orders as $key => $val) {
						$selected = "";
						if (isset($data['fk_UZSAKYMASid_UZSAKYMAS']) && $data['fk_UZSAKYMASid_UZSAKYMAS'] == $val['id_UZSAKYMAS']) {
							$selected = " selected='selected'";
						}
						echo "<option{$selected} value='{$val['id_UZSAKYMAS']}'>{$val['uzsakymo_numeris']}</option>";
					}
					?>
				</select>
			</p>
			<p>
				<label class="field" for="fk_RESTORANASid_RESTORANAS">Restoranas<?php echo in_array('fk_RESTORANASid_RESTORANAS', $required) ? '<span> *</span>' : ''; ?></label>
				<select id="fk_RESTORANASid_RESTORANAS" name="fk_RESTORANASid_RESTORANAS">
					<option value="">---------------</option>
					<?php
					// išrenkame restoranus
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
				<input type="submit" class="submit button" name="submit" value="Išsaugoti">
			</p>
			<?php if (isset($data['id_SASKAITA'])) { ?>
				<input type="hidden" name="id_SASKAITA" value="<?php echo $data['id_SASKAITA']; ?>" />
			<?php } ?>
	</form>
</div>