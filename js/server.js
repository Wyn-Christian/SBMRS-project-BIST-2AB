// email already exists
// password are not same

const emptyInput = (...inputs) => {
  inputs.forEach(input => {
    $(`#${input.name}`).val("")
    $(`label[for='${input.name}']`).removeClass("active")
  })
} 

const validateInputRegister = (data) => {
  let [first, last, email, password, repassword] = data;
  
  if(password.value != repassword.value) {
    M.toast({html: "Password did not match: please try again..."})
    emptyInput(password, repassword)
    return
  }
   
}