<?php
include 'connect.php';

$id  = $_REQUEST["id"];

$sql = "SELECT * FROM user WHERE ID = '$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  $first_row = $result->fetch_assoc();

  echo json_encode($first_row);
} else {
  echo 'null';
}
$conn->close();