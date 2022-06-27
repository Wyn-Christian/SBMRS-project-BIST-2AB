<?php
include 'connect.php';

$type = $_REQUEST["type"];
$id = $_REQUEST["id"];
$sql;
$onSuccess;
switch ($type) {
  case "edit-profile":
    $firstname = $_REQUEST["firstname"];
    $lastname = $_REQUEST["lastname"];
    $sql = "UPDATE user SET firstname='$firstname', lastname='$lastname' WHERE id=$id";
    $onSuccess = "User's name updated!";
    break;
  case "change-email":
    $new_email = $_REQUEST["new_email"];
    $sql = "UPDATE user SET email='$new_email' WHERE id=$id";
    $onSuccess = "User's email updated!";
    break;
  case "change-password":
    $new_password = $_REQUEST["new_password"];
    $sql = "UPDATE user SET password='$new_password' WHERE id=$id";
    $onSuccess = "User's password updated!";
    break;
}



if ($conn->query($sql) === TRUE) {
  echo $onSuccess;
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();