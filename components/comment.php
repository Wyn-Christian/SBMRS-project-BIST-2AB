<?php

$firstname = $_REQUEST["firstname"];
$lastname = $_REQUEST["lastname"];
$date_updated = $_REQUEST["date_updated"];
$comment = $_REQUEST["comment"];

?>

<div class='card'>
  <div class='card-content'>
    <span class='card-title'>
      <?php echo "$firstname $lastname" ?>
    </span>
    <p>
      <?php echo "$date_updated" ?>
    </p>
    <p>
      <?php echo "$comment" ?>
    </p>
  </div>
</div>