<?php
$current_page = $_REQUEST["page"];
$current_id = $_REQUEST["genre_id"];
$genre = $_REQUEST["genre"];
?>
<style>
.movie-list {
  display: flex;
  flex-wrap: wrap;
  flex-direction: row;
  align-items: center;
}

.search-bar {
  z-index: 99;
  position: sticky;
  top: 3.7em;
}
</style>
<div class="row container">
  <div class="col s12 m4 l3 search-bar x">
    <div class="card z-depth-1">
      <div class="row ">
        <div class="col s12">
          <h4 class="center">
            <?php echo $genre ?>
          </h4>
        </div>
        <div class="col s12">
          <div class="divider"></div>

          <ul class="pagination center page-list">
            <?php
            $min = $current_page < 3 ? 1 : $current_page - 2;
            $max = $current_page < 3 ? 6 : $current_page + 3;
            for ($x  = $min; $x < $max; $x++) {
              if ($x == $current_page) {
                echo "<li class='disabled active' id=$x onclick='getGenreMovies($current_id, \"$genre\", $x, true)'>
                        <a href='#'>$x</a>
                      </li>";
              } else {
                echo "<li class='waves-effect' id=$x onclick='getGenreMovies($current_id, \"$genre\", $x, true)'>
                        <a href='#'>$x</a>
                      </li>";
              }
            }
            ?>
          </ul>

        </div>
      </div>
    </div>
  </div>

  <div class="col s12 m8 l9 movie-list">
    <div class="row movies-list">
    </div>
  </div>
</div>