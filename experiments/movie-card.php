<?php
$img_url = $_REQUEST["img_url"];
$title = $_REQUEST["title"];
$overview = $_REQUEST["overview"];
?>

<div class="col s12 m6 l4 ">
  <div class="card hoverable movie-card" style="height: 500;">

    <!-- Preloader -->
    <div class="preloader-wrapper big active">
      <div class="spinner-layer spinner-blue-only">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div>
        <div class="gap-patch">
          <div class="circle"></div>
        </div>
        <div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>
    </div>

    <div class="card-image">
      <img src="https://www.themoviedb.org/t/p/w500/<?php echo $img_url ?>" class="hide" onload="displayImage(this)">

    </div>
    <div class="card-content">
      <span class="card-title truncate "><?php echo $title ?></span>
      <p class="truncate"><?php $overview ?></p>
    </div>
  </div>
</div>