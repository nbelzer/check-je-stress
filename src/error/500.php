<?php

include '../resources/includes/ErrorCreator.php';
$page = new ErrorCreator();
$page->title = 'Interne serverfout';
$page->code = '500';
$page->message = "Er is iets onverwachts misgegaan op de server.";
$page->create();
