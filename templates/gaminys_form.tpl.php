<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li><a href="index.php?module=<?php echo $module; ?>&action=list">Gaminių sąrašas</a></li>
	<li><?php if(!empty($id)) echo "Gaminio redagavimas"; else echo "Naujas gaminys"; ?></li>
</ul>
<div class="float-clear"></div>
<div id="formContainer">
	<?php if($formErrors != null) { ?>
		<div class="errorBox">
			Neįvesti arba neteisingai įvesti šie laukai:
			<?php 
				echo $formErrors;
			?>
		</div>
	<?php } ?>
	<form action="" method="post">
		<fieldset>
			<legend>Gaminio informacija</legend>
			<p>
				<label class="field" for="name">Pavadinimas<?php echo in_array('pavadinimas', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="name" name="pavadinimas" class="textbox textbox-150" value="<?php echo isset($data['pavadinimas']) ? $data['pavadinimas'] : ''; ?>">
				<?php if(key_exists('pavadinimas', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['pavadinimas']} simb.)</span>"; ?>
			</p>
			<p>
				<label class="field" for="pagaminimo_data">Pagaminimo data<?php echo in_array('pagaminimo_data', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="pagaminimo_data" name="pagaminimo_data" class="textbox date textbox-70" value="<?php echo isset($data['pagaminimo_data']) ? $data['pagaminimo_data'] : ''; ?>">
			</p>
			<p>
				<label class="field" for="galiojimo_data">Galiojimo data<?php echo in_array('galiojimo_data', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="galiojimo_data" name="galiojimo_data" class="textbox date textbox-70" value="<?php echo isset($data['galiojimo_data']) ? $data['galiojimo_data'] : ''; ?>">
			</p>
			<p>
				<label class="field" for="kaina">Kaina<?php echo in_array('kaina', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="kaina" name="kaina" class="textbox textbox-70" value="<?php echo isset($data['kaina']) ? $data['kaina'] : ''; ?>"> <span class="units">&euro;</span>
			</p>
			<p>
				<label class="field" for="tipas">Tipas<?php echo in_array('tipas', $required) ? '<span> *</span>' : ''; ?></label>
				<select id="tipas" name="tipas">
					<option value="0">---------------</option>
					<?php
						// išrenkame tipus
						$gaminiuTipai = $gaminiaiObj->getGaminiuTipai();
						foreach($gaminiuTipai as $key => $val) {
							$selected = "";
							if(isset($data['tipas']) && $data['tipas'] == $val['id_gaminiu_tipai']) {
								$selected = " selected='selected'";
							}
							echo "<option{$selected} value='{$val['id_gaminiu_tipai']}'>{$val['name']}</option>";
						}
					?>
				</select>
			</p>
			<p>
				<label class="field" for="fk_RESTORANASid_RESTORANAS">Restoranas<?php echo in_array('tipas', $required) ? '<span> *</span>' : ''; ?></label>
				<select id="fk_RESTORANASid_RESTORANAS" name="fk_RESTORANASid_RESTORANAS">
					<option value="0">---------------</option>
					<?php
						// išrenkame tipus
						$restaurantList = $restaurants->getRestaurants();
						foreach($restaurantList as $key => $val) {
							$selected = "";
							if(isset($data['fk_RESTORANASid_RESTORANAS']) && $data['fk_RESTORANASid_RESTORANAS'] == $val['id_RESTORANAS']) {
								$selected = " selected='selected'";
							}
							echo "<option{$selected} value='{$val['id_RESTORANAS']}'>{$val['pavadinimas']}</option>";
						}
					?>
				</select>
			</p>
		</fieldset>
		<p class="required-note">* pažymėtus laukus užpildyti privaloma</p>
		<p>
			<input type="submit" class="submit button" name="submit" value="Išsaugoti">
		</p>
		<?php if(isset($data['id'])) { ?>
			<input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
		<?php } ?>
	</form>
</div>