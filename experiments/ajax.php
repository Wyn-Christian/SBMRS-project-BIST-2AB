<?php header('Access-Control-Allow-Origin: *'); ?>
<html>

<head>
  <script type="text/javascript" src="../js/jquery.js"></script>
</head>

<body>
  <script>
  let data = {
    comment: "i like cats malalaas dfas f"
  }
  let base_url = "http://localhost:3000"
  $.post(`${base_url}`, data)
    .done(res => {
      console.log(res)
      $("body").html(res);
    })
  </script>
</body>

</html>