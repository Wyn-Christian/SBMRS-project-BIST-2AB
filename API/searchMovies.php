<?php
require_once '../unirest-php/src/Unirest.php';
// /getMovies.php?query=__&page=__
$query = $_REQUEST["query"];
$page = $_REQUEST["page"];

$api_key = '52736a6805a53f07938b985b0c36ba23';
$url = "https://api.themoviedb.org/3/search/movie?api_key=$api_key&include_adult=false&language=en&query=$query&page=$page";
$response = Unirest\Request::get($url);

$body_raw = $response->raw_body;

echo $body_raw;