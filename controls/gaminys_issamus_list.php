<?php

// sukuriame markių klasės objektą
include 'libraries/gaminiai.class.php';
$gaminiaiObj = new gaminiai();

// suskaičiuojame bendrą įrašų kiekį
$elementCount = $gaminiaiObj->getGaminiuListCount();

// sukuriame puslapiavimo klasės objektą
include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

// suformuojame sąrašo puslapius
$paging->process($elementCount, $pageId);

// išrenkame nurodyto puslapio markes
$data = $gaminiaiObj->getGaminiuList($paging->size, $paging->first);

// įtraukiame šabloną
include 'templates/gaminys_issamus_list.tpl.php';

?>