<?php

include '../resources/includes/PageCreator.php';
$page_creator = new PageCreator;
$page_creator->path_to_root = '../';

/* Inhoud van de navigatiebalk waar de administrator bestanden kan selecteren om
   de tekst aan te passen */
$navigation = <<<EOF
  <ul>
    <li><a href="admin/editor.php?page=index.php">Home</a></li>
    <li><a href="admin/editor.php?page=doelgroep/index.php">Doelgroep</a></li>
    <li><a href="admin/editor.php?page=doelgroep/bedrijf.php">Doelgroep -> Bedrijf</a></li>
    <li><a href="admin/editor.php?page=doelgroep/particulier.php">Doelgroep -> Particulier</a></li>
    <li><a href="admin/editor.php?page=info.php">Info</a></li>
    <li><a href="admin/editor.php?page=steunpunten/index.php">Steunpunten</a></li>
    <li><a href="admin/editor.php?page=steunpunten/vacatures.php">Steunpunten -> Vacatures</a></li>
    <li><a href="admin/editor.php?page=contact.php">Contact</a></li>
    <li><a href="admin/editor.php?page=colofon.php">Colofon</a></li>
  </ul>
EOF;

// Maak de inhoud van de editor
if (isset($_GET['page'])) {
  $page = $_GET['page'];
  if (isset($_POST['contents'])) {
    // De admin heeft zojuist een pagina aangepast.
    $page_creator->mysql->getPageSQL()->updatePageBody($page, $_POST['contents']);
    $editor = <<<EOF
      <p>De pagina $page is aangepast.</p>
EOF;
  } else {
    // De admin heeft een bestand geselecteerd om aan te passen. Geef de editor weer.
    $page_contents = $page_creator->mysql->getPageSQL()->getPageBody($page);
    $editor = <<<EOF
      <form action="admin/editor.php?page=$page" method="POST">
        <textarea name="contents" id="editor1">$page_contents</textarea>
        <script>
          CKEDITOR.replace('editor1');
        </script>
        <input type="submit" class="button" value="Aanpassen" />
      </form>
EOF;
  }
} else {
  // De admin heeft nog geen pagina geselecteerd om aan te passen.
  $editor = <<<EOF
    <p>Selecteer een pagina om aan te passen in de navigatie.</p>
EOF;
}

// Maak de editor.php pagina
$page_creator->title = "CheckJeStress - Editor";
$page_creator->head = <<<EOF
  <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
  <link rel="stylesheet" href="resources/css/specific/information.css" type="text/css">
EOF;
$page_creator->body = <<<EOF
  <div class="indexImage" style="background-image: url('resources/img/beach.gif');">
  </div>

  <div class="content">
    <div class="row">
      <div class="medium-10 medium-centered columns">

        <div class="medium-3 columns show-for-medium">
          <div class="navmenu">
            <ul>
              $navigation
            </ul>
          </div>
        </div>

        <div class="medium-9 columns">
          <section class="text water" id="first">
            <div class="row">
              <div class="medium-10 medium-centered columns">
                <div class="medium-9 columns medium-offset-3">
                  $editor
                </div>
              </div>
            </div>
          </section>
        </div>

      </div>
    </div>
  </div>
EOF;
$page_creator->create();
