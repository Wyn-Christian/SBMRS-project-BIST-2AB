<?php
require_once 'unirest-php/src/Unirest.php';

$genre_url = "https://api.themoviedb.org/3/genre/movie/list?api_key=52736a6805a53f07938b985b0c36ba23&language=en";

$response = Unirest\Request::get($genre_url);
$body = $response->body;        // Parsed body
$genres = $body->genres;
?>

<style>
  .navbar-style {
    background-color: #24252a !important;
  }

  .sidenav-close,
  .genres-sidenav {
    color: white !important;
  }

  .nav-components {
    height: 100px !important;
    text-align: center !important;
    vertical-align: middle !important;
    line-height: 100px !important;
  }
</style>

<div class="navbar-fixed">
  <nav>
    <div class="nav-wrapper navbar-style" style="height: 100px">
      <a class="center brand-logo" style="height: 100%; padding: 10px 0;" href=""><img style="height: 100%" src="assets/logo.png" alt=""></a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons nav-components">menu</i></a>
      <ul id="nav-mobile" class=" hide-on-med-and-down">
        <li class="nav-page nav-components">
          <a href="#" onclick="navigate('Home')">
            Home
          </a>
        </li>
        <li class="nav-page nav-components">
          <a href="#" onclick="navigate('DiscoverMovies')">
            Discover movies
          </a>
        </li>
        <li class="nav-page nav-components">
          <a href="#" onclick="navigate('SearchMovies')">
            Search movies
          </a>
        </li>
        <li class="nav-page nav-components">
          <a class="dropdown-trigger" href="#" data-target="dropdown1">
            Genres
            <i class="material-icons right nav-components">arrow_drop_down</i>
          </a>
        </li>
      </ul class="nav-page">
      <ul id="nav-mobile" class="right hide-on-med-and-down">

        <li class="nav-account hide"><a href="#" onclick="navigate('Account')">Account</a></li>
        <li class="nav-logout hide"><a href="#" onclick="logoutUser()">Log-out</a></li>
        <li class="nav-register nav-components"><a href="#" onclick="navigate('Register')">Register</a></li>
        <li class="nav-login nav-components"><a href="#" onclick="navigate('Login')">Login</a></li>
      </ul>

    </div>
  </nav>
</div>

<!-- Dropdown -->
<ul id="dropdown1" class="dropdown-content" style="background-color: #24252a;">

  <?php
  for ($x = 0; $x < count($genres); $x++) {
    $genre = $genres[$x];
    echo "<li>
          <a href='#' onclick='getGenreMovies($genre->id, \"$genre->name\", 1)'>
          $genre->name
          </a>
         </li>";
  }
  ?>

</ul>

<!-- Mobile sidenav -->
<ul style="background-color: #24252a !important" class="sidenav" id="mobile-demo" onclick="this.close()">
  <li>
    <a class="center" href=""><img style="height: 100%" src="assets/font.png" alt=""></a>
  </li>
  <li class="divider"></li>
  <li class="mobile-nav-page">
    <a href="#" onclick="navigate('Home');" class="sidenav-close">
      Home
    </a>
  </li>
  <li class="mobile-nav-page">
    <a href="#" onclick="navigate('DiscoverMovies')" class="sidenav-close">
      Discover movies
    </a>
  </li>
  <li class="mobile-nav-page">
    <a href="#" onclick="navigate('SearchMovies')" class="sidenav-close">
      Search movies
    </a>
  </li>
  <li class="nav-page">
    <ul class="collapsible ">
      <li>
        <a class="collapsible-header center-align genres-sidenav">
          Genres
          <i class="material-icons right">arrow_drop_down</i>
        </a>
        <div class="collapsible-body" style="background-color:#24252a">
          <ul>
            <?php
            for ($x = 0; $x < count($genres); $x++) {
              $genre = $genres[$x];
              echo "<li>
                      <a href='#' class='sidenav-close' onclick='getGenreMovies($genre->id, \"$genre->name\", 1)'>
                      $genre->name
                      </a>
                    </li>";
            }
            ?>
          </ul>
        </div>
      </li>
    </ul>
  </li>
  <li class="divider"></li>
  <li class="nav-account hide">
    <a href="#" class="sidenav-close" onclick="navigate('Account')">
      Account
    </a>
  </li>
  <li class="nav-logout hide">
    <a href="#" class="sidenav-close" onclick="logoutUser()">
      Logout
    </a>
  </li>
  <li class="nav-register">
    <a href="#" class="sidenav-close" onclick="navigate('Register')">
      Register
    </a>
  </li>
  <li class="nav-login">
    <a href="#" class="sidenav-close" onclick="navigate('Login')">
      Login
    </a>
  </li>
</ul>