<?php
/**
 * Deze PHP class bevat functies voor een (top-bar) menu.
 */
class MenuCreator {
 /**
  * Menu items
  */
  var $menuItems = array(
    array(
      "title" => "Index",
      "link" => "/",
      "items" => array(
        array(
          "title" => "Hello",
          "link" => "How are you?"
        ),
        array(
          "title" => "HAX",
          "link" => "360noscope"
        )
      )
    ),
    array(
      "title" => "Information",
      "link" => "/information"
    )
  );

  function create()
  {
    /*
     * Zet het menu in elkaar, plaatst eerst de beforemenu variabele en de
     * aftermenu variabele.
     */
    echo $this->beforeMenu;

    foreach ($this->menuItems as $item) {
      if ($item['items'] != null) $this->placeDropdown($item);
      else $this->placeItem($item);
    }

    echo $this->afterMenu;
  }

  function placeItem($item) {
    /*
     * Voegt een item toe aan het menu.
     */
    $title = $item['title'];
    $link = $item['link'];

    echo "<li><a href=\"$link\">$title</a></li>";
  }

  function placeDropdown($item) {
    /*
     * Voegt een dropdown menu toe aan het menu.
     */
    $title = $item['title'];
    $link = $item['link'];
    $items = $item['items'];

    echo "
  <li>
    <a href=\"$link\">$title</a>
    <ul class=\"menu vertical\">
";
    foreach ($items as $item) {
      $this->placeItem($item);
    }
    echo"
    </ul>
  </li>
";
  }

  /*
   * Variabelen nodig voor het menu
   */
  var $beforeMenu = '
<!--  Menu Bar -->
  <!-- Toggle for smaller screens -->
    <div class="title-bar" data-responsive-toggle="top-menu" data-hide-for="medium">
      <button class="menu-icon" type="button" data-toggle></button>
      <div class="title-bar-title">Menu</div>
    </div>
  <!-- Actual Menu -->
    <div class="top-bar" id="top-menu">
      <div class="top-bar-left">
        <ul class="dropdown menu" data-dropdown-menu>';
  var $afterMenu = '
        </ul>
      </div>
    </div>
<!-- End Menu Bar -->
  ';
}