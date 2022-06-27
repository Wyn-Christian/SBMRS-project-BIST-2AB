<?php
require_once '../unirest-php/src/Unirest.php';
// /getMovies.php?id=__
$id = $_REQUEST["id"];


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

          <div class='col s12 m6 l7' id="comment-list">
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
            <!-- User Promp Comment -->
            <div class="card">
              <div class="card-content">

                <!-- movie-comment form -->
                <div id="create-comment-section">
                  <span id="comment-title" class="card-title center">
                    Create Comment
                  </span>
                  <span class="card-title user-name">
                    USER
                  </span>
                  <div class="row">

                    <form class="col s12" id="movie-comment-form">
                      <div class="row">
                        <div id="comment-area" class="input-field col s12">
                          <textarea id="create-comment" name="comment" class="materialize-textarea"></textarea>
                          <label for="create-comment">Put your comment here...</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <button class="btn waves-effect waves-light " id="submit-create-comment" type="submit"
                            name="action">Submit
                            <i class="material-icons right">send</i>
                          </button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>

              <!-- View Comment -->
              <div id="view-comment-section">
                <span id="comment-title" class="card-title center">
                  Your Comment
                </span>
                <span class="card-title user-name">
                  USER
                </span>
                <div class="card-content">
                  <p id="view-comment">
                    some comment
                  </p>
                </div>
                <button class="btn waves-effect waves-light " id="view-comment" onclick="openEditComment()">Edit
                  <i class="material-icons right">edit</i>
                </button>
                <a class="btn waves-effect waves-light modal-trigger red" href="#confirm-delete" onclick="">Delete
                  <i class="material-icons right">edit</i>
                </a>
              </div>

              <!-- Edit Comment -->
              <div id="edit-comment-section" class="hide">
                <span class="card-title center">
                  Edit Comment
                </span>
                <span class="card-title user-name">
                  USER
                </span>
                <div class="row">

                  <form class="col s12" id="edit-comment-form">
                    <div class="row">
                      <div id="comment-area" class="input-field col s12">
                        <textarea id="edit-comment" name="comment" class="materialize-textarea">Some comment</textarea>
                        <label for="edit-comment" class="active">Edit your comment here...</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                          <i class="material-icons right">send</i>
                        </button>
                      </div>
                    </div>
                  </form>

                  <div class="col">
                    <button class="btn waves-effect waves-light " onclick="openViewComment();">Cancel
                      <i class="material-icons right">cancel</i>
                    </button>
                  </div>
                </div>
              </div>

            </div>
          </div>

        </div>

      </div>
    </div>

  </div>
</div>

<!-- Modal Structure -->
<div id="confirm-delete" class="modal">
  <div class="modal-content">
    <h4>Delete confirmation</h4>
    <p>Are you sure you want to delete your comment in this movie?</p>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-close waves-effect waves-green btn-flat red"
      onclick="deleteComment(<?php echo $id ?>, USER.ID)">Delete</a>
    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancel</a>
  </div>
</div>


<script>
AOS.init()
M.AutoInit();
window.scrollTo(0, 0)
movie = <?php echo $id ?>;
apireviews = <?php echo json_encode($reviews) ?>;

if (USER != null) {
  $(".user-name").html(`${USER.firstname} ${USER.lastname}`)
  $("#create-comment").removeAttr("disabled")
  $("#submit-create-comment").removeClass("disabled")
  checkCommentById(movie, USER.ID)
  getOtherComments(movie, USER.ID)
} else {
  $(".user-name").html("Please log in first...")
  $("#create-comment").attr("disabled", "disabled")
  $("#submit-create-comment").addClass("disabled")

  $("#create-comment-section").removeClass("hide");
  $("#view-comment-section").addClass("hide");
  $("#edit-comment-section").addClass("hide");

  getOtherComments(movie)
}
getAllReviews(movie);


$("#movie-comment-form").submit((e) => {
  e.preventDefault();
  let comment = $("#movie-comment-form").serializeArray()

  createComment(movie, USER.ID, comment[0].value);
  emptyInput(comment);
  getAllReviews(movie);

})

$("#edit-comment-form").submit((e) => {
  e.preventDefault();
  let comment = $("#edit-comment-form").serializeArray()
  updateComment(movie, USER.ID, comment[0].value);
  getAllReviews(movie);

})
</script>