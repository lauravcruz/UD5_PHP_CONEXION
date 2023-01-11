"use strict"; 

function seePassword(){
    let eye = document.getElementById("eyePassword");
    let password = document.getElementById("password");  

    if(eye.classList.contains("bi-eye")){
        eye.classList.remove("bi-eye"); 
        eye.classList.add("bi-eye-slash");
        password.removeAttribute("type");
        password.setAttribute("type", "text");
    }else{
        eye.classList.remove("bi-eye-slash");
        eye.classList.add("bi-eye"); 
        password.removeAttribute("type");
        password.setAttribute("type", "password");
    }
}

let email = document.getElementById("email"); 

email.addEventListener("change", function () {
    if (!email.value.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)) {
      email.classList.add("error");
    } else {
      email.classList.remove("error");
    }
  });