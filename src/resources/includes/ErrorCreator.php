<?php

/**
 * Met deze PHP class kunnen pagina's voor de custom error pages gemaakt worden.
 */
class ErrorCreator {

  /**
   * De titel van de test.
   */
  var $title;

  /**
   * De error code.
   */
  var $code;

  /**
   * Het bericht dat moet worden weergegeven als error message.
   */
  var $message;

  /**
   * Print de testpagina op de website. Gebruikt de variabelen uit deze
   * TestCreator instance.
   */
  function create() {
    // '../' omdat deze class altijd aangeroepen wordt vanuit de /error/ map.
    require_once '../resources/includes/PageCreator.php';
    $page = new PageCreator;
    $page->path_to_root = $this->findRoot();
    $page->title = $this->title;

		$page->body = <<<CONTENT
      <section class="water">
        <div class="content">
          <div class="row">
            <div class="medium-10 medium-centered columns">
              <div class="medium-9 columns medium-offset-3">
                <h1>Error $this->code</h1>
                <p>
                  Beste bezoeker,
                  <br><br>
                  $this->message
                  <br>
                  Onze excuses voor het ongemak.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>
CONTENT;

    $page->create();
  }

  /**
   * Zoekt de root van de website.
   *
   * @return string het pad naar de webroot map
   */
  function findRoot() {
    $current_path = '';
    $end_url = strpos($_SERVER[REQUEST_URI], '?');
    if ($end_url == 0) {
      $slash_number = substr_count($_SERVER[REQUEST_URI], '/', 1);
    } else {
      $slash_number = substr_count($_SERVER[REQUEST_URI], '/', 1, $end_url);
    }
    for ($i = 0; $i < $slash_number - 1; $i++) {
      $current_path .= '../';
    }
    return $current_path;
  }

}
