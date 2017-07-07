function tryLogin() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("loginResponse").innerHTML = this.responseText;
            if(this.responseText.includes("Success")){
              loginBtn.parentNode.removeChild(loginBtn);
              registerBtn.parentNode.removeChild(registerBtn);
              userIcon.className = "";
            }
       } else {
         document.getElementById("loginResponse").innerHTML = "Waiting for response...";
       }
    };
    var username = document.getElementById('logUsername').value;
    var pw = document.getElementById('logPassword').value;
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
    var request = "us=" + username + "&pw=" + pw + "&email=" + email;
    xhttp.open("POST", "functions/functions.php?func=register", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(request);
}
