<?php

// sukuriame produktų klasės objektą
include 'libraries/produktai.class.php';
$produktuObj = new produktai();

// suskaičiuojame bendrą įrašų kiekį
$elementCount = $produktuObj->getProductsCount();

// sukuriame puslapiavimo klasės objektą
include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

// suformuojame sąrašo puslapius
$paging->process($elementCount, $pageId);

// išrenkame nurodyto puslapio produktus
$data = $produktuObj->getProducts($paging->size, $paging->first);

// įtraukiame šabloną
include 'templates/produktas_list.tpl.php';

?>