<?php

/*
 * Dit is een standaardpagina voor op de website. Voor het includen van deze
 * pagina moet een aantal variabelen geïnitialiseerd worden:
 * $title: bevat de paginatitel.
 * $head: bevat extra inhoud voor binnen de head tag. Optioneel.
 * $body: bevat de inhoud van de pagina, binnen de body tag.
 */
 if (!isset($title)) {
   trigger_error('Paginatitel niet geïnitialiseerd!', E_USER_WARNING);
 }
 if (!isset($body)) {
   trigger_error('Deze pagina is leeg!', E_USER_NOTICE);
 }
if (!isset($includeMenu)) {
  $includeMenu = true;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <base href="<?php echo $path_to_root; ?>">
    <title><?php echo $title; ?></title>
    <meta name="description" content="Heb jij de symptomen van een burnout? Doe de test! Stress is onvermijdelijk: vroeg of laat kun je ermee te maken krijgen. Bewezen effectieve methode.">
    <meta name="keywords" content="test,stresstest,ziekteverzuim preventie,burnout,stress,balans">
    <meta name="author" content="Serge Janssen">
    <meta name="creator" content="CheckJeStress">
    <meta name="publisher" content="CheckJeStress">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/css/foundation.min.css" type="text/css">
    <link rel="stylesheet" href="resources/css/stress.css" type="text/css">
    <?php echo $head; ?>
  </head>

  <body>
    <?php
    if ($includeMenu) {
      require 'MenuCreator.php';
      $menu = new MenuCreator();
      $menu->create();
    }
    ?>
    <div class="content">
      <div class="large-10 medium-centered columns">
        <?php echo $body; ?>
      </div>
    </div>

    <script src="resources/js/vendor/jquery.min.js"></script>
    <script src="resources/js/foundation.min.js"></script>
    <script>$(document).foundation();</script>
    <script>
      $(function() {
        var $elems = $('.top-bar');
        var winheight = $(window).height();
        var fullheight = $(document).height();

        $(window).scroll(function () {
          animate_elems();
        });

        function animate_elems() {
          wintop = $(window).scrollTop(); // calculate distance from top of window

          // loop through each item to check when it animates
          $elems.each(function () {
            $elm = $(this);

            topcoords = $elm.offset().top; // element's distance from top of page in pixels

            if (wintop > 5) {
              $elm.addClass('scrolled');
            } else if (wintop <= 5) {
              $elm.removeClass('scrolled');
            }
          });
        }
      });
    </script>
  </body>
</html>
