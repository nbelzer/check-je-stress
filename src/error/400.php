<?php

include '../resources/includes/ErrorCreator.php';
$page = new ErrorCreator();
$page->title = 'Foute aanvraag';
$page->code = '400';
$page->message = "Uw browser heeft een verzoek naar de server gestuurd, maar dit verzoek is niet begrepen door de server.";
$page->create();
