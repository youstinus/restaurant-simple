<?php

// sukuriame staliukų klasės objektą
include 'libraries/staliukai.class.php';
$tablesObj = new staliukai();

// suskaičiuojame bendrą įrašų kiekį
$elementCount = $tablesObj->getTablesCount();

// sukuriame puslapiavimo klasės objektą
include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

// suformuojame sąrašo puslapius
$paging->process($elementCount, $pageId);

// išrenkame nurodyto puslapio staliukus
$data = $tablesObj->getTables($paging->size, $paging->first);	

// įtraukiame šabloną
include 'templates/staliukas_list.tpl.php';

?>