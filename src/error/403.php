<?php

include '../resources/includes/ErrorCreator.php';
$page = new ErrorCreator();
$page->title = 'Verboden toegang';
$page->code = '403';
$page->message = "De server weigert uw verzoek uit te voeren omdat dit een niet toegestane handeling is.";
$page->create();
