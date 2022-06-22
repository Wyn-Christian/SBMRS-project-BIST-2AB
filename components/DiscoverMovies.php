<script>
checkWindowsSize()
</script>
<div class="row container">
  <div class="col s12 m4 l3">
    <div class="card">
      <div class="collection">
        <div class="collection-header center">
          <h4>Categories</h4>
        </div>
        <div class="divider"></div>
        <a href="#!" class="collection-item" onclick="getMovies('discover',1, this)">Discover</a>
        <a href="#!" class="collection-item" onclick="getMovies('popular',1, this)">Popular</a>
        <a href="#!" class="collection-item" onclick="getMovies('top_rated',1, this)">Top Rated</a>
        <a href="#!" class="collection-item" onclick="getMovies('trending',1, this)">Trending this week</a>
      </div>
    </div>

  </div>
  <div class="col s12 m8 l9 movie-list">
    <div class="row movies-list">
    </div>
  </div>
</div>
</div>