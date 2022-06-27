<div class="container">
  <div class="row">
    <div class="col s12">
      <h2>Account Settings</h2>
    </div>
    <div class="col s12 card">
      <ul id="tabs-swipe-demo" class="tabs">
        <li class="tab col s4 m2">
          <a class="active" href="#profile">Profile</a>
        </li>
        <li class="tab col s4 m2">
          <a href="#edit-profile">Edit Profile</a>
        </li>
        <li class="tab col s4 m2">
          <a href="#change-email">Change Email</a>
        </li>
        <li class="tab col s4 m2">
          <a href="#change-password">Change Password</a>
        </li>
      </ul>
      <div id="profile" style="height: 40vh;" class="col s12">
        <div class="container">
          <div class="row">
            <div class="col s12">
              <h5>First name:</h5>
            </div>
            <div class="col s12">
              <h5>
                <span id="user-firstname">
                  Wyn Christian
                </span>
              </h5>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <h5>Last name:</h5>
            </div>
            <div class="col s12">
              <h5>
                <span id="user-lastname">
                  Rebanal
                </span>
              </h5>
            </div>
          </div>
          <div class=" row">
            <div class="col s12">
              <h5>Email-Address:</h5>
            </div>
            <div class="col s12">
              <h5>
                <span id="user-email">
                  wyn@sample.com
                </span>
              </h5>
            </div>
          </div>
        </div>
      </div>
      <div id="edit-profile" style="height: 40vh;" class="col s12">
        <div class="container">

          <div class="row ">
            <form class="col s12" id="edit-profile-form" autocomplete="off">
              <div class="row">
                <div class="input-field col s12 m6">
                  <input id="firstname" name="firstname" type="text" class="validate">
                  <label for="firstname">First Name</label>
                </div>
                <div class="input-field col s12 m6">
                  <input id="lastname" name="lastname" type="text" class="validate">
                  <label for="lastname">Last Name</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12 m6">
                  <input id="password" name="password" type="password" class="validate" autocomplete="noppppee">
                  <label for="password">Password</label>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <button class="btn waves-effect waves-light " type="submit" name="edit_profile">
                    Edit Profile
                    <i class="material-icons right">send</i>
                  </button>
                </div>
              </div>

            </form>
          </div>
        </div>

      </div>
      <div id="change-email" style="height: 40vh;" class="col s12">
        <div class="container">
          <div class="row ">
            <form class="col s12" id="change-email-form" autocomplete="off">

              <div class="row">
                <div class="input-field col s12">
                  <input id="new_email" name="new_email" type="email" class="validate">
                  <label for="new_email">Enter new email address</label>
                </div>
                <div class="input-field col s12">
                  <input id="re_email" name="re_email" type="email" class="validate">
                  <label for="re_email">Re-enter new email address</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12 m6">
                  <input id="password0" name="password0" type="password" class="validate" autocomplete="new-password">
                  <label for="password0">Password</label>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <button class="btn waves-effect waves-light " type="submit" name="change_email">
                    Change Email
                    <i class="material-icons right">send</i>
                  </button>
                </div>
              </div>
          </div>
        </div>
        </form>
      </div>

    </div>
    <div id="change-password" style="height: 40vh;" class="col s12">
      <div class="container">

        <div class="row ">
          <!-- CHANGE PASSWORD FORM -->
          <form class="col s12" id="change-password-form" autocomplete="off">

            <div class="row">
              <div class="input-field col s12">
                <input id="new_password" name="new_password" type="password" class="validate">
                <label for="new_password">Enter new password</label>
              </div>
              <div class="input-field col s12">
                <input id="re_password" name="re_password" type="password" class="validate">
                <label for="re_password">Re-enter new password</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 m6">
                <input id="password1" name="password1" type="password" class="validate">
                <label for="password1">Current password</label>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <button class="btn waves-effect waves-light " type="submit" name="change_password">
                  Change Password
                  <i class="material-icons right">send</i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>


<script>
M.Tabs.init(
  document.getElementById('tabs-swipe-demo'), {
    swipeable: true
  });

$("#user-firstname").html(USER.firstname)
$("#user-lastname").html(USER.lastname)
$("#user-email").html(USER.email)

$("#edit-profile-form").submit((e) => {
  e.preventDefault()
  let inputs = $("#edit-profile-form")
    .serializeArray()
  editProfile(inputs);
})
$("#change-email-form").submit((e) => {
  e.preventDefault()
  let inputs = $("#change-email-form")
    .serializeArray()
  changeEmail(inputs);
})
$("#change-password-form").submit((e) => {
  e.preventDefault()
  let inputs = $("#change-password-form")
    .serializeArray()
  changePassword(inputs);
})
</script>