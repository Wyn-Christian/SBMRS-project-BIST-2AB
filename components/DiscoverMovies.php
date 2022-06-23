<?php
$p = $_REQUEST["page"]
?>
<script>
// window.onresize = checkWindowsSize
getMovies('discover', 1)
</script>


<div class="row container">
  <div class="col s12 m4 l3 search-bar">
    <div class="card z-depth-1">
      <div class="collection">
        <div class="collection-header center">
          <h4>Categories</h4>
        </div>
        <div class="divider"></div>
        <a href="#" class="collection-item active" onclick="getMovies('discover',1, this)">Discover</a>
        <a href="#" class="collection-item" onclick="getMovies('popular',1, this)">Popular</a>
        <a href="#" class="collection-item" onclick="getMovies('top_rated',1, this)">Top Rated</a>
        <a href="#" class="collection-item" onclick="getMovies('trending',1, this)">Trending this week</a>

        <ul class="pagination center">
          <li class="disabled active" id="firstpage" onclick="getMoviesPage(1, this)">
            <a href="#">1</a>
          </li>
          <li class="waves-effect" onclick="getMoviesPage(2, this)">
            <a href="#">2</a>
          </li>
          <li class="waves-effect" onclick="getMoviesPage(3, this)">
            <a href="#">3</a>
          </li>
          <li class="waves-effect" onclick="getMoviesPage(4, this)">
            <a href="#">4</a>
          </li>
          <li class="waves-effect" onclick="getMoviesPage(5, this)">
            <a href="#">5</a>
          </li>
        </ul>

      </div>
    </div>

  </div>
  <div class="col s12 m8 l9 movie-list">
    <div class="row movies-list">
    </div>
  </div>
</div>