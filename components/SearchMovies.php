<script>
checkWindowsSize()
</script>
<div class="row container">
  <div class="col s12 m4 l3 ">
    <div class="card">
      <div class="row ">
        <div class="col s12">
          <h4 class="center">Search Movies</h4>
        </div>
        <div class="col s12">

          <div class="input-field container">
            <input id="search_movie" type="text" class="validate" onkeyup="searchMovies(this.value, 1)">
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