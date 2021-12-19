<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="robots" content="noindex">
		<title>Restoranai</title>
		<link rel="stylesheet" type="text/css" href="scripts/datetimepicker/jquery.datetimepicker.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="style/main.css" media="screen" />
		<script type="text/javascript" src="scripts/jquery-1.12.0.min.js"></script>
		<script type="text/javascript" src="scripts/datetimepicker/jquery.datetimepicker.full.min.js"></script>
		<script type="text/javascript" src="scripts/main.js"></script>
	</head>
	<body>
		<div id="body">
			<div id="header">
				<h3 id="slogan"><a href="index.php">Restoranai</a></h3>
			</div>
			<div id="content">
				<div id="topMenu">
					<ul class="float-left">
						<li><a href="index.php?module=restoranas&action=list" title="Restoranai"<?php if($module == 'restoranas') { echo 'class="active"'; } ?>>Restoranai</a></li>
						<li><a href="index.php?module=staliukas&action=list" title="Staliukai"<?php if($module == 'staliukas') { echo 'class="active"'; } ?>>Staliukai</a></li>
						<li><a href="index.php?module=padavejas&action=list" title="Padavėjai"<?php if($module == 'padavejas') { echo 'class="active"'; } ?>>Padavėjai</a></li>
						<li><a href="index.php?module=klientas&action=list" title="Klientai"<?php if($module == 'klientas') { echo 'class="active"'; } ?>>Klientai</a></li>
						<li><a href="index.php?module=uzsakymas_issamus&action=list" title="Užsakymai"<?php if($module == 'uzsakymas_issamus') { echo 'class="active"'; } ?>>Užsakymai</a></li>
						<li><a href="index.php?module=saskaita&action=list" title="Sąskaitos"<?php if($module == 'saskaita') { echo 'class="active"'; } ?>>Sąskaitos</a></li>
						<li><a href="index.php?module=gaminys_issamus&action=list" title="Gaminiai"<?php if($module == 'gaminys_issamus') { echo 'class="active"'; } ?>>Gaminiai</a></li>
						<li><a href="index.php?module=produktas&action=list" title="Produktai"<?php if($module == 'produktas') { echo 'class="active"'; } ?>>Produktai</a></li>
						<li><a href="index.php?module=ivertinimas&action=list" title="Įvertinimai"<?php if($module == 'ivertinimas') { echo 'class="active"'; } ?>>Įvertinimai</a></li>
						<li><a href="index.php?module=sandelys&action=list" title="Sandėliai"<?php if($module == 'sandelys') { echo 'class="active"'; } ?>>Sandėliai</a></li>
					</ul>
					<ul class="float-right">
						<li><a href="index.php?module=report&action=list" title="Ataskaitos"<?php if($module == 'report') { echo 'class="active"'; } ?>>Ataskaitos</a></li>
					</ul>
				</div>
				<div id="contentMain">
					<?php
						// įtraukiame veiksmų failą
						if(file_exists($actionFile)) {
							include $actionFile;
						}
					?>
					<div class="float-clear"></div>
				</div>
			</div>
			<div id="footer">

			</div>
		</div>
	</body>
</html>
<div class="htmlbody">
	<div id="wrap"></div>
</div>