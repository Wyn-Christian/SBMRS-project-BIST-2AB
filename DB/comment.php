<?php
include 'connect.php';

$type = $_REQUEST["type"];
$movie_id = $_REQUEST["movie_id"];
$user_id = $_REQUEST["user_id"];

switch ($type) {
  case "create":
    $comment = $_POST["comment"];
    $datetime = date('Y-m-d H:i:s');
    $sql = "INSERT INTO reviews (user_ID, movie_ID, comment, sentiment_rate, date_created, date_updated)
    VALUES ($user_id, $movie_id, '$comment', 0, '$datetime', '$datetime');";

    if ($conn->query($sql) === TRUE) {
      echo "Comment created!";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    break;
  case "read":
    $sql = "SELECT * FROM reviews WHERE user_ID = $user_id AND movie_ID = $movie_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      $row = $result->fetch_assoc();
      echo json_encode($row);
    } else {
      echo "null";
    }
    break;
  case "update":
    $comment = $_POST["comment"];
    $date_updated = date('Y-m-d H:i:s');

    $sql = "UPDATE reviews SET comment='$comment', date_updated='$date_updated' WHERE user_ID=$user_id AND movie_ID=$movie_id";

    if ($conn->query($sql) === TRUE) {
      echo "Comment updated successfully";
    } else {
      echo "Error updating record: " . $conn->error;
    }
    break;
  case "delete":
    $sql = "DELETE FROM reviews WHERE user_ID=$user_id AND movie_ID=$movie_id";

    if ($conn->query($sql) === TRUE) {
      echo "Comment deleted successfully";
    } else {
      echo "Error deleting record: " . $conn->error;
    }

    break;
  default:
    echo "Type ($type) is undefined!";
}

$conn->close();