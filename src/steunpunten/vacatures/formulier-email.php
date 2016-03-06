<!--- Vacatures-->

<?php
include '../../resources/includes/PageCreator.php';
$page = new PageCreator();
$page->path_to_root = '../../';
$page->head = '<link rel="stylesheet" href="resources/css/specific/information.css" type="text/css">';
$page->title = "Vacatures";
$page->body = <<<CONTENT

<div class="content">
  
  <section class="text water" id="first">
    <div class="row">
      <div class="medium-10 medium-centered columns">
        <div class="medium-9 columns medium-offset-3">
          <h5>Vacatures</h1>

        </div>
      </div>
    </div>
  </section>

</div>

CONTENT;
$page->create();

