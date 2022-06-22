<?php
require_once '../unirest-php/src/Unirest.php';
// /getMovies.php?query=__&page=__
$query = $_REQUEST["query"];
$page = $_REQUEST["page"];

$bearer_token = 'eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI1MjczNmE2ODA1YTUzZjA3OTM4Yjk4NWIwYzM2YmEyMyIsInN1YiI6IjYyYjA1Y2RkYTZhNGMxMGZkODMxYWRkMyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.1fcB2PIajGtgTw53vKTE8Ioect9aswR__p9ExX8MovU';


$api_key = '52736a6805a53f07938b985b0c36ba23';
$url = "https://api.themoviedb.org/3/search/movie?api_key=$api_key&include_adult=false&language=en-US&query=$query&page=$page";
$response = Unirest\Request::get($url);

$response->code;        // HTTP Status code
$response->headers;     // Headers
$body = $response->body;        // Parsed body
$body_raw = $response->raw_body;

echo $body_raw;