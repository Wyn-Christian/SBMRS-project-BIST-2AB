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
    <div class="card z-depth-1" style="padding-top: 50px;">
      <div class="row ">
        <div class="col s12">
          <h4 class="center">Search Movies</h4>
        </div>
        <div class="col s12">
          <div class="input-field container">
            <input id="search_movie" type="text" class="validate" oninput="searchMovies(this.value, 1);">
            <label for="search_movie">Search here...</label>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col s12 m8 l9 movie-list">
    <div class="row movies-list">
    </div>
  </div>
</div>