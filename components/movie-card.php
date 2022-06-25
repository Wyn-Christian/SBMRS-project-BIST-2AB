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
$overview = isset($_REQUEST["overview"]) ? $_REQUEST["overview"] : "";
$id = $_REQUEST["id"];

$aos = $_REQUEST["aos"];

?>

<div class="col s12 m6 l4" data-aos="<?php echo $aos ?>">
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
      <img src="<?php echo $img_url ?>" class="hide" onload="displayImage(this)" onclick="getMovie(<?php echo $id ?>)"
        style="max-width: none;">

    </div>
    <div class="card-content movie-link activator">
      <span class="card-title truncate activator" style="cursor: help;"><?php echo $title ?></span>
      <p class="truncate activator"><?php echo $overview ?></p>
    </div>
    <div class="card-reveal" style="cursor: default;">
      <span class="card-title grey-text text-darken-4">
        <?php echo $title ?>
        <i class="material-icons right">close</i>
      </span>
      <div>

        <h5>
          Overview:
        </h5>
        <p>
          <?php echo $overview ?>
        </p>
      </div>
    </div>
  </div>
</div>