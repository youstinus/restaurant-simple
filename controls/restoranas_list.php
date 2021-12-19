<?php

// sukuriame markių klasės objektą
include 'libraries/restoranai.class.php';
$restaurentObj = new restoranai();

// suskaičiuojame bendrą įrašų kiekį
$elementCount = $restaurentObj->getRestaurantsCount();

// sukuriame puslapiavimo klasės objektą
include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

// suformuojame sąrašo puslapius
$paging->process($elementCount, $pageId);

// išrenkame nurodyto puslapio markes
$data = $restaurentObj->getRestaurants($paging->size, $paging->first);

// įtraukiame šabloną
include 'templates/restoranas_list.tpl.php';

?>