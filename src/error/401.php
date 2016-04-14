<?php

include '../resources/includes/ErrorCreator.php';
$page = new ErrorCreator();
$page->title = 'Niet geautoriseerd';
$page->code = '401';
$page->message = "U bent niet geautoriseerd om deze pagina te bezoeken.";
$page->create();
