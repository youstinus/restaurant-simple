<?php

// sukuriame darbuotojų klasės objektą
include 'libraries/padavejai.class.php';
$waitersObj = new padavejai();

// suskaičiuojame bendrą įrašų kiekį
$elementCount = $waitersObj->getWaitersCount();

// sukuriame puslapiavimo klasės objektą
include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

// suformuojame sąrašo puslapius
$paging->process($elementCount, $pageId);

// išrenkame nurodyto puslapio darbuotojus
$data = $waitersObj->getWaiters($paging->size, $paging->first);

// įtraukiame šabloną
include 'templates/padavejas_list.tpl.php';

?>