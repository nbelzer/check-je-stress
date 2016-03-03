<?php

include '../resources/includes/ErrorCreator.php';
$page = new ErrorCreator();
$page->title = 'Pagina niet gevonden';
$page->code = '404';
$page->message = "De pagina die u probeert te bezoeken bestaat niet.";
$page->create();
