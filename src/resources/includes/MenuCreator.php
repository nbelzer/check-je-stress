<?php
/**
 * Deze PHP class bevat functies voor een (top-bar) menu.
 */
class MenuCreator {

  var $menu_items;

  function create()
  {
    /*
     * Bij elementen van het main menu (de menubalk) moet je telkens strings van
     * MenuBuilders aan elkaar plakken door .build() te gebruiken. Bij submenus
     * van submenus kun je ->appendSubmenu() doen.
     */
    global $path_to_root;

    $menu =
//      (new MenuBuilder('Index', $path_to_root))->build() .
//      (new MenuBuilder('Information', $path_to_root . 'info/'))->build() .
//      (new MenuBuilder('Locations', $path_to_root . 'locs/'))->build();
      (new MenuBuilder('INDEX', $path_to_root))
        ->appendElement('HELLO', $path_to_root . 'howareyou')
        ->appendElement('HAX', $path_to_root . '360noscope')
        ->build()
      . (new MenuBuilder('INFORMATION', $path_to_root . 'info/'))
        ->build()
      . (new MenuBuilder('LOCATIONS', $path_to_root . 'locations'))
        ->appendElement('AMSTERDAM', $path_to_root . 'locs/adam')
        ->appendSubmenu((new MenuBuilder('MIDDELBURG', $path_to_root .
          'locs/mburg'))
          ->appendElement('LANGE JAN', $path_to_root . 'locs/mburg/langejan')
          ->appendSubmenu((new MenuBuilder('NEHALENNIA', $path_to_root .
            'locs/mburg/neh'))
            ->appendElement('BREEWEG', $path_to_root . 'locs/mburg/neh/brwg')
            ->appendElement('KRUISWEG', $path_to_root . 'locs/mburg/neh/krswg')
          )
        )
        ->appendElement('VLISSINGEN', $path_to_root . 'locs/flushing')
        ->build()
      . (new MenuBuilder('DOELGROEP', $path_to_root . 'doelgroep/'))
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
  <div class="top-bar">
    <div class="top-bar-title">
      <span data-responsive-toggle="responsive-menu" data-hide-for="medium"
      style="padding: 1em">
        <span class="menu-icon" data-toggle>
        </span>
        <strong style="color: white; margin-left: 1em;">CHECKJESTRESS
        .NL</strong>
      </span>
    </div>
    <div class="row" id="responsive-menu">
      <div class="medium-10 medium-centered columns">
        <div class="title" data-hide-for="small">CHECKJESTRESS.NL</div>
        <ul class="menu dropdown" data-dropdown-menu>';

var $afterMenu = '
        </ul>
      </div>
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
