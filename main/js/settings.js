function tryChangeEmail(){
  var xhttp = new XMLHttpRequest();
  var email = document.getElementById('setMail').value;
  var email2 = document.getElementById('setMail2').value;
  xhttp.onreadystatechange = function() {
    $("#infomodal").modal("show");
      if (this.readyState == 4 && this.status == 200) {
            $("#infoModText").html(this.responseText);

     } else {
       document.getElementById("infoModText").innerHTML = "Changing...";
     }
  };
  var request = "email=" + email + "&email2=" + email2;
  xhttp.open("POST", "functions/functions.php?func=changeEmail", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(request);
}

function tryChangePw(){
  var xhttp = new XMLHttpRequest();
  var Pw = document.getElementById('setPw').value;
  var Pw2 = document.getElementById('setPw2').value;
  xhttp.onreadystatechange = function() {
    $("#infomodal").modal("show");
      if (this.readyState == 4 && this.status == 200) {
            $("#infoModText").html(this.responseText);

     } else {
       document.getElementById("infoModText").innerHTML = "Changing...";
     }
  };
  var request = "pwd=" + Pw + "&pwd2=" + Pw2;
  xhttp.open("POST", "functions/functions.php?func=changePassword", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(request);
}

function tryChangeEname(){
  var xhttp = new XMLHttpRequest();
  var name = document.getElementById('setName').value;
  xhttp.onreadystatechange = function() {
    $("#infomodal").modal("show");
      if (this.readyState == 4 && this.status == 200) {
            $("#infoModText").html(this.responseText);

     } else {
       document.getElementById("infoModText").innerHTML = "Changing...";
     }
  };
  var request = "name=" + name;
  xhttp.open("POST", "functions/functions.php?func=changeEname", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(request);
}

function tryChangeCity(){
  var xhttp = new XMLHttpRequest();
  var city = document.getElementById('setCity').value;
  xhttp.onreadystatechange = function() {
    $("#infomodal").modal("show");
      if (this.readyState == 4 && this.status == 200) {
            $("#infoModText").html(this.responseText);

     } else {
       document.getElementById("infoModText").innerHTML = "Changing...";
     }
  };
  var request = "city=" + city;
  xhttp.open("POST", "functions/functions.php?func=changeCity", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(request);
}
