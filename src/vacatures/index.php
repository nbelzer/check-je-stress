<!--- Vacatures-->

<?php
include '../resources/includes/PageCreator.php';
$page = new PageCreator();
$page->path_to_root = '../';
$page->head = '<link rel="stylesheet" href="resources/css/specific/information.css" type="text/css">';
$page->title = "Vacatures";
$page->body = <<<CONTENT

<div class="content">
  
  <section class="text water" id="first">
    <div class="row">
      <div class="medium-10 medium-centered columns">
        <div class="medium-9 columns medium-offset-3">
          <h5>Vacatures</h1>

          <p>
			Ons doel is om in elke provincie een ruim aantal aangesloten praktijken te hebben om iedereen in Nederland te kunnen bedienen om stressklachten en burnout terug te dringen.
		  </p>

		  <p>
			Deel jij deze ambitie, wil jij je steentje hieraan bijdragen èn herken je jezelf in onderstaand profiel?
		  </p>
			<ul>
			  <li>HBO werk- en denkniveau</li>
			  <li>Gespecialiseerd in stress en burnout</li>
			  <li>Aangesloten bij een beroepsvereniging (bijv. ABvC, NOLOC, NOBCO, LVNG)</li>
			  <li>Erkende coach- of counsellingsopleiding (Academie voor Coaching & Counselling, Europees Instituut, HBO SPH / MWD)</li>
			  <li>Aantoonbare werkervaring</li>
			</ul>

		  <p>
			Past het profiel en heb je nog steeds interesse? Vul dan onderstaand contactformulier in.
		  </p>
		  
		  <p>
			*Formulier hier*
		  </p>
		  
		  <p>
			Tot binnenkort?<br />
			Serge
		  </p>

        </div>
      </div>
    </div>
  </section>

</div>

CONTENT;
$page->create();

