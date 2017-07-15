function tryLogin() {
    var xhttp = new XMLHttpRequest();
    var username = document.getElementById('logUsername').value;
    var pw = document.getElementById('logPassword').value;
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("loginResponse").innerHTML = this.responseText;
            if(this.responseText.includes("Success")){
              $("#loginmodal").modal("hide");
              //loginBtn.className = "invisible";
              //registerBtn.className = "invisible";
              loginBtn.parentNode.removeChild(loginBtn);
              registerBtn.parentNode.removeChild(registerBtn);
              userIcon.className = "dropdown top-dd";
              profileName.innerHTML = username;
              loggedIn = true;
              //loginBtn.parentNode.insertBefore(userIcon, loginBtn);
              //document.getElementById("loginResponse").innerHTML = "";
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
