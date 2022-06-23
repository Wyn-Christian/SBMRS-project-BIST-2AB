<?php
$noimg = false;

if ($_REQUEST["img_url"] != 'null') {
  $url = $_REQUEST["img_url"];
  $img_url = "https://www.themoviedb.org/t/p/w500/$url";
} else {
  $noimg = true;
  $img_url = "https://www.themoviedb.org/assets/2/v4/glyphicons/basic/glyphicons-basic-38-picture-grey-c2ebdbb057f2a7614185931650f8cee23fa137b93812ccb132b9df511df1cfac.svg";
}

$title = $_REQUEST["title"];
$overview = $_REQUEST["overview"];
$id = $_REQUEST["id"];
?>

<div class="col s12 m6 l4">
  <div class="card hoverable movie-card">

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

    <div class="card-image waves-effect waves-block waves-light movie-info" style="background-color: #dbdbdb;">
      <img src="<?php echo $img_url ?>" class="hide activator" onload="displayImage(this)" style="max-width: none;">

    </div>
    <div class="card-content movie-link" onclick="getMovie(<?php echo $id ?>)">
      <span class="card-title truncate"><?php echo $title ?></span>
      <p class="truncate"><?php echo $overview ?></p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">
        <?php echo $title ?>
        <i class="material-icons right">close</i>
      </span>
      <h5>
        Overview:
      </h5>
      <p>
        <?php echo $overview ?>
      </p>
    </div>
  </div>
</div>