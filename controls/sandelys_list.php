<?php

// sukuriame automobilių klasės objektą
include 'libraries/sandeliai.class.php';
$sandeliaiObj = new sandeliai();

// suskaičiuojame bendrą įrašų kiekį
$elementCount = $sandeliaiObj->getStoragesCount();

// sukuriame puslapiavimo klasės objektą
include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

// suformuojame sąrašo puslapius
$paging->process($elementCount, $pageId);

// išrenkame nurodyto puslapio automobilius
$data = $sandeliaiObj->getStorages($paging->size, $paging->first);	

// įtraukiame šabloną
include 'templates/sandelys_list.tpl.php';

?>