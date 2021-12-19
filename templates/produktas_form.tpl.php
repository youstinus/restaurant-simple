<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li><a href="index.php?module=<?php echo $module; ?>&action=list">Maisto produktai</a></li>
	<li><?php if(!empty($id)) echo "Produkto redagavimas"; else echo "Naujas produktas"; ?></li>
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
		<legend>Maisto produkto informacija</legend>
			<p>
				<label class="field" for="name">Pavadinimas<?php echo in_array('pavadinimas', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="name" name="pavadinimas" class="textbox textbox-150" value="<?php echo isset($data['pavadinimas']) ? $data['pavadinimas'] : ''; ?>">
				<?php if(key_exists('pavadinimas', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['pavadinimas']} simb.)</span>"; ?>
			</p>
			<p>
				<label class="field" for="kiekis">Kiekis<?php echo in_array('kiekis', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="kiekis" name="kiekis" class="textbox textbox-70" value="<?php echo isset($data['kiekis']) ? $data['kiekis'] : ''; ?>">
			</p>
			<p>
				<label class="field" for="matavimo_vienetas">Matavimo vienetas<?php echo in_array('matavimo_vienetas', $required) ? '<span> *</span>' : ''; ?></label>
				<select id="matavimo_vienetas" name="matavimo_vienetas">
					<option value="0">---------------</option>
					<?php
						// išrenkame visas kategorijas sugeneruoti pasirinkimų lauką
						$vienetai = $brandsObj->getMatavimoVienetuList();
						foreach($vienetai as $key => $val) {
							$selected = "";
							if(isset($data['matavimo_vienetas']) && $data['matavimo_vienetas'] == $val['id_matavimo_vienetai']) {
								$selected = " selected='selected'";
							}
							echo "<option{$selected} value='{$val['id_matavimo_vienetai']}'>{$val['name']}</option>";
						}
					?>
				</select>
			</p>
			<p>
				<label class="field" for="alergenas">Alergenas<?php echo in_array('alergenas', $required) ? '<span> *</span>' : ''; ?></label>
				<select id="alergenas" name="alergenas">
					<option value="0">---------------</option>
					<?php
						// išrenkame visas kategorijas sugeneruoti pasirinkimų lauką
						$alergenai = $brandsObj->getAlergenuList();
						foreach($alergenai as $key => $val) {
							$selected = "";
							if(isset($data['alergenas']) && $data['alergenas'] == $val['id_alergenai']) {
								$selected = " selected='selected'";
							}
							echo "<option{$selected} value='{$val['id_alergenai']}'>{$val['name']}</option>";
						}
					?>
				</select>
			</p>
			<p>
				<label class="field" for="fk_SANDELYSid_SANDELYS">Sandėlys<?php echo in_array('fk_SANDELYSid_SANDELYS', $required) ? '<span> *</span>' : ''; ?></label>
				<select id="fk_SANDELYSid_SANDELYS" name="fk_SANDELYSid_SANDELYS">
					<option value="0">---------------</option>
					<?php
						// išrenkame sandėlius
						$sandeliai = $sandeliai->getStorages();
						foreach($sandeliai as $key => $val) {
							$selected = "";
							if(isset($data['fk_SANDELYSid_SANDELYS']) && $data['fk_SANDELYSid_SANDELYS'] == $val['id_SANDELYS']) {
								$selected = " selected='selected'";
							}
							echo "<option{$selected} value='{$val['id_SANDELYS']}'>{$val['id_SANDELYS']}-{$val['talpa']}</option>";
						}
					?>
				</select>
			</p>
		</fieldset>
		<p class="required-note">* pažymėtus laukus užpildyti privaloma</p>
		<p>
			<input type="submit" class="submit button" name="submit" value="Išsaugoti">
		</p>
		<?php if(isset($data['id_PRODUKTAS'])) { ?>
			<input type="hidden" name="id_PRODUKTAS" value="<?php echo $data['id_PRODUKTAS']; ?>" />
		<?php } ?>
	</form>
</div>