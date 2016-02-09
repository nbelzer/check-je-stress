<?php
include 'resources/includes/PageCreator.php';
$page = new PageCreator;
$page->title = "Check je stress";
$page->head = "<link rel=\"stylesheet\" href=" .$path_to_root . "resources/css/specific/index.css type=\"text/css\">";
$page->body = <<<CONTENT

<div class="row">
  <div class="indexImage" style="background-image: url('$path_to_root/resources/img/index.png');">
    <ul class="title">
      <li><img src="$path_to_root/resources/img/logo_highres.png" class="logo"></li>
      <li><div class="logoTitle">Check Je Stress</div></li>
    </ul>
  </div>
</div>

<div class="row">
  <a href="#">
    <div class="small-12 medium-3 columns indexElement indexButton">
      Doe een test
    </div>
  </a>
  <a href="#">
    <div class="small-12 medium-3 columns indexElement indexButton">
      Informatie
    </div>
  </a>
  <a href="#">
    <div class="small-12 medium-3 columns indexElement indexButton">
      Contact
    </div>
  </a>
  <a href="#">
    <div class="small-12 medium-3 columns indexElement indexButton">
      Contact
    </div>
  </a>
</div>

<div class="row indexElement">

  Meer informatie hierzo
</div>

CONTENT;
$page->includeMenu = false;
$page->create();
