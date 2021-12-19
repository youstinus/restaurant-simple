<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li><a href="index.php?module=<?php echo $module; ?>&action=list">Restoranai</a></li>
	<li><?php if(!empty($id)) echo "Restorano redagavimas"; else echo "Naujas restoranas"; ?></li>
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
			<legend>Restorano informacija</legend>
			<p>
				<label class="field" for="pavadinimas">Pavadinimas<?php echo in_array('pavadinimas', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="pavadinimas" name="pavadinimas" class="textbox textbox-150" value="<?php echo isset($data['pavadinimas']) ? $data['pavadinimas'] : ''; ?>">
				<?php if(key_exists('pavadinimas', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['pavadinimas']} simb.)</span>"; ?>
			</p>
			<p>
				<label class="field" for="adresas">Adresas<?php echo in_array('adresas', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="adresas" name="adresas" class="textbox textbox-150" value="<?php echo isset($data['adresas']) ? $data['adresas'] : ''; ?>">
				<?php if(key_exists('adresas', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['adresas']} simb.)</span>"; ?>
			</p>
			<p>
				<label class="field" for="el_pastas">El. paštas<?php echo in_array('el_pastas', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="el_pastas" name="el_pastas" class="textbox textbox-150" value="<?php echo isset($data['el_pastas']) ? $data['el_pastas'] : ''; ?>">
				<?php if(key_exists('el_pastas', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['el_pastas']} simb.)</span>"; ?>
			</p>
			<p>
				<label class="field" for="telefonas">Telefonas<?php echo in_array('telefonas', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="telefonas" name="telefonas" class="textbox textbox-150" value="<?php echo isset($data['telefonas']) ? $data['telefonas'] : ''; ?>">
				<?php if(key_exists('telefonas', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['telefonas']} simb.)</span>"; ?>
			</p>
			<p>
				<label class="field" for="imones_kodas">Įmonės kodas<?php echo in_array('imones_kodas', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="imones_kodas" name="imones_kodas" class="textbox textbox-150" value="<?php echo isset($data['imones_kodas']) ? $data['imones_kodas'] : ''; ?>">
				<?php if(key_exists('imones_kodas', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['imones_kodas']} simb.)</span>"; ?>
			</p>
			<p>
				<label class="field" for="banko_saskaita">Banko sąskaita<?php echo in_array('banko_saskaita', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="banko_saskaita" name="banko_saskaita" class="textbox textbox-150" value="<?php echo isset($data['banko_saskaita']) ? $data['banko_saskaita'] : ''; ?>">
				<?php if(key_exists('banko_saskaita', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['banko_saskaita']} simb.)</span>"; ?>
			</p>
		</fieldset>
		<p class="required-note">* pažymėtus laukus užpildyti privaloma</p>
		<p>
			<input type="submit" class="submit button" name="submit" value="Išsaugoti">
		</p>
		<?php if(isset($data['id_RESTORANAS'])) { ?>
			<input type="hidden" name="id_RESTORANAS" value="<?php echo $data['id_RESTORANAS']; ?>" />
		<?php } ?>
	</form>
</div>