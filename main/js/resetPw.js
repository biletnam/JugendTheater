var alreadyChangedPw = false;
function resetPw(){
  if(alreadyChangedPw){
    /* REVIEW: Hard Coded Text */
    document.getElementById("infoModText").innerHTML = "Du hast dein Passwort bereits geändert.";
    $("#infomodal").modal("show");
  } else if(hash == ""){
    document.getElementById("infoModText").innerHTML = "Kein Hash gefunden.";
    $("#infomodal").modal("show");
  } else {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        $("#infomodal").modal("show");
        if (this.readyState == 4 && this.status == 200) {
            var ret = this.responseText;
            if(ret.includes("Success")){
              var res = ret.split("/");
              document.getElementById("infoModText").innerHTML = res[1];
              alreadyChangedPw = true;
            } else {
              document.getElementById("infoModText").innerHTML = this.responseText;
            }
       } else {
        document.getElementById("infoModText").innerHTML = "Waiting for Response...";
       }
    };
    var pw1 = document.getElementById('resPw1').value;
    var pw2 = document.getElementById('resPw2').value;
    var request = "pw1=" + pw1 + "&pw2=" + pw2 + "&hash=" + hash;
    xhttp.open("POST", "functions/functions.php?func=resetPw", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(request);
  }
}

$(document).ready(function(){
  history.pushState("", document.title, window.location.pathname+"?loc=resetPassword");
});
