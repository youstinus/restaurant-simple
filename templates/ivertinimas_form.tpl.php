<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li><a href="index.php?module=<?php echo $module; ?>&action=list">Gaminių įvertinimai</a></li>
	<li><?php if(!empty($id)) echo "Įvertinimo redagavimas"; else echo "Naujas įvertinimas"; ?></li>
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
			<legend>Įvertinimo informacija</legend>
			<p>
				<label class="field" for="ivertinimas">Įvertinimas<?php echo in_array('ivertinimas', $required) ? '<span> *</span>' : ''; ?></label>
				<select id="ivertinimas" name="ivertinimas">
					<option value="0">-------------</option>
					<?php
						// išrenkame visas markes
						$evaluations = $evaluationsObj->getEvaluationTypes();
						foreach($evaluations as $key => $val) {
							$selected = "";
							if(isset($data['ivertinimas']) && $data['ivertinimas'] == $val['id_ivertinimu_tipai']) {
								$selected = " selected='selected'";
							}
							echo "<option{$selected} value='{$val['id_ivertinimu_tipai']}'>{$val['name']}</option>";
						}
					?>
				</select>
			</p>
			<p>
				<label class="field" for="komentaras">Komentaras<?php echo in_array('komentaras', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="komentaras" name="komentaras" class="textbox textbox-150" value="<?php echo isset($data['komentaras']) ? $data['komentaras'] : ''; ?>">
				<?php if(key_exists('komentaras', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['komentaras']} simb.)</span>"; ?>
			</p>
			<p>
				<label class="field" for="fk_ASMUOid_ASMUO">Klientas<?php echo in_array('fk_ASMUOid_ASMUO', $required) ? '<span> *</span>' : ''; ?></label>
				<select id="fk_ASMUOid_ASMUO" name="fk_ASMUOid_ASMUO">
					<option value="0">-------------</option>
					<?php
						// išrenkame visas markes
						$customers = $customersObj->getCustomers();
						foreach($customers as $key => $val) {
							$selected = "";
							if(isset($data['fk_ASMUOid_ASMUO']) && $data['fk_ASMUOid_ASMUO'] == $val['id_ASMUO']) {
								$selected = " selected='selected'";
							}
							echo "<option{$selected} value='{$val['id_ASMUO']}'>{$val['vardas']} {$val['pavarde']}</option>";
						}
					?>
				</select>
			</p>
			<p>
				<label class="field" for="fk_GAMINYSid_GAMINYS">Gaminys<?php echo in_array('fk_GAMINYSid_GAMINYS', $required) ? '<span> *</span>' : ''; ?></label>
				<select id="fk_GAMINYSid_GAMINYS" name="fk_GAMINYSid_GAMINYS">
					<option value="0">-------------</option>
					<?php
						// išrenkame visas markes
						$gaminiai = $gaminiaiObj->getGaminiuList();
						foreach($gaminiai as $key => $val) {
							$selected = "";
							if(isset($data['fk_GAMINYSid_GAMINYS']) && $data['fk_GAMINYSid_GAMINYS'] == $val['id_GAMINYS']) {
								$selected = " selected='selected'";
							}
							echo "<option{$selected} value='{$val['id_GAMINYS']}'>{$val['pavadinimas']}</option>";
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
			<input type="hidden" name="id_IVERTINIMAS" value="<?php echo $data['id_IVERTINIMAS']; ?>" />
		<?php } ?>
	</form>
</div>