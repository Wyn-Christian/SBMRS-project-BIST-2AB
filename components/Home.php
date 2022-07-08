<?php
$img_url1 = "https://image.tmdb.org/t/p/w1280" . $_REQUEST["url_1"];
$img_url2 = "https://image.tmdb.org/t/p/w1280" . $_REQUEST["url_2"];

?>

<div id="home">
  <div class="parallax-container">
    <div class="parallax">
      <img src="<?php echo $img_url1 ?>" alt="background img">
    </div>
  </div>
  <div class="section white hoverable">
    <div class=" row container">
      <h2 class="header">Welcome,
        <span class="home-name">
          Guest
        </span>
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

</div>
<script>
  M.AutoInit();
  if (USER != null) {
    console.log("haha")
    $(".home-name").html(USER.firstname)
  }
</script>