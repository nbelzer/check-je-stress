<?php
/**
 * Deze PHP class bevat functies voor een (top-bar) menu.
 */
class MenuCreator {

  var $path_to_root;
  var $menu_items;

  function create()
  {
    $menu = (new MenuBuilder)
      ->appendSubmenu(
        (new MenuBuilder('Index', $path_to_root))
          ->appendElement('Hello', $path_to_root . 'howareyou')
          ->appendElement('HAX', $path_to_root . '360noscope')
        )
      ->appendElement('Information', $path_to_root . 'information')
      ->build();

    /*
     * Zet het menu in elkaar, plaatst eerst de beforemenu variabele en de
     * aftermenu variabele.
     */
    echo $this->beforeMenu;
    echo $menu;
    echo $this->afterMenu;
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

/**
 * Stelt een element van het menu voor. Deze class kan het menu bouwen op een
 * soort recursieve manier...
 */
class MenuBuilder {

  /**
   * Maakt een nieuwe MenuBuilder.
   * @param string $title de label van deze menu entry
   * @param string $link de link waar deze entry naar moet verwijzen
   */
  function __construct($title = null, $link = null) {
    $this->title = $title;
    $this->link = $link;
  }

  private $title;
  private $link;

  /**
   * Bevat de elementen van dit menu element, als het een dropdown is.
   */
  var $children;

  /**
   * Voegt een MenuBuilder toe aan dit submenu.
   *
   * @return MenuBuilder deze MenuBuilder, for chaining
   */
  function appendSubmenu($menu_builder) {
    if (!isset($this->children)) {
      $this->children = array();
    }
    array_push($this->children, $menu_builder);
    return $this;
  }

  /**
   * Voegt een element toe aan dit menu.
   *
   * @return MenuBuilder deze MenuBuilder, for chaining
   */
  function appendElement($title, $link) {
    if (!isset($this->children)) {
      $this->children = array();
    }
    array_push($this->children, new MenuBuilder($title, $link));
    return $this;
  }

  /**
   * Bouwt dit element van het menu.
   *
   * @return string bruikbare HTML-code van dit menu
   */
  function build() {
    if (is_array($this->children)) {
      $output = "<li><a href=\"{$this->link}\">{$this->title}</a><ul class=\"menu vertical\">";
      foreach ($this->children as $child) {
        $output .= $child->build();
      }
      $output .= '</ul></li>';
      return $output;
    } else {
      return "<li><a href=\"{$this->link}\">{$this->title}</a></li>";
    }
  }

}
