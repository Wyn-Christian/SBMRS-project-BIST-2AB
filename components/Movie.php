<?php
require_once '../unirest-php/src/Unirest.php';
// /getMovies.php?id=__
$id = $_REQUEST["id"];

$bearer_token = 'eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI1MjczNmE2ODA1YTUzZjA3OTM4Yjk4NWIwYzM2YmEyMyIsInN1YiI6IjYyYjA1Y2RkYTZhNGMxMGZkODMxYWRkMyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.1fcB2PIajGtgTw53vKTE8Ioect9aswR__p9ExX8MovU';


$api_key = '52736a6805a53f07938b985b0c36ba23';
$url = "https://api.themoviedb.org/3/movie/$id?language=en&api_key=52736a6805a53f07938b985b0c36ba23&append_to_response=videos,images,credits";


$response = Unirest\Request::get($url);

$response->code;        // HTTP Status code
$response->headers;     // Headers
$data = $response->body;        // Parsed body
$body_raw = $response->raw_body;

$backdrop_url = "";

if ($data->backdrop_path) {
  $backdrop_url = "https://image.tmdb.org/t/p/w1280$data->backdrop_path";
} else {
  $backdrop_url = "assets/image_placeholder_backtrop.png";
}


?>

<div class="parallax-container">
  <div class="parallax"><img src="<?php echo $backdrop_url ?>"></div>
</div>
<div class="section">
  <div class="container">
    <div class="row">
      <div class="col s12 m10 offset-m1  m10 offset-l1">
        <div class="card z-depth-2">
          <div class="card-content">
            <h2 class="center">
              <?php echo $data->title ?>
            </h2>
            <p class="grey-text text-darken-3 lighten-3">
              <?php echo $data->overview ?>
            </p>
          </div>
        </div>
      </div>

    </div>

  </div>
</div>
<script>
M.AutoInit();
</script>