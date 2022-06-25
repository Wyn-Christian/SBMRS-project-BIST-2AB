<html>

<head>
  <script>
  let obj = {
    name: "eisen",
    age: 69
  }
  console.log(obj.name);

  function showHint(str) {
    if (str.length == 0) {
      document.getElementById("txtHint").innerHTML = "";
      return;
    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("txtHint").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET", "gethint.php?q=" + str + '&t=' + str, true);
      xmlhttp.send();
    }
  }
  </script>
</head>

<body>

  <p><b>Start typing a name in the input field below:</b></p>
  <form action="">
    <label for="fname">Comment:</label>
    <input type="text" id="fname" name="fname" onkeyup="showHint(this.value)">
    <input type="submit" value="Submit" onsubmit="checkComment">
  </form>
  <p>Suggestions: <span id="txtHint"></span></p>

</body>

</html>