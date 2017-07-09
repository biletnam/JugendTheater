var loggedIn = false;

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
    var request = "us=" + username + "&pw=" + pw + "&email=" + email;
    xhttp.open("POST", "functions/functions.php?func=register", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(request);
}

function tryPremiere(){

}

function openPremiere(){
  if(!loggedIn){
    $("#infoModText").html("Du musst eingeloggt sein!");
    $("#infomodal").modal("show");
  } else {
    $("#premieremodal").modal("show");
  }
}


/*function tryLogout(){
  var xhttp = new XMLHttpRequest();
  var username = document.getElementById('logUsername').value;
  var pw = document.getElementById('logPassword').value;
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          if(this.responseText.includes("logged")){
            $("#infoModText").html(this.responseText);
      			$("#infomodal").modal("show");
            userIcon.className = "dropdown top-dd invisible";
            loginBtn.className = "";
            registerBtn.className = "";
            userIcon.parentNode.insertBefore(loginBtn, userIcon);
          }
     } else {
       document.getElementById("loginResponse").innerHTML = "Waiting for response...";
     }
  };
  xhttp.open("POST", "functions/functions.php?func=logout", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send();
}*/


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



  // Add slideDown animation to Bootstrap dropdown when expanding.
  $('.dropdown').on('show.bs.dropdown', function() {
    $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
  });

  // Add slideUp animation to Bootstrap dropdown when collapsing.
  $('.dropdown').on('hide.bs.dropdown', function() {
    $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
  });

//Preloader
  jQuery(document).ready(function($) {
  $(window).load(function(){
  	$('#preloader').fadeOut('slow',function(){$(this).remove();});
  });

  });

// Disable newline
  $(document).ready(function() {
    $("#premTA").keypress(function(event) {
      if(event.which == '13') {
        return false;
      }
    });
  });

// Dropzone config
var fileName2 = "img_" + profileName.innerHTML;
  $(document).ready(function(){
  Dropzone.autoDiscover = false;

  $("#my-dz").dropzone({
    paramName: fileName2,
    url: '../functions/functions.php?func=imageUploader',
    maxFilesize: 1,
    acceptedFiles: "image/jpeg,image/png,image/gif",

    init: function() {
      this.on("addedfile", function() {
        if (this.files[1]!=null){
          this.removeFile(this.files[0]);
        }
      });
    }
  });
});
