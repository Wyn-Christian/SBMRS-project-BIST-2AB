<?php
include 'connect.php';

$movie_id = $_REQUEST["movie_id"];
$user_id = $_REQUEST["user_id"];

if ($user_id == 'null') {
  $sql = "SELECT * FROM reviews
    INNER JOIN user ON reviews.user_ID=user.ID
    WHERE movie_ID=$movie_id";
} else {
  $sql = "SELECT * FROM reviews 
  INNER JOIN user ON reviews.user_ID=user.ID
  WHERE NOT user_ID=$user_id AND movie_ID=$movie_id";
}

$result = $conn->query($sql);
$data = array();
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    array_push($data, $row);
  }
  echo json_encode($data);
} else {
  echo "null";
}
$conn->close();