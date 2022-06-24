<?php
require_once '../unirest-php/src/Unirest.php';
// /getMovies.php?type=__&page=__
$type = $_REQUEST["type"];
$page = $_REQUEST["page"];

$api_key = '52736a6805a53f07938b985b0c36ba23';
$url;
switch ($type) {
  case 'discover':
    $url = "https://api.themoviedb.org/3/discover/movie?api_key=$api_key&page=$page";
    break;
  case 'trending':
    $url = "https://api.themoviedb.org/3/trending/movie/week?api_key=$api_key&page=$page";
    break;
  default:
    $url = "https://api.themoviedb.org/3/movie/$type?api_key=$api_key&language=en-US&page=$page";
}

$response = Unirest\Request::get($url);

$body_raw = $response->raw_body;

echo $body_raw;