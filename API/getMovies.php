<?php
require_once '../unirest-php/src/Unirest.php';
// /getMovies.php?type=__&page=__
$type = $_REQUEST["type"];
$page = $_REQUEST["page"];

$bearer_token = 'eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI1MjczNmE2ODA1YTUzZjA3OTM4Yjk4NWIwYzM2YmEyMyIsInN1YiI6IjYyYjA1Y2RkYTZhNGMxMGZkODMxYWRkMyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.1fcB2PIajGtgTw53vKTE8Ioect9aswR__p9ExX8MovU';


$api_key = '52736a6805a53f07938b985b0c36ba23';
$url;
switch ($type) {
  case 'discover':
    $url = "https://api.themoviedb.org/3/discover/movie?api_key=$api_key";
    break;
  case 'trending':
    $url = "https://api.themoviedb.org/3/trending/movie/week?api_key=$api_key";
    break;
  default:
    $url = "https://api.themoviedb.org/3/movie/$type?api_key=$api_key&language=en-US&page=$page";
}

$response = Unirest\Request::get($url);

$response->code;        // HTTP Status code
$response->headers;     // Headers
$body = $response->body;        // Parsed body
$body_raw = $response->raw_body;

echo $body_raw;