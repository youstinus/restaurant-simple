<?php

// sukuriame sutarčių klasės objektą
include 'libraries/uzsakymai.class.php';
$ordersObj = new uzsakymai();

// sukuriame puslapiavimo klasės objektą
include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

// suskaičiuojame bendrą įrašų kiekį
$elementCount = $ordersObj->getOrdersCount();

// suformuojame sąrašo puslapius
$paging->process($elementCount, $pageId);

// išrenkame nurodyto puslapio sutartis
$data = $ordersObj->getOrders($paging->size, $paging->first);

// įtraukiame šabloną
include 'templates/uzsakymas_list.tpl.php';

?>