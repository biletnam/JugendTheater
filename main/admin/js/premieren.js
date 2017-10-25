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
            loadMockFiles();
            remAufAllEdit();
            var premAddDates = JSON.parse(rows["addDates"]);
            for (var e = 0; e < premAddDates.length; e += 2){
              newAufEdit();
              $("#premDateEdit"+lastNmbrEdit).val(premAddDates[e]);
              $("#premOrtEdit"+lastNmbrEdit).val(premAddDates[e+1]);
            }
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
              location.reload();
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
  var name = encodeURIComponent(document.getElementById('premProduktionEdit').value);
  var spieler = encodeURIComponent(document.getElementById('premSpielerEdit').value);
  var datum = document.getElementById('premDateEdit').value;
  var ort = encodeURIComponent(document.getElementById('premOrtEdit').value);
  var beschrieb = encodeURIComponent(document.getElementById('premTAEdit').value);
  var video = encodeURIComponent(document.getElementById('premVidEdit').value);
  var jon = getAddDatesJEdit();
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var ret = this.responseText;
        if(ret.includes("Success")){
          var res = ret.split("/");
            document.getElementById("premResponseEdit").innerHTML = res[0];
          setTimeout(function(){
            $("#premEditmodal").modal("hide");
          }, 800);
        } else {
          document.getElementById("premResponseEdit").innerHTML = ret;
        }
     } else {
       document.getElementById("premResponseEdit").innerHTML = "Loading...";
     }
  };
  var request = "id=" + currentPremID + "&name=" + name + "&spieler=" + spieler + "&datum=" + datum + "&ort=" + ort + "&beschrieb=" + beschrieb + "&video=" + video + "&filetype=" + filetype + "&jon=" + jon;
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


function remAufAllEdit(){
  var size = nmbrsEdit.length;
  for (var i = 0; i < size; i++){
    $("#premDateDivEdit" + nmbrsEdit[i]).remove();
    $("#premOrtDivEdit" + nmbrsEdit[i]).remove();
    $("#premIcoDivEdit" + nmbrsEdit[i]).remove();
  }
  lastNmbrEdit = 0;
  nmbrsEdit = [];
}

function remAufEdit(nmbr){
  $("#premDateDivEdit" + nmbr).remove();
  $("#premOrtDivEdit" + nmbr).remove();
  $("#premIcoDivEdit" + nmbr).remove();
  var index = nmbrsEdit.indexOf(nmbr);
  if (index > -1) {
    nmbrsEdit.splice(index, 1);
  }
}
var nmbrsEdit = [];
var lastNmbrEdit = 0;
function newAufEdit(){
  var nmbrEdit = lastNmbrEdit + 1;
  $( '<div class="col-md-6 regMod" id="premDateDivEdit'+nmbrEdit+'"><input class="form-control input-lg mt-1 modalCorr" name="premDate" id="premDateEdit'+nmbrEdit+'" type="datetime-local" placeholder="Datum Premiere" required></div><div class="col-md-4 regMod" id="premOrtDivEdit'+nmbrEdit+'"><input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="premOrt" id="premOrtEdit'+nmbrEdit+'" type="text" placeholder="Aufführungort" required>  </div><div class="col-md-2 regMod" id="premIcoDivEdit'+nmbrEdit+'"><i onclick="remAufEdit('+nmbrEdit+');" id="delIcoEdit'+nmbrEdit+'" class="fa fa-minus-square-o huge-icon clickable" aria-hidden="true"></i></div>').insertBefore( "#newAufDivEdit" );
  lastNmbrEdit = nmbrEdit;
  nmbrsEdit.push(nmbrEdit);
}
function getAddDatesJEdit(){
  var datesEdit = [];
  for (var i = 0; i < nmbrsEdit.length; i++){
    datesEdit.push($("#premDateEdit"+nmbrsEdit[i]).val());
    datesEdit.push($("#premOrtEdit"+nmbrsEdit[i]).val());
  }
  var jonEdit = JSON.stringify(datesEdit);
  return jonEdit;
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


$(document).ready(function(){Dropzone.autoDiscover = false;
  var Counter = 0;
  var MaxFiles = 2;
  var FileName = "premFile_" + profileName.innerHTML;
  var FileTypes = ".pdf,.jpg,.png";
  var FileSizeMB = 1;
  var Url = "../functions/functions.php?func=premFileUploader";
  $("#premDzAnEdit").dropzone({paramName:FileName,url:Url,maxFilesize:FileSizeMB,acceptedFiles: FileTypes,init:function(){this.removeEventListeners();this.on("addedfile",function(){if (this.files[MaxFiles]!=null){this.removeFile(this.files[0]);}
        if(Counter < MaxFiles-1){Counter++;}});}});
  });

function loadMockFiles(){
  Dropzone.forElement("#premDzAnEdit").removeAllFiles(true);
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var ret = this.responseText;
        if(ret != ""){
          var res = ret.split("/");
          for(var i = 0; i < res.length; i++){
            addMockFile(res[i],"premDzAnEdit");
          }
        }
     }
  };
  var request = "id="+currentPremID;
  xhttp.open("POST", "../functions/functions.php?func=getPremFileInfos", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(request);
}

function addMockFile(filename,dzID){
  var mockFile = { name: filename, size: 12345 };
  var myDropzone = Dropzone.forElement("#"+dzID);
  myDropzone.emit("addedfile", mockFile);
  var ext = filename.split('.').pop();
  if (ext == "pdf") {
    myDropzone.createThumbnailFromUrl(mockFile, "../images/edit/pdf.png");
  } else if(ext == "doc"){
    myDropzone.createThumbnailFromUrl(mockFile, "../images/edit/doc.png");
  } else if(ext == "docx"){
    myDropzone.createThumbnailFromUrl(mockFile, "../images/edit/docx.png");
  } else {
    myDropzone.createThumbnailFromUrl(mockFile, "../uploads/"+filename);
  }
  myDropzone.emit("complete", mockFile);
  myDropzone.files.push(mockFile);

  var a = document.createElement('a');
  a.setAttribute('href',"../uploads/"+filename);
  a.setAttribute("download",filename);
  a.className = "clickableStrict dBlock";
  a.innerHTML = 'Download <i class="fa fa-download clickableStrict" aria-hidden="true"></i>';
  mockFile.previewTemplate.appendChild(a);
}
