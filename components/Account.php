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
            <form class="col s12">
              <div class="row">
                <div class="input-field col s12 m6">
                  <input id="first_name" type="text" class="validate">
                  <label for="first_name">First Name</label>
                </div>
                <div class="input-field col s12 m6">
                  <input id="last_name" type="text" class="validate">
                  <label for="last_name">Last Name</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12 m6">
                  <input id="password" type="password" class="validate">
                  <label for="password">Password</label>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <button class="btn waves-effect waves-light " type="submit" name="edi_profile">
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
            <form class="col s12">

              <div class="row">
                <div class="input-field col s12">
                  <input id="new_email" type="email" class="validate">
                  <label for="new_email">Enter new email address</label>
                </div>
                <div class="input-field col s12">
                  <input id="re_new_email" type="email" class="validate">
                  <label for="re_new_email">Re-enter new email address</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12 m6">
                  <input id="password" type="password" class="validate">
                  <label for="password">Password</label>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <button class="btn waves-effect waves-light " type="submit" name="change_email"
                    onsubmit="this.preventDefault()">
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
          <form class="col s12">

            <div class="row">
              <div class="input-field col s12">
                <input id="new_password" type="password" class="validate">
                <label for="new_password">Enter new password</label>
              </div>
              <div class="input-field col s12">
                <input id="re_password" type="password" class="validate">
                <label for="re_password">Re-enter new password</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 m6">
                <input id="password" type="password" class="validate">
                <label for="password">Current password</label>
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
console.log(user)
M.Tabs.init(
  document.getElementById('tabs-swipe-demo'), {
    swipeable: true
  });

$("form").submit(function(event) {
  console.log($(this).serializeArray());
  event.preventDefault();
});
</script>