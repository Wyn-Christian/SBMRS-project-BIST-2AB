<?php
// echo "<br> before session unsetted";
// echo print_r($_SESSION);
// session_unset();
// echo "<br> session unsetted";
// echo print_r($_SESSION);


?>

<div class="container">
  <div class="row">
    <div class="col s12">
      <div style="height: 10vh">
      </div>
    </div>

    <div class="col s12 m10 offset-m1 l6 offset-l3">
      <div class="card z-depth-2">
        <div class="card-content">
          <span class="card-title center">Login</span>
          <div class="row">
            <!-- form -->
            <form class="col s12" id="login-form">
              <div class="row">
                <div class="input-field col s12">
                  <input id="email" name="email" type="email" class="validate">
                  <label for="email">Email</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input id="password" name="password" type="password" class="validate">
                  <label for="password">Password</label>
                </div>
              </div>
              <div class="row">
                <div class="col">

                  <button class="btn waves-effect waves-light " type="submit">Submit
                    <i class="material-icons right">send</i>
                  </button>
                </div>
              </div>
              <a href="#" onclick="navigate('Register')">Create new account</a>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<script>
$("#login-form").submit((event) => {
  console.log($("input"));
  console.log($("input").serializeArray());
  // console.log(result);
  event.preventDefault();
});
</script>