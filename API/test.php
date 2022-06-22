<?php
$result = "";
if (isset($_REQUEST['img_url'])) {
  $result .= " " . $_REQUEST['img_url'];
}
if (isset($_REQUEST['title'])) {
  $result .= " " . $_REQUEST['title'];
}
if (isset($_REQUEST['overview'])) {
  $result .= " " . $_REQUEST['overview'];
}
echo $result;