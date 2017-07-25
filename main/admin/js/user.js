var currentUserID = 0;
function showUser(UserID){
  var xhttp = new XMLHttpRequest();
  currentUserID = UserID;
  xhttp.onreadystatechange = function() {
      $("#usermodal").modal("show");
      if (this.readyState == 4 && this.status == 200) {
            var rows = JSON.parse(this.responseText);

            document.getElementById("Username").value = rows["Username"];
            document.getElementById("deleteUserName").innerHTML = rows["Username"];
            document.getElementById("UserEmail").value = rows["Email"];
            document.getElementById("UserEnsemleName").value = rows["EnsembleName"];
            document.getElementById("UserStadtKanton").value = rows["StadtKanton"];
            if(rows["GroupID"] < 3){
              document.getElementById("UserModalUser").selected = true;
            } else if(rows["GroupID"] == 3){
              document.getElementById("UserModalModerator").selected = true;
            } else if(rows["GroupID"] == 4){
              document.getElementById("UserModalAdmin").selected = true;
            }

            document.getElementById("UserResponse").innerHTML = "";
     } else {
       document.getElementById("UserResponse").innerHTML = "Loading...";
     }
  };
  var request = "id=" + UserID;
  xhttp.open("POST", "functions/functions.php?func=getUserInfo", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(request);
}

function delUser(){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
            document.getElementById("premResponseDelUser").innerHTML = "Deleted";
            document.getElementById("Username").value = "";
            document.getElementById("deleteUserName").innerHTML = "";
            document.getElementById("UserEmail").value = "";
            document.getElementById("UserEnsemleName").value = "";
            document.getElementById("UserStadtKanton").value = "";
            setTimeout(function(){
                location.reload();
            }, 800);
     } else {
       document.getElementById("premResponseDelUser").innerHTML = "Loading...";
     }
  };
  var request = "id=" + currentUserID;
  xhttp.open("POST", "functions/functions.php?func=delUser", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(request);
}

function changeUser(){
  var xhttp = new XMLHttpRequest();
  var name = document.getElementById('Username').value;
  var email = document.getElementById('UserEmail').value;
  var ename = document.getElementById('UserEnsemleName').value;
  var city = document.getElementById('UserStadtKanton').value;
  var e = document.getElementById("UserGroup");
  var group = e.options[e.selectedIndex].value;

  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var ret = this.responseText;
        if(ret.includes("Success")){
            document.getElementById("UserResponse").innerHTML = ret;
          setTimeout(function(){
            location.reload();
          }, 800);
        } else {
          document.getElementById("UserResponse").innerHTML = ret;
        }
     } else {
       document.getElementById("UserResponse").innerHTML = "Loading...";
     }
  };
  var request = "id=" + currentUserID + "&name=" + name + "&email=" + email + "&ename=" + ename + "&city=" + city + "&group=" + group;
  xhttp.open("POST", "functions/functions.php?func=changeUser", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(request);
}
