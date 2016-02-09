<?php
include 'resources/includes/PageCreator.php';
$page = new PageCreator;
$page->title = "Check je stress";
$page->body = "<p>Hello world!<p><br><a href=\"resources/img/img_index.html\">Index for images</a>";
$page->includeMenu = false;
$page->create();
