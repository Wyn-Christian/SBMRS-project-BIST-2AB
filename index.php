<?php
// include "DB/client.php";
$navbar = 'components/navbar.php';
$footer = 'components/Footer.php';
$home = 'components/Home.php';
$DiscoverMovies = 'components/DiscoverMovies.php';

?>
<?php header('Access-Control-Allow-Origin: *'); ?>

<!DOCTYPE html>
<html>

<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <style>
    body::-webkit-scrollbar {
      width: 12px;
      /* width of the entire scrollbar */
    }

    body::-webkit-scrollbar-track {
      background: #24252a;
      /* color of the tracking area */
    }

    body::-webkit-scrollbar-thumb {
      background-color: #298a91;
      /* color of the scroll thumb */
      border-radius: 20px;
      /* roundness of the scroll thumb */
      border: 3px solid #298a91;
      /* creates padding around scroll thumb */
    }


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

    .card-reveal {
      -ms-overflow-style: none;
      /* for Internet Explorer, Edge */
      scrollbar-width: none;
      /* for Firefox */
      overflow-y: scroll;
    }

    .card-reveal::-webkit-scrollbar {
      display: none;
      /* for Chrome, Safari, and Opera */
    }

    .movie-list {
      cursor: help;
      margin-top: 6.8vh;
    }

    .movie-info {
      cursor: pointer;
    }

    body {
      height: 100vh;
      margin-top: 0;
    }


    header {
      /* min-height: 50px; */
      background: lightcyan;
    }

    footer {
      min-height: 50px;
      background: PapayaWhip;
    }

    /* Trick */
    body {
      display: flex;
      flex-direction: column;
    }

    footer {
      margin-top: auto;
      min-height: auto;
    }

    ul#tabs-swipe-demo::-webkit-scrollbar {
      display: none;
    }
  </style>

</head>

<body>
  <?php include_once $navbar ?>
  <div id="root"></div>


  <?php include_once $footer ?>


  <!--JavaScript at end of body for optimized loading-->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/script.js"></script>

  <script type="text/javascript" src="js/account-server.js"></script>
  <script type="text/javascript" src="js/comment-server.js"></script>
  <script type="text/javascript" src="js/sentiment-analysis.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.sidenav');
      var instances = M.Sidenav.init(elems);
    });

    AOS.init();
    M.AutoInit();
    navigate("Home")
  </script>
  <script>

  </script>
</body>

</html>