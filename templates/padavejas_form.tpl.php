<ul id="pagePath">
    <li><a href="index.php">Pradžia</a></li>
    <li><a href="index.php?module=<?php echo $module; ?>&action=list">Padavėjai</a></li>
    <li><?php if (!empty($id)) echo "Padavėjo redagavimas";
		else echo "Naujas padavėjas"; ?></li>
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
    <?php 
} ?>
    <form action="" method="post">
        <fieldset>
            <legend>Padavėjo informacija</legend>
            <p>
                <label class="field" for="vardas">Vardas<?php echo in_array('vardas', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="vardas" name="vardas" class="textbox textbox-150" value="<?php echo isset($data['vardas']) ? $data['vardas'] : ''; ?>" />
                <?php if (key_exists('vardas', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['vardas']} simb.)</span>"; ?>
            </p>
            <p>
                <label class="field" for="pavarde">Pavardė<?php echo in_array('pavarde', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="pavarde" name="pavarde" class="textbox textbox-150" value="<?php echo isset($data['pavarde']) ? $data['pavarde'] : ''; ?>" />
                <?php if (key_exists('pavarde', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['pavarde']} simb.)</span>"; ?>
            </p>
        </fieldset>
        <p class="required-note">* pažymėtus laukus užpildyti privaloma</p>
        <p>
            <input type="submit" class="submit button" name="submit" value="Išsaugoti">
        </p>
        <?php if(isset($data['id_PADAVEJAS'])) { ?>
			<input type="hidden" name="id_PADAVEJAS" value="<?php echo $data['id_PADAVEJAS']; ?>" />
		<?php } ?>
    </form>
</div> 