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
//if (!isset($includeMenu)) {
//  $includeMenu = true;
//}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $path_to_root; ?>resources/css/foundation.min.css" type="text/css">
    <title><?php echo $title; ?></title>
    <?php echo $head; ?>
  </head>

  <body>
    <?php
    if ($includeMenu) {
      require 'MenuCreator.php';
      $menu = new MenuCreator();
      $menu->path_to_root = $path_to_root;
      $menu->create();
    }
    ?>

    <?php echo $body; ?>

    <script src="<?php echo $path_to_root; ?>resources/js/vendor/jquery.min.js"></script>
    <script src="<?php echo $path_to_root; ?>resources/js/foundation.min.js"></script>
    <script>$(document).foundation();</script>
  </body>
</html>
