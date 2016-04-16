<?php

/**
 * Deze PHP class bevat functies waarmee een pagina met een stuk tekst gemaakt
 * kan worden.
 *
 * @package CheckJeStress
 */
class TextPageCreator {

  /**
   * Het pad naar de root van de installatie van de website, gezien vanaf de
   * pagina die deze class aanroept. Voorbeelden: bij info/index.php zou dit
   * '../' zijn; bij doelgroep/bedrijven/index.php zou dit '../../' zijn. Het
   * zetten van deze variabele is verplicht voor pagina's die niet in de webroot
   * staan.
   */
  var $path_to_root;

  var $title;

  /**
   * Associated array met telkens de titel van een stukje content gelinkt aan de
   * content. Voorbeeld:
   * $page->content = array(
   *   "De auto" => "<p>Een auto is iets anders dan een fiets omdat blurgh.</p>"
   * )
   */
  var $content;

  /**
   * Geeft de pagina voor op de website. Gebruikt de variabelen uit deze
   * PageCreator instance.
   */
  function create() {
    include 'PageCreator.php';
    $page = new PageCreator();
    $page->path_to_root = $this->path_to_root;
    $page->title = $this->title;
    $page->head = '<link rel="stylesheet" href="resources/css/specific/information.css" type="text/css">';

    $side_menu = <<<EOF
      <div class="row show-for-medium">
        <div class="medium-10 medium-centered columns">
          <div class="navmenu">
            <ul class="vertical menu" data-magellan data-options="barOffset:40">
EOF;

    $page_contents = '';

    // Array counter. The color of the section depends on if this number is odd
    // or even.
    $count = 0;

    // Creating page contents
    foreach ($content as $title => $text) {
      $count++;
      $color = ($count % 2 == 0) ? 'dark' : 'water';

      // Add the section to the side menu
      $underscored_title = str_replace(' ', '_', $title);
      $side_menu .= "<li><a href=\"#$underscored_title\">$title</a></li>";

      // Append the section to the page
      $page_contents .= <<<EOF
        <section class="text $color" id="$underscored_title">
          <div class="row">
            <div class="medium-10 medium-centered columns">
              <div class="medium-9 columns medium-offset-3">
                $text
              </div>
            </div>
          </div>
        </section>
EOF;
    }

    $side_menu .= <<<EOF
            </ul>
          </div>
        </div>
      </div>
EOF;

    // Create the page out of $side_menu and $page_contents.
    $page->body = <<<EOF
      <div class="content">
        $side_menu

        $page_contents
      </div>
EOF;

    $page->create();
  }

}
