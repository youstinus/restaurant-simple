<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li><a href="index.php?module=<?php echo $module; ?>&action=list">Staliukai</a></li>
	<li><?php if(!empty($id)) echo "Staliuko redagavimas"; else echo "Naujas staliukas"; ?></li>
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
			<legend>Staliuko informacija</legend>
			<p>
				<label class="field" for="numeris">Numeris<?php echo in_array('numeris', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="numeris" name="numeris" class="textbox textbox-70" value="<?php echo isset($data['numeris']) ? $data['numeris'] : ''; ?>">
				<?php if(key_exists('numeris', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['numeris']} simb.)</span>"; ?>
			</p>
			<p>
				<label class="field" for="vietu_skaicius">Vietų skaičius<?php echo in_array('vietu_skaicius', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="vietu_skaicius" name="vietu_skaicius" class="textbox textbox-70" value="<?php echo isset($data['vietu_skaicius']) ? $data['vietu_skaicius'] : ''; ?>">
			</p>
			<p>
				<label class="field" for="fk_PADAVEJASid_PADAVEJAS">Padavėjas<?php echo in_array('fk_PADAVEJASid_PADAVEJAS', $required) ? '<span> *</span>' : ''; ?></label>
				<select id="fk_PADAVEJASid_PADAVEJAS" name="fk_PADAVEJASid_PADAVEJAS">
					<option value="0">---------------</option>
					<?php
						// išrenkame visas kategorijas sugeneruoti pasirinkimų lauką
						$waiters = $waitersObj->getWaiters();
						foreach($waiters as $key => $val) {
							$selected = "";
							if(isset($data['fk_PADAVEJASid_PADAVEJAS']) && $data['fk_PADAVEJASid_PADAVEJAS'] == $val['id_PADAVEJAS']) {
								$selected = " selected='selected'";
							}
							echo "<option{$selected} value='{$val['id_PADAVEJAS']}'>{$val['vardas']} {$val['pavarde']}</option>";
						}
					?>
				</select>
			</p>			
		</fieldset>
		<p class="required-note">* pažymėtus laukus užpildyti privaloma</p>
		<p>
			<input type="submit" class="submit button" name="submit" value="Išsaugoti">
		</p>
		<?php if(isset($data['id_STALIUKAS'])) { ?>
			<input type="hidden" name="id_STALIUKAS" value="<?php echo $data['id_STALIUKAS']; ?>" />
		<?php } ?>
	</form>
</div>