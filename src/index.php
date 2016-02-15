<?php
include 'resources/includes/PageCreator.php';
$page = new PageCreator;
$page->title = "Check je stress";
$page->head = "<link rel=\"stylesheet\" href=" .$path_to_root . "resources/css/specific/index.css type=\"text/css\">";
$page->body = <<<CONTENT

<div class="indexImage" style="background-image: url('resources/img/frontpage.svg');">
  <div class="row">
  </div>
</div>


<div class="row">
  <a href="#">
    <div class="small-12 medium-3 columns indexElement indexButton">
      Doe een test
    </div>
  </a>
  <a href="info/index.php">
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
  <a href="resources/img/index.html">Index for images</a>
</div>

CONTENT;
$page->includeMenu = true;
$page->create();
