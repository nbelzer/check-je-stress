<!--- Contact-->

<?php
include '../resources/includes/PageCreator.php';
$page = new PageCreator();
$page->path_to_root = '../';
$page->head = '<link rel="stylesheet" href="resources/css/specific/standard.css" type="text/css">';
$page->title = "Contact";

$naam = $_POST['naam'];
$vragenopmerkingenideeën = $_POST['vragenopmerkingenideeën'];
$email = $_POST['email'];
$aanvinkvelden = "";
foreach($_POST['aanvinkvelden'] as $value){
	$aanvinkvelden .= "<li>";
	$aanvinkvelden .= $value;
	$aanvinkvelden .= "</li>";
}

$page->body = <<<CONTENT

<div class="content">
  
  <section class="text water" id="first">
    <div class="row">
      <div class="medium-10 medium-centered columns">
        <div class="medium-9 columns medium-offset-3">
          <h5>Contact</h1>

		  <p>
			Dit heeft u aangevinkt: <ul>$aanvinkvelden</ul><br>
			Dit is uw naam: $naam<br>
			Dit is uw E-mailadres: $email<br>
			Dit zijn uw vragen, opmerkingen of ideeën: $vragenopmerkingenideeën
			
		  </p>
		  
        </div>
      </div>
    </div>
  </section>

</div>

CONTENT;
$page->create();

