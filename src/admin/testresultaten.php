<?php

include '../resources/includes/PageCreator.php';
$page = new PageCreator;
$page->path_to_root = '../';

if (isset($_GET['test'])) {

  include_once '../resources/includes/TestsSQL.php';
  $tests_sql = new TestsSQL($page->mysql);

  $content = '<table>';
  $i = 0;
  foreach ($tests_sql->getAverageResults($_GET['test']) as $question_average) {
    $content .= "<tr><th>$i</th><td>$question_average</td></tr>";
    $i++;
  }
  $content .= '</table>';

} else {
  $self = htmlentities($_SERVER['PHP_SELF']);
  $content = <<<EOF
    <p>
	  Op deze pagina kunt u de testresultaten inzien.<br>
	  Kies een test:
	</p>
    <ul>
      <li><a href="$self?test=snel">Snelle test</a></li>
      <li><a href="$self?test=uitgebreid">Uitgebreide test</a></li>
      <li><a href="$self?test=risicoanalyse">Risicoanalyse</a></li>
    </ul>
EOF;
}

$page->head = '<link rel="stylesheet" href="resources/css/specific/information.css" type="text/css">';
$page->title = "CheckJeStress - Testresultaten";
$page->body = <<<EOF
<div class="content">
  <div class="menuSpacing"></div>

  <div class="indexImage">
    <div class="row">
      <div class="medium-12 medium-centered columns">
        <div class="backgroundImage" style="background-image: url('resources/img/background.svg');">
        </div>
      </div>
    </div>
  </div>
  
  <div class="row text water" id="first">
    <div class="medium-10 medium-centered columns">
      <div class="medium-9 columns medium-offset-3">
        <h5>Testresultaten</h5>		
          $content
      </div>
    </div>
  </div>
</div>

EOF;
$page->create();
