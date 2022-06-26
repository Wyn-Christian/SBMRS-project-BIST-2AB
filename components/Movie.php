<?php
require_once '../unirest-php/src/Unirest.php';
// /getMovies.php?id=__
$id = $_REQUEST["id"];

$bearer_token = 'eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI1MjczNmE2ODA1YTUzZjA3OTM4Yjk4NWIwYzM2YmEyMyIsInN1YiI6IjYyYjA1Y2RkYTZhNGMxMGZkODMxYWRkMyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.1fcB2PIajGtgTw53vKTE8Ioect9aswR__p9ExX8MovU';


$api_key = '52736a6805a53f07938b985b0c36ba23';
$url = "https://api.themoviedb.org/3/movie/$id?language=en&api_key=52736a6805a53f07938b985b0c36ba23&append_to_response=videos,images,credits,reviews";


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

$poster_url = "";

if ($data->poster_path) {
  $poster_url = "https://image.tmdb.org/t/p/w1280$data->poster_path";
} else {
  $poster_url = "assets/image_placeholder_poster.jpg";
}

$credits = array(
  "directors" => array(),
  "writers" => array(),
  "actors" => array(),
);

$casts = $data->credits->cast;
$crews = $data->credits->crew;
$genres = array();
$genres_id = array();
$reviews = $data->reviews->results;

$max = count($casts) > 5 ? 5 : count($casts);
for ($x = 0; $x < $max; $x++) {
  array_push($credits["actors"], $casts[$x]->name);
}

foreach ($crews as $key => $val) {
  // echo $val->name;
  if ($val->department == "Directing") {
    array_push($credits["directors"], $val->name);
    continue;
  }
  if ($val->department == "Writing") {
    if (array_search($val->name, $credits["writers"]) == "")
      if (array_search($val->name, $credits["directors"]) == "")
        array_push($credits["writers"], $val->name);
  }
}
foreach ($data->genres as $key => $val) {
  array_push($genres, $val->name);
  array_push($genres_id, $val->id);
}
?>

<div class="parallax-container" style="height: 302px;">
  <div class="parallax"><img src="<?php echo $backdrop_url ?>"></div>
</div>
<div class="section  grey lighten-4 z-depth-1">
  <div class="container">
    <div class="row">
      <div class="col s12 m6 offset-m3 l3">
        <div class="card ">
          <div class="card-image">
            <img class="materialboxed" src="<?php echo $poster_url ?>" alt="">
          </div>
        </div>
      </div>
      <div class="col s12 m10 offset-m1 l9">
        <div class="card z-depth-2">
          <div class="card-content">
            <h4 class="center">
              <?php echo $data->title ?>
            </h4>
            <?php
            if ($data->tagline) {
              echo "<div class='center'>
                <h6>
                <i>
                \"$data->tagline\"
                </i>
                </h6>
              </div>";
            }
            ?>
            <p class="grey-text text-darken-3 lighten-3">
              <?php echo $data->overview ?>
            </p>
          </div>
        </div>
      </div>
      <div class="col s12 m4 l3">
        <div class="card z-depth-2">
          <div class="card-content">
            <span class="card-title">
              Directed By:
            </span>
            <ul class="collection">
              <?php
              for ($x = 0; $x < count($credits["directors"]); $x++) {
                echo '<li class="collection-item">';
                echo $credits["directors"][$x];
                echo "</li>";
              }
              ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="col s12 m4 l3">
        <div class="card z-depth-2">
          <div class="card-content">
            <span class="card-title">
              Written By:
            </span>
            <ul class="collection">
              <?php
              for ($x = 0; $x < count($credits["writers"]); $x++) {
                echo '<li class="collection-item">';
                echo $credits["writers"][$x];
                echo "</li>";
              }
              ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="col s12 m4 l3">
        <div class="card z-depth-2">
          <div class="card-content">
            <span class="card-title">
              Actors
            </span>
            <ul class="collection">
              <?php
              for ($x = 0; $x < count($credits["actors"]); $x++) {
                echo '<li class="collection-item">';
                echo $credits["actors"][$x];
                echo "</li>";
              }
              ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="col s12 m4 l3">
        <div class="card z-depth-2">
          <div class="card-content">
            <span class="card-title">
              Genre
            </span>
            <div class="collection">
              <?php
              for ($x = 0; $x < count($genres); $x++) {
                echo "<a href='#' class='collection-item' onclick='getGenreMovies($genres_id[$x], \"$genres[$x]\", 1)'>";
                echo $genres[$x];
                echo "</a>";
              }
              ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col s12 m4 l3">
        <div class="card z-depth-2">
          <div class="card-content">
            <span class="card-title">
              Release Date
            </span>
            <ul class="collection">
              <?php
              echo '<li class="collection-item">';
              echo $data->release_date;
              echo "</li>";
              ?>
            </ul>
          </div>
        </div>
      </div>


    </div>
  </div>
</div>

<div class="parallax-container" style="height: 400px;">
  <div class="parallax"><img src="<?php echo $backdrop_url ?>"></div>
</div>
<div class="section grey lighten-4 z-depth-1 ">
  <div class="container">
    <div class="row">
      <div class="col s12">
        <h1 class="center">Review/s</h1>
      </div>
      <div class=" col s12">
        <div class="row">
          <div class='col s12 m6 l7 '>
            <?php
            if (count($reviews)) {
              for ($x = 0; $x < count($reviews); $x++) {
                $author = $reviews[$x]->author;
                $content = $reviews[$x]->content;
                $created_at = $reviews[$x]->created_at;
                echo "
              <div class='card'>
                    <div class='card-content'>
                      <span class='card-title'>
                        $author
                      </span>
                      <p>
                        $created_at
                      </p>
                      <p>
                        $content
                      </p>
                    </div>
                  </div>";
              }
            }
            ?>
          </div>
          <div class='col s12 m6 l5 '>
            <div class="card">
              <div class="card-content">

                <span class="card-title">
                  Create Comment
                </span>
                <div class="row">
                  <form class="col s12">
                    <div class="row">
                      <div class="input-field col s12">
                        <textarea id="textarea1" class="materialize-textarea"></textarea>
                        <label for="textarea1">Textarea</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <button class="btn waves-effect waves-light " type="submit" name="action">Submit
                          <i class="material-icons right">send</i>
                        </button>
                      </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>
</div>

<script>
AOS.init()
M.AutoInit();
window.scrollTo(0, 0)
</script>