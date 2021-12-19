<?php

// sukuriame ivertinimų klasės objektą
include 'libraries/ivertinimai.class.php';
$evaluationsObj = new ivertinimai();

// suskaičiuojame bendrą įrašų kiekį
$elementCount = $evaluationsObj->getEvaluationsCount();

// sukuriame puslapiavimo klasės objektą
include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

// suformuojame sąrašo puslapius
$paging->process($elementCount, $pageId);

// išrenkame nurodyto puslapio ivertinimus
$data = $evaluationsObj->getEvaluations($paging->size, $paging->first);

// įtraukiame šabloną
include 'templates/ivertinimas_list.tpl.php';
	
?>