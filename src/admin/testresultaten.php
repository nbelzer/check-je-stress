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
    <p>Kies een test:</p>
    <ul>
      <li><a href="$self?test=snel">Snelle test</a></li>
      <li><a href="$self?test=uitgebreid">Uitgebreide test</a></li>
      <li><a href="$self?test=risicoanalyse">Risicoanalyse</a></li>
    </ul>
EOF;
}

$page->title = "CheckJeStress - Testresultaten";
$page->body = <<<EOF
  <div class="content">
    <section class="text water" id="first">
      <div class="row">
        <div class="medium-10 medium-centered columns">
          <div class="medium-9 columns medium-offset-3">
            <h3>Testresultaten</h3>
            $content
          </div>
        </div>
      </div>
    </section>
  </div>
EOF;
$page->create();
