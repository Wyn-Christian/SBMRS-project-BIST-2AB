<?php
require_once 'unirest-php/src/Unirest.php';

$genre_url = "https://api.themoviedb.org/3/genre/movie/list?api_key=52736a6805a53f07938b985b0c36ba23&language=en";

$response = Unirest\Request::get($genre_url);
$body = $response->body;        // Parsed body
$genres = $body->genres;

?>

<div class="navbar-fixed">
  <nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo center">Logo</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul id="nav-mobile" class=" hide-on-med-and-down">
        <li class="active nav-page">
          <a href="#" onclick="navigate('Home')">
            Home
          </a>
        </li>
        <li class="nav-page">
          <a href="#" onclick="navigate('DiscoverMovies')">
            Discover movies
          </a>
        </li>
        <li class="nav-page">
          <a href="#" onclick="navigate('SearchMovies')">
            Search movies
          </a>
        </li>
        <li class="nav-page">
          <a class="dropdown-trigger" href="#" data-target="dropdown1">
            Genres
            <i class="material-icons right">arrow_drop_down</i>
          </a>
        </li>
      </ul class="nav-page">
      <ul id="nav-mobile" class="right hide-on-med-and-down">

        <li><a href="#" onclick="navigate('Account')">Account</a></li>
        <li><a href="#" onclick="navigate('Register')">Register</a></li>
        <li><a href="#" onclick="navigate('Login')">Login</a></li>
      </ul>
    </div>
  </nav>
</div>

<!-- Dropdown -->
<ul id="dropdown1" class="dropdown-content">

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
<ul class="sidenav" id="mobile-demo" onclick="this.close()">
  <li>
    <div class="brand-logo center">Logo</div>
  </li>
  <li class="divider"></li>
  <li class="active nav-page">
    <a href="#" onclick="navigate('Home');" class="sidenav-close">
      Home
    </a>
  </li>
  <li class="nav-page">
    <a href="#" onclick="navigate('DiscoverMovies')" class="sidenav-close">
      Discover movies
    </a>
  </li>
  <li class="nav-page">
    <a href="#" onclick="navigate('SearchMovies')" class="sidenav-close">
      Search movies
    </a>
  </li>
  <li class="nav-page">
    <ul class="collapsible ">
      <li>
        <a class="collapsible-header center-align">
          Genres
          <i class="material-icons right">arrow_drop_down</i>
        </a>
        <div class="collapsible-body">
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
  <li>
    <a href="#" class="sidenav-close" onclick="navigate('Account')">
      Account
    </a>
  </li>
  <li>
    <a href="#" class="sidenav-close" onclick="navigate('Register')">
      Register
    </a>
  </li>
  <li>
    <a href="#" class="sidenav-close" onclick="navigate('Login')">
      Login
    </a>
  </li>
</ul>