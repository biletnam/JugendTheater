function tryLogin() {
    var xhttp = new XMLHttpRequest();
    var username = document.getElementById('logUsername').value;
    var pw = document.getElementById('logPassword').value;
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var ret = this.responseText;
            if(ret.includes("Success")){
              var res = ret.split("/");
              document.getElementById("loginResponse").innerHTML = res[0];
              loginBtn.parentNode.removeChild(loginBtn);
              registerBtn.parentNode.removeChild(registerBtn);
              langDrop.parentNode.removeChild(langDrop);
              userIcon.className = "dropdown top-dd";
              profileName.innerHTML = res[1];
              $("#loginmodal").modal("hide");
              if(res[2]){
                $("ul#topbarMenu").prepend('<li><a href="../admin/">Admin-Page</a></li>');
              }
              loggedIn = true;
              if(res[3]){
                jgtdone = true;
              }
            } else {
              document.getElementById("loginResponse").innerHTML = this.responseText;
            }
       } else {
         document.getElementById("loginResponse").innerHTML = "Waiting for response...";
       }
    };
    var request = "Us=" + username + "&Pw="+pw;
    xhttp.open("POST", "functions/functions.php?func=login", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(request);
}


function tryRegister() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("registerResponse").innerHTML = this.responseText;
       } else {
         document.getElementById("registerResponse").innerHTML = "Waiting for response...";
       }
    };
    var username = document.getElementById('regUsername').value;
    var pw = document.getElementById('regPassword').value;
    var email = document.getElementById('regEmail').value;
    var ename = document.getElementById('regEname').value;
    var city = document.getElementById('regCity').value;
    var request = "us=" + username + "&pw=" + pw + "&email=" + email + "&ename=" + ename + "&city=" + city;
    xhttp.open("POST", "functions/functions.php?func=register", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(request);
}

function forgotPw(){
  var xhttp = new XMLHttpRequest();
  var username = document.getElementById('logUsername').value;
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          document.getElementById("loginResponse").innerHTML = this.responseText;
     } else {
       document.getElementById("loginResponse").innerHTML = "Waiting for response...";
     }
  };
  var request = "usr_mail=" + username;
  xhttp.open("POST", "functions/functions.php?func=forgotPw", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(request);

}
