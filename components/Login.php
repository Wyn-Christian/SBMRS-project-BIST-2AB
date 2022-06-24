<?php
session_start();
$_SESSION["user"] = "Wyn ";
print_r($_SESSION);
echo "<br>session started";