<?php

include '../resources/includes/ErrorCreator.php';
$page = new ErrorCreator();
$page->title = 'Dienst niet beschikbaar';
$page->code = '503';
$page->message = "De server ondergaat op het moment onderhoud of kan momenteel uw verzoek niet verwerken om andere redenen.";
$page->create();
