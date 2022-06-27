let USER = {
  ID: 1,
  firstname: "Jhon",
  lastname: "Doe",
  email: "johnDoe@sample.com",
  password: "1234",
}
// USER = null

const emptyInput = (inputs) => {
  inputs.forEach(input => {
    $(`#${input.name}`).val("")
    $(`label[for='${input.name}']`).removeClass("active")
  })
} 

const alertUser = (str, inputs) => {
  M.toast({html: str})
  emptyInput(inputs)
}

const validateInputRegister = (data) => {
  let [first, last, email, password, repassword] = data;
  
  if(password.value != repassword.value) {
    M.toast({html: "Password did not match: please try again..."})
    emptyInput(password, repassword)
    return
  }

  $.get(`DB/checkEmail.php?email=${email.value}`)
  .done((isExists) => {
    if(isExists == 'null') {

      $.post('DB/register.php', {
        firstname : first.value,
        lastname : last.value,
        email : email.value,
        password : password.value,
      })
      .done(data => {
        M.toast({html: data})
        navigate("Login")
      })
    } else {
      M.toast({html: "Email already exists: please try again..."})
      emptyInput(data);
    }
  })

}

const validateLogin = (data) => {
  let [{value: email}, {value: password}] = data;
  $.get(`DB/checkEmail.php?email=${email}`)
    .done((result) => {
      if(result != 'null'){
        let data_row = JSON.parse(result)
        if(password != data_row.password) {
          M.toast({html: "Login failed; Invalid email or password."})
          emptyInput(data);
        } else {
          M.toast({html: "Login successfully."})
          M.toast({html: "Redirecting to Home page.",
                   displayLength: 1000, 
                   completeCallback: () => navigate("Home")})

          loginUser(data_row)
        }
      } else {
        M.toast({html: "Login failed; Invalid email or password."})
        emptyInput(data);
      }
    })
}
const loginUser = (data) => {
  USER = data
  $(".nav-account").removeClass("hide")
  $(".nav-logout").removeClass("hide")
  $(".nav-login").addClass("hide")
  $(".nav-register").addClass("hide")
}
const logoutUser = () => {
  USER = null
  $(".nav-account").addClass("hide")
  $(".nav-logout").addClass("hide")
  $(".nav-login").removeClass("hide")
  $(".nav-register").removeClass("hide")
  
  M.toast({html: "Log-out successfully!"})
  M.toast({html: "Redirecting to home page"})
  
  navigate("Home")

}

const editProfile = (inputs) => {
  let [{value: firstname}, {value: lastname}, {value:password}] = inputs;
  if (!validatePassword(password)){
    alertUser("Wrong password...", inputs)
    return
  }
  
  updateUser( {type: "edit-profile", id: USER .ID, firstname, lastname})
}
const changeEmail = (inputs) => {
  let [{value: new_email}, {value: re_email}, {value:password}] = inputs;
  if (!validatePassword(password)){
    alertUser("Wrong password...", inputs)
    return
  }
  if(new_email != re_email) {
    alertUser("Email did not match!", inputs)
    return
  }
  if(new_email == USER.email) {
    alertUser("You can't use your old email!", inputs)
    return
  }

  $.get(`DB/checkEmail.php?email=${new_email}`)
  .done((isExists) => {
    if(isExists == 'null') {
      updateUser( {type: "change-email", id: USER.ID, new_email})
    } else {
      M.toast({html: "Email already exists: please try again..."})
      emptyInput(data);
    }
  }) 
}
const changePassword = (inputs) => {
  let [{value: new_password}, {value: re_password}, {value:password}] = inputs;
  if (!validatePassword(password)){
    alertUser("Wrong password...", inputs)
    return
  }
  if(new_password != re_password) {
    alertUser("Password did not match!", inputs)
    return
  }
  if(new_password == password) {
    alertUser("You can't use your old password!", inputs)
    return
  }
  updateUser( {type: "change-password", id: USER.ID, new_password})

}

validatePassword = (pw) => {
  return pw == USER.password ? true : false
}

const updateUser = (data) => {
  let params = $.param(data)

  $.post("DB/accountsettings.php", params)
    .done(str =>{ 
      M.toast({html: str})
      $.getJSON(`DB/getUserByID.php?id=${data.id}`)
      .done(user => {
        USER = user

        
        $("#user-firstname").html(USER.firstname)
        $("#user-lastname").html(USER.lastname)
        $("#user-email").html(USER.email)
      })
    })

}

