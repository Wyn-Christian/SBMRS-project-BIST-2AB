<?php
include 'connect.php';

$email = $_REQUEST["email"];

$sql = "SELECT * FROM user WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  $first_row = $result->fetch_assoc();

  echo json_encode($first_row);
} else {
  echo 'null';
}
$conn->close();