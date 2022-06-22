<div class="navbar-fixed  ">
  <nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo center">Logo</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul id="nav-mobile" class=" hide-on-med-and-down">
        <li class="active">
          <a href="#" onclick="navigate('Home')">Home</a>
        </li>
        <li>
          <a href="#" onclick="navigate('DiscoverMovies')">Discover movies</a>
        </li>
        <li><a href="#" onclick="navigate('SearchMovies')">Search movies</a></li>
        <li>
          <a class="dropdown-trigger" href="#!" data-target="dropdown1">Genres<i
              class="material-icons right">arrow_drop_down</i>
          </a>
        </li>
      </ul>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="#" onclick="navigate('Login')">Login</a></li>
      </ul>
    </div>
  </nav>
</div>

<!-- Dropdown -->
<ul id="dropdown1" class="dropdown-content">
  <li><a href="#!">Action</a></li>
  <li><a href="#!">Adventure</a></li>
  <li><a href="#!">Romance</a></li>
</ul>

<!-- Mobile sidenav -->
<ul class="sidenav" id="mobile-demo" onclick="this.close()">
  <li>
    <div class="brand-logo center">Logo</div>
  </li>
  <li class="divider"></li>
  <li class="active">
    <a href="#" onclick="navigate('Home');" class="sidenav-close">Home</a>
  </li>
  <li>
    <a href="#" onclick="navigate('DiscoverMovies')" class="sidenav-close">Discover movies</a>
  </li>
  <li>
    <a href="#" onclick="navigate('SearchMovies')" class="sidenav-close">Search movies</a>
  </li>
  <li>
    <ul class="collapsible ">
      <li>
        <a class="collapsible-header center-align">
          Genres
          <i class="material-icons right">arrow_drop_down</i>
        </a>
        <div class="collapsible-body">
          <ul>
            <li><a href="#!" class="sidenav-close">Action</a></li>
            <li><a href="#!" class="sidenav-close">Adventure</a></li>
            <li><a href="#!" class="sidenav-close">Animation</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </li>
  <li class="divider"></li>
  <li><a href="#" class="sidenav-close" onclick="navigate('Login')">Login</a></li>
</ul>