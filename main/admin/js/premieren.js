function openPremiere(){
  if(!loggedIn){
    $("#infoModText").html("Du musst eingeloggt sein!");
    $("#infomodal").modal("show");
  } else {
    $("#premieremodal").modal("show");
  }
}

var currentPremID = 0;
var currentAct = 0;
var filetype = "";
function showPremEditModal(premID){
  var xhttp = new XMLHttpRequest();
  currentPremID = premID
  xhttp.onreadystatechange = function() {
      $("#premEditmodal").modal("show");
      if (this.readyState == 4 && this.status == 200) {
            var rows = JSON.parse(this.responseText);
            var filename = rows["ID"]+rows["Bilder"];
            var mockFile = { name: filename, size: 12345 };
            var myDropzone = Dropzone.forElement("#my-dz-Edit");
            myDropzone.emit("addedfile", mockFile);
            myDropzone.createThumbnailFromUrl(mockFile, "../uploads/small/"+filename);
            myDropzone.emit("complete", mockFile);
            myDropzone.files.push(mockFile);
            filetype = rows["Bilder"];
            document.getElementById("premProduktionEdit").value = rows["Produktion"];
            document.getElementById("deleteName").innerHTML = rows["Produktion"];
            document.getElementById("premSpielerEdit").value = rows["Spieler"];
            document.getElementById("premDateEdit").value = rows["PremiereDatum"].replace(" ", "T");
            document.getElementById("premOrtEdit").value = rows["Ort"];
            document.getElementById("premTAEdit").value = rows["Beschrieb"];
            document.getElementById("premVidEdit").value = rows["Video"];
            document.getElementById("premResponseEdit").innerHTML = "";
            if(allowEdit){
              document.getElementById("premDel").className = "btn btn-danger btn-outline pull-right";
              document.getElementById("premDel").disabled = false;
              document.getElementById("premChange").className = "btn btn-success btn-outline pull-right";
              document.getElementById("premChange").disabled = false;
              currentAct = rows["Activation"];
              if(currentAct == 0){
                document.getElementById("premGrant").className = "btn btn-success btn-outline pull-right";
                document.getElementById("premGrant").disabled = false;
                document.getElementById("premInv").className = "btn btn-danger btn-outline pull-right";
                document.getElementById("premInv").disabled = false;
              } else if(currentAct == 1){
                document.getElementById("premGrant").className = "btn btn-success btn-outline pull-right disabled";
                document.getElementById("premGrant").disabled = true;
                document.getElementById("premInv").className = "btn btn-danger btn-outline pull-right";
                document.getElementById("premInv").disabled = false;
              } else if(currentAct == 2){
                document.getElementById("premGrant").className = "btn btn-success btn-outline pull-right";
                document.getElementById("premGrant").disabled = false;
                document.getElementById("premInv").className = "btn btn-danger btn-outline pull-right disabled";
                document.getElementById("premInv").disabled = true;
              }
            }
     } else {
       document.getElementById("premResponseEdit").innerHTML = "Loading...";
     }
  };
  var request = "id=" + premID;
  xhttp.open("POST", "../functions/functions.php?func=getPremInfo", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(request);
}

function delPrem(){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
            document.getElementById("premResponseDel").innerHTML = this.responseText;
            document.getElementById("premProduktionEdit").value = "";
            document.getElementById("deleteName").innerHTML = "";
            document.getElementById("premSpielerEdit").value = "";
            document.getElementById("premDateEdit").value = "";
            document.getElementById("premOrtEdit").value = "";
            document.getElementById("premTAEdit").value = "";
            document.getElementById("premVidEdit").value = "";
            setTimeout(function(){
              $("#deletemodal").modal("hide");
              $("#premEditmodal").modal("hide");
              document.getElementById("premResponseDel").innerHTML = "";
              var elem = document.getElementById('premNr'+currentPremID);
              elem.parentNode.removeChild(elem);
              if(currentAct == 0){
                  if($("ul#profPrems > li").length == 0){document.getElementById("noPremtxt").className = "wow fadeInUp col-md-12 text-center";}
              } else if(currentAct == 1){
                  if($("ul#profPremsActive > li").length == 0){document.getElementById("noPremtxtActive").className = "wow fadeInUp col-md-12 text-center";}
              } else if(currentAct == 2){
                  if($("ul#profPremsInv > li").length == 0){document.getElementById("noPremtxtInv").className = "wow fadeInUp col-md-12 text-center";}
              }
            }, 800);
     } else {
       document.getElementById("premResponseDel").innerHTML = "Loading...";
     }
  };
  var request = "id=" + currentPremID;
  xhttp.open("POST", "../functions/functions.php?func=delPrem", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(request);
}


function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function updatePrem(){
  var xhttp = new XMLHttpRequest();
  var name = document.getElementById('premProduktionEdit').value;
  var spieler = document.getElementById('premSpielerEdit').value;
  var datum = document.getElementById('premDateEdit').value;
  var ort = document.getElementById('premOrtEdit').value;
  var beschrieb = document.getElementById('premTAEdit').value;
  var video = document.getElementById('premVidEdit').value;
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var ret = this.responseText;
        if(ret.includes("Success")){
          var res = ret.split("/");
            document.getElementById("premResponseEdit").innerHTML = res[0];
          setTimeout(function(){
            document.getElementById("premTxtNr"+currentPremID).innerHTML = name;
            document.getElementById("premNr"+currentPremID).style.backgroundImage = "url(../uploads/small/"+currentPremID+res[1]+"?"+getRandomInt(0, 10000)+")";
            $("#premEditmodal").modal("hide");
            document.getElementById("premResponseEdit").innerHTML = "";
          }, 800);
        } else {
          document.getElementById("premResponseEdit").innerHTML = ret;
        }
     } else {
       document.getElementById("premResponseEdit").innerHTML = "Loading...";
     }
  };
  var request = "id=" + currentPremID + "&name=" + name + "&spieler=" + spieler + "&datum=" + datum + "&ort=" + ort + "&beschrieb=" + beschrieb + "&video=" + video + "&filetype=" + filetype;
  xhttp.open("POST", "functions/functions.php?func=changePrem", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(request);
}


function changeActivation(newAct){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          document.getElementById("premResponseEdit").innerHTML = this.responseText;
          setTimeout(function(){ location.reload(); }, 800);
     } else {
       document.getElementById("premResponseEdit").innerHTML = "Loading...";
     }
  };
  var request = "id=" + currentPremID + "&activation="+newAct;
  xhttp.open("POST", "functions/functions.php?func=changeActivation", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(request);
}

// Disable newline
  $(document).ready(function() {
    $('#premEditmodal').on('hidden.bs.modal', function () {
        Dropzone.forElement("#my-dz-Edit").removeAllFiles(true);
    });
    $("#premTA").keypress(function(event) {
      if(event.which == '13') {
        return false;
      }
    });
  });

// Dropzone config
var fileName2 = "img_";
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

$(document).ready(function(){
  Dropzone.autoDiscover = false;

  $("#my-dz-Edit").dropzone({
    paramName: fileName2,
    url: '../functions/functions.php?func=imageUploader',
    maxFilesize: 1,
    acceptedFiles: "image/jpeg,image/png,image/gif",

    init: function() {
      this.removeEventListeners();
    }
  });
});

$(document).on('show.bs.modal', '.modal', function () {
    var zIndex = 1040 + (10 * $('.modal:visible').length);
    $(this).css('z-index', zIndex);
    setTimeout(function() {
        $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
    }, 0);
});

$(document).on('hidden.bs.modal', '.modal', function () {
    $('.modal:visible').length && $(document.body).addClass('modal-open');
});


function SearchPrem0() {
  var input, filter, table, tr, td, i, group;
  input = document.getElementById("PremSearch0");
  filter = input.value.toUpperCase();
  table = document.getElementById("PremTable0");
  tr = table.getElementsByTagName("tr");
  group = document.getElementById("SearchForPrem0").options[document.getElementById("SearchForPrem0").selectedIndex].value;

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
function sortTablePrem0(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("PremTable0");
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


function SearchPrem1() {
  var input, filter, table, tr, td, i, group;
  input = document.getElementById("PremSearch1");
  filter = input.value.toUpperCase();
  table = document.getElementById("PremTable1");
  tr = table.getElementsByTagName("tr");
  group = document.getElementById("SearchForPrem1").options[document.getElementById("SearchForPrem1").selectedIndex].value;

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
function sortTablePrem1(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("PremTable1");
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

function SearchPrem2() {
  var input, filter, table, tr, td, i, group;
  input = document.getElementById("PremSearch2");
  filter = input.value.toUpperCase();
  table = document.getElementById("PremTable2");
  tr = table.getElementsByTagName("tr");
  group = document.getElementById("SearchForPrem2").options[document.getElementById("SearchForPrem2").selectedIndex].value;

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
function sortTablePrem2(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("PremTable2");
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
