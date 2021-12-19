<?php

// sukuriame sąskaitų klasės objektą
include 'libraries/saskaitos.class.php';
$billsObj = new saskaitos();

// sukuriame puslapiavimo klasės objektą
include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

// suskaičiuojame bendrą įrašų kiekį
$elementCount = $billsObj->getBillsCount();

// suformuojame sąrašo puslapius
$paging->process($elementCount, $pageId);

// išrenkame nurodyto puslapio sąskaitas
$data = $billsObj->getBills($paging->size, $paging->first);

// įtraukiame šabloną
include 'templates/saskaita_list.tpl.php';

?>