function htmlDecode(string){
  return $('<textarea />').html(string).text();
}

var currentUserID = 0;
function showUser(UserID){
  var xhttp = new XMLHttpRequest();
  currentUserID = UserID;
  xhttp.onreadystatechange = function() {
      $("#usermodal").modal("show");
      if (this.readyState == 4 && this.status == 200) {
            var rows = JSON.parse(this.responseText);
            document.getElementById("Username").value = htmlDecode(rows["Username"]);
            document.getElementById("deleteUserName").innerHTML = htmlDecode(rows["Username"]);
            document.getElementById("UserEmail").value = rows["Email"];
            document.getElementById("UserEnsemleName").value = htmlDecode(rows["EnsembleName"]);
            document.getElementById("UserStadtKanton").value = htmlDecode(rows["StadtKanton"]);
            if(rows["GroupID"] < 3){
              document.getElementById("UserModalUser").selected = true;
            } else if(rows["GroupID"] == 3){
              document.getElementById("UserModalModerator").selected = true;
            } else if(rows["GroupID"] == 4){
              document.getElementById("UserModalAdmin").selected = true;
            }
            if(rows["Activated"] == 1){
              document.getElementById("actCheck").checked = true;
            } else {
              document.getElementById("actCheck").checked = false;
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
  var name = encodeURIComponent(document.getElementById('Username').value);
  var email = encodeURIComponent(document.getElementById('UserEmail').value);
  var ename = encodeURIComponent(document.getElementById('UserEnsemleName').value);
  var city = encodeURIComponent(document.getElementById('UserStadtKanton').value);
  var e = document.getElementById("UserGroup");
  var group = e.options[e.selectedIndex].value;
  var act = 0;
  if(document.getElementById('actCheck').checked){
    act = 1;
  }
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
  var request = "id=" + currentUserID + "&name=" + name + "&email=" + email + "&ename=" + ename + "&city=" + city + "&group=" + group + "&act=" + act;
  xhttp.open("POST", "functions/functions.php?func=changeUser", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(request);
}


function SearchUser() {
  var input, filter, table, tr, td, i, group;
  input = document.getElementById("UserSearch");
  filter = input.value.toUpperCase();
  table = document.getElementById("UserTable");
  tr = table.getElementsByTagName("tr");
  group = document.getElementById("SearchFor").options[document.getElementById("SearchFor").selectedIndex].value;

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[group];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}


function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("UserTable");
  switching = true;
  dir = "asc";
  while (switching) {
    switching = false;
    rows = table.getElementsByTagName("TR");
    for (i = 1; i < (rows.length - 1); i++) {
      shouldSwitch = false;
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          shouldSwitch= true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      switchcount ++;
    } else {
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
