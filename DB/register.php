<?php
include 'connect.php';

$firstname = $_REQUEST["firstname"];
$lastname = $_REQUEST["lastname"];
$email = $_REQUEST["email"];
$password = $_REQUEST["password"];

$sql = "INSERT INTO user (firstname, lastname, email, password)
VALUES ('$firstname', '$lastname', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
  echo "Account created!";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();