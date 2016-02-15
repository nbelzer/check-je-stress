<?php
include 'resources/includes/PageCreator.php';
$page = new PageCreator;
$page->title = "Check je stress";
$page->head = "<link rel=\"stylesheet\" href=" .$path_to_root . "resources/css/specific/index.css type=\"text/css\">";
$page->body = <<<CONTENT

<div class="indexImage" style="background-image: url('resources/img/frontpage.svg');">
  <div class="row">
    <!--<ul class="title">
        <li><img src="resources/img/logo_vector.svg" class="logo"></li>
        <li><h1><div class="logoTitle">Check Je Stress</div></h1></li>
      </ul>-->
  </div>
</div>


<div class="row">
  <a href="#">
    <div class="small-12 medium-3 columns indexElement indexButton">
      Doe een test
    </div>
  </a>
  <a href="info/index.php">
    <div class="small-12 medium-3 columns indexElement indexButton">
      Informatie
    </div>
  </a>
  <a href="#">
    <div class="small-12 medium-3 columns indexElement indexButton">
      Contact
    </div>
  </a>
  <a href="#">
    <div class="small-12 medium-3 columns indexElement indexButton">
      Contact
    </div>
  </a>
</div>

<div class="row indexElement">
  <a href="resources/img/index.html">Index for images</a>
</div>

<script>
// This script only works when placed after loading jquery.
  $(function() {
    var \$elems = $('.top-bar');
    var winheight = $(window).height();
    var fullheight = $(document).height();

    $(window).scroll(function(){
      animate_elems();
    });

    function animate_elems() {
      wintop = $(window).scrollTop();

    \$elems.each(function() {
      \$elm = $(this);

      if (\$elm.hasClass('animated')) { return true; }

      topcoords = \$elm.offset().top;

      if (wintop > 0) {
        \$elm.addClass('animated');
      }
    });
  }
});
</script>

CONTENT;
$page->includeMenu = true;
$page->create();
