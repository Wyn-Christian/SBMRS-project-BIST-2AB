<form id="login-form">
  <div>
    <div>

      <input type="email" name="email" id="email">
    </div>
  </div>
  <input type="password" name="password" id="firstname">
  <button type="submit">HAIZ</button>
</form>

<script src="../js/jquery.js"></script>
<script>
$("#login-form").submit(function(event) {
  console.log($(this).serializeArray());
  event.preventDefault();
});
</script>