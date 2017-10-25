var currentContentID = 0;
function showContent(id){
  var xhttp = new XMLHttpRequest();
  currentContentID = id;
  xhttp.onreadystatechange = function() {
      $("#contentmodal").modal("show");
      if (this.readyState == 4 && this.status == 200) {
          var ret = JSON.parse(this.responseText);
            document.getElementById('std').value = ret['std'];
            document.getElementById('de').value = ret['de'];
            document.getElementById('fr').value = ret['fr'];
            document.getElementById('it').value = ret['it'];
            document.getElementById("ContentResponse").innerHTML = "";
     } else {
       document.getElementById("ContentResponse").innerHTML = "Loading...";
     }
  };
  var request = "id=" + id;
  xhttp.open("POST", "functions/functions.php?func=getContent", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(request);
}


function changeContent(){
  var xhttp = new XMLHttpRequest();
  var de = encodeURIComponent(document.getElementById('de').value);
  var fr = encodeURIComponent(document.getElementById('fr').value);
  var it = encodeURIComponent(document.getElementById('it').value);
  xhttp.onreadystatechange = function() {
      $("#contentmodal").modal("show");
      if (this.readyState == 4 && this.status == 200) {
        var ret = this.responseText;
        if(ret.includes("Success")){
            document.getElementById("ContentResponse").innerHTML = ret;
          setTimeout(function(){
            $("#contentmodal").modal("hide");
          }, 800);
        } else {
          document.getElementById("ContentResponse").innerHTML = ret;
        }
     } else {
       document.getElementById("ContentResponse").innerHTML = "Loading...";
     }
  };
  var request = "id=" + currentContentID + "&de=" + de + "&fr=" + fr + "&it=" + it;
  xhttp.open("POST", "functions/functions.php?func=changeContent", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(request);
}


function SearchContent() {
  var input, filter, table, tr, td, i, group;
  input = document.getElementById("ContentSearch");
  filter = input.value.toUpperCase();
  table = document.getElementById("ContentTable");
  tr = table.getElementsByTagName("tr");
  group = document.getElementById("SearchForContent").options[document.getElementById("SearchForContent").selectedIndex].value;

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



function sortTableContent(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("ContentTable");
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
