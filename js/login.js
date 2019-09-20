 // JavaScript function when Login button is clicked
 var loginform = document.loginform
 var username = document.querySelector('#txtusername')
 var password = document.querySelector('#txtpword')
 var userNameArr = ["root", "admin", "comp"];
 var passArr = ["toor", "123", "qwerty"];

 loginform.addEventListener('submit', function (e) {
     //prevents form from re-loading
     e.preventDefault();

     var isLoginValid = checkCred();
     if (isLoginValid) {
         var newloc = location.href.substr(location.href.lastIndexOf('/'));
         location.href = location.href.replace(newloc, '/store.html');
         localStorage.setItem("islogin", "true")
         alert("Correct Credetials Entered!");
     } else {
         alert("Username or Password incorrect!");
         document.getElementById("loginform").reset();
     }
 })

 function checkCred() {
     for (i = 0; i <= userNameArr.length; i++) {
         if (username.value == userNameArr[i] && password.value == passArr[i]) {
             return true;
         }
     }
     return false;
 }