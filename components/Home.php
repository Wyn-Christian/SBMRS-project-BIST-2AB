<?php
session_start();
$name;
if (isset($_SESSION["user"])) {
  $name = $_SESSION["user"];
} else {
  $name = "Guest";
}
session_unset();

$img_url1 = "https://image.tmdb.org/t/p/w1280" . $_REQUEST["url_1"];
$img_url2 = "https://image.tmdb.org/t/p/w1280" . $_REQUEST["url_2"];

?>

<div id="home">
  <div class="parallax-container">
    <div class="parallax">
      <img src="<?php echo $img_url1 ?>" alt="background img">
    </div>
  </div>
  <div class=" section white hoverable">
    <div class="row container ">
      <h2 class="header">Welcome,
        <?php
        echo $name
        ?>
      </h2>
      <h5 class="grey-text text-darken-3 lighten-3">
        This is Sentiment Based Movie Rating System
      </h5>
    </div>
  </div>
  <div class="parallax-container">
    <div class="parallax">
      <img src="<?php echo $img_url2 ?>" alt="background img">
    </div>
  </div>
  <div class=" section blue white-text">
    <div class="row container ">
      <h1>This is footer</h1>
    </div>
  </div>
</div>
<script>
M.AutoInit();
</script>