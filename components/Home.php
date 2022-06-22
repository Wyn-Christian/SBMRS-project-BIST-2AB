<?php
session_start();
$name;
if (isset($_SESSION["user"])) {
  $name = $_SESSION["user"];
} else {
  $name = "stanger";
}
session_unset();
?>

<div id="home">
  <div class="parallax-container">
    <div class="parallax">
      <img src="https://picsum.photos/1000/800" alt="background img">
    </div>
  </div>
  <div class=" section white hoverable">
    <div class="row container ">
      <h2 class="header">Welcome,
        <?php
        echo $name
        ?>
      </h2>
      <p class="grey-text text-darken-3 lighten-3">
        This is a Sentiment Based Movie Rating Website
      </p>
    </div>
  </div>
  <div class="parallax-container">
    <div class="parallax">
      <img src="https://picsum.photos/1000/900" alt="background img">
    </div>
  </div>
</div>
<script>
M.AutoInit();
</script>