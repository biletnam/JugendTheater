function showJgt(id){
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
      $("#jgtmodal").modal("show");
      if (this.readyState == 4 && this.status == 200) {
            var rows = JSON.parse(this.responseText);
            //TODO: Load infos into modal
     } else {
       document.getElementById("jgtResponse").innerHTML = "Loading...";
     }
  };
  var request = "id=" + id;
  xhttp.open("POST", "functions/functions.php?func=getAnmeldung", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(request);
}
