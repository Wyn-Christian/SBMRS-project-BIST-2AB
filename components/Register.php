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
    <div class="col s12 m10 offset-m1 l8 offset-l2">
      <div class="card z-depth-2">
        <div class="card-content">
          <span class="card-title center">Register</span>
          <div class="row">
            <form class="col s12" id="register-form" method="POST">
              <div class="row">
                <div class="input-field col s6">
                  <input id="first_name" name="first_name" type="text" class="validate" required>
                  <label for="first_name">First Name</label>
                </div>
                <div class="input-field col s6">
                  <input id="last_name" name="last_name" type="text" class="validate" required>
                  <label for="last_name">Last Name</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input id="email" name="email" type="email" class="validate">
                  <label for="email">Email</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12 m6">
                  <input id="password" name="password" type="password" class="validate">
                  <label for="password">Password</label>
                </div>
                <div class="input-field col s12 m6">
                  <input id="repassword" name="repassword" type="password" class="validate">
                  <label for="repassword">Re-enter Password</label>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <button class="btn waves-effect waves-light " type="submit" name="action">Submit
                    <i class="material-icons right">send</i>
                  </button>
                </div>
              </div>
              <a href="#" onclick="navigate('Login')">Already have account?</a>

            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<script>
console.log(USER);
$("#register-form").submit((event) => {
  event.preventDefault();

  let data = $("input").serializeArray();
  validateInputRegister(data);
});
</script>