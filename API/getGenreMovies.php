<?php
require_once '../unirest-php/src/Unirest.php';
// /getMovies.php?genre_id=__&page=__
$genre_id = $_REQUEST["genre_id"];
$page = $_REQUEST["page"];

$api_key = '52736a6805a53f07938b985b0c36ba23';
$url = "https://api.themoviedb.org/3/discover/movie?api_key=$api_key&language=en&sort_by=popularity.desc&include_adult=false&include_video=false&with_genres=$genre_id&page=$page";

$response = Unirest\Request::get($url);

$body_raw = $response->raw_body;

echo $body_raw;