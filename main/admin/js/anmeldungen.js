var CurrentJgtID = 0;
function showJgt(id){
  var xhttp = new XMLHttpRequest();
  CurrentJgtID = id;
  xhttp.onreadystatechange = function() {
      $("#jgtmodal").modal("show");
      if (this.readyState == 4 && this.status == 200) {
            var rows = JSON.parse(this.responseText);
            document.getElementById('deleteJgt').innerHTML = rows[0];
            loadMockFiles();

            // Zum Stück
            document.getElementById('jgtTitel').value = rows[0];
            document.getElementById('jgtUntertitel').value = rows[1];
            document.getElementById('jgtDate').value = rows[2];
            document.getElementById('jgtOrt').value = rows[3];
            document.getElementById('jgtDauer').value = rows[4];
            if(rows[5] == 'true'){document.getElementById('actCheck2').click();}
            document.getElementById('jgtAlter').value = rows[6];
            document.getElementById('jgtSprachen').value = rows[7];
            document.getElementById('jgtCC').value = rows[8];

            // Zum Ensemble
            document.getElementById('jgtEnsembleName').value = rows[9];
            document.getElementById('jgtEnsembleCity').value = rows[10];
            document.getElementById('jgtPlayer').value = rows[11];
            document.getElementById('jgtNonPlayer').value = rows[12];
            document.getElementById('jgtAgeFrom').value = rows[13];
            document.getElementById('jgtAgeTo').value = rows[14];
            document.getElementById('jgtAge13W').value = rows[15];
            document.getElementById('jgtAge13M').value = rows[16];
            document.getElementById('jgtAge14W').value = rows[17];
            document.getElementById('jgtAge14M').value = rows[18];
            document.getElementById('jgtAge18W').value = rows[19];
            document.getElementById('jgtAge18M').value = rows[20];
            document.getElementById('jgtAge21W').value = rows[21];
            document.getElementById('jgtAge21M').value = rows[22];
            document.getElementById('jgtSpielleitung').value = rows[23];
            document.getElementById('jgtAdress').value = rows[24];
            document.getElementById('jgtTele').value = rows[25];
            document.getElementById('jgtEmail').value = rows[26];
            document.getElementById('jgtInfo').value = rows[27];

            // Zur Trägerschaft
            document.getElementById('jgtTrager').value = rows[28];
            document.getElementById('jgtTragerAdress').value = rows[29];
            document.getElementById('jgtTragerTele').value = rows[30];
            document.getElementById('jgtTragerEmail').value = rows[31];
            document.getElementById('jgtTragerWebsite').value = rows[32];

            // Vom Wettbewerb erfahren durch
            if(rows[33] == 'true'){document.getElementById('medienInsta2').click();}
            if(rows[34] == 'true'){document.getElementById('medienFlickr2').click();}
            if(rows[35] == 'true'){document.getElementById('medienEmail2').click();}
            if(rows[36] == 'true'){document.getElementById('medienFacebook2').click();}
            if(rows[37] == 'true'){document.getElementById('medienWebsite2').click();}
            if(rows[38] == 'true'){document.getElementById('medienTagespresse2').click();}
            if(rows[39] == 'true'){document.getElementById('medienFachzeitschrift2').click();}
            if(rows[40] == 'true'){document.getElementById('medienAnzeige2').click();}
            if(rows[41] == 'true'){document.getElementById('medienFlyer2').click();}
            if(rows[42] == 'true'){document.getElementById('medienKollegen2').click();}
            if(rows[43] == 'true'){document.getElementById('medienSchulverteiler2').click();}
            if(rows[44] == 'true'){document.getElementById('medienSonstige2').click();}
            document.getElementById('jgtSonst').value = rows[45];

            // Anhänge
            document.getElementById('jgtVid').value = rows[46];
            document.getElementById('jgtAnVid').value = rows[47];
            document.getElementById('jgtBeschrieb').value = rows[48];
            document.getElementById('jgtAnInfo').value = rows[49];
            document.getElementById('jgtAnBe').value = rows[50];

            // Schluss
            if(rows[51] == 'true'){document.getElementById('teilnahmebedingungen2').click();}
            document.getElementById('jgtSign').value  = rows[52];

            document.getElementById("jgtResponse").innerHTML = "";
     } else {
       document.getElementById("jgtResponse").innerHTML = "Loading...";
     }
  };
  var request = "id=" + id;
  xhttp.open("POST", "functions/functions.php?func=getAnmeldung", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(request);
}

function delJgt(){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
            document.getElementById("jgtResponseDel").innerHTML = "Deleted";
            // Zum Stück
            document.getElementById('jgtTitel').value = "";
            document.getElementById('jgtUntertitel').value = "";
            document.getElementById('jgtDate').value = "";
            document.getElementById('jgtOrt').value = "";
            document.getElementById('jgtDauer').value = "";
            if(document.getElementById('actCheck').checked){document.getElementById('actCheck2').click();}
            document.getElementById('jgtAlter').value = "";
            document.getElementById('jgtSprachen').value = "";
            document.getElementById('jgtCC').value = "";

            // Zum Ensemble
            document.getElementById('jgtEnsembleName').value = "";
            document.getElementById('jgtEnsembleCity').value = "";
            document.getElementById('jgtPlayer').value = "";
            document.getElementById('jgtNonPlayer').value = "";
            document.getElementById('jgtAgeFrom').value = "";
            document.getElementById('jgtAgeTo').value = "";
            document.getElementById('jgtAge13W').value = "";
            document.getElementById('jgtAge13M').value = "";
            document.getElementById('jgtAge14W').value = "";
            document.getElementById('jgtAge14M').value = "";
            document.getElementById('jgtAge18W').value = "";
            document.getElementById('jgtAge18M').value = "";
            document.getElementById('jgtAge21W').value = "";
            document.getElementById('jgtAge21M').value = "";
            document.getElementById('jgtSpielleitung').value = "";
            document.getElementById('jgtAdress').value = "";
            document.getElementById('jgtTele').value = "";
            document.getElementById('jgtEmail').value = "";
            document.getElementById('jgtInfo').value = "";

            // Zur Trägerschaft
            document.getElementById('jgtTrager').value = "";
            document.getElementById('jgtTragerAdress').value = "";
            document.getElementById('jgtTragerTele').value = "";
            document.getElementById('jgtTragerEmail').value = "";
            document.getElementById('jgtTragerWebsite').value = "";

            // Vom Wettbewerb erfahren durch
            if(document.getElementById('medienInsta').checked){document.getElementById('medienInsta2').click();}
            if(document.getElementById('medienFlickr').checked){document.getElementById('medienFlickr2').click();}
            if(document.getElementById('medienEmail').checked){document.getElementById('medienEmail2').click();}
            if(document.getElementById('medienFacebook').checked){document.getElementById('medienFacebook2').click();}
            if(document.getElementById('medienWebsite').checked){document.getElementById('medienWebsite2').click();}
            if(document.getElementById('medienTagespresse').checked){document.getElementById('medienTagespresse2').click();}
            if(document.getElementById('medienFachzeitschrift').checked){document.getElementById('medienFachzeitschrift2').click();}
            if(document.getElementById('medienAnzeige').checked){document.getElementById('medienAnzeige2').click();}
            if(document.getElementById('medienFlyer').checked){document.getElementById('medienFlyer2').click();}
            if(document.getElementById('medienKollegen').checked){document.getElementById('medienKollegen2').click();}
            if(document.getElementById('medienSchulverteiler').checked){document.getElementById('medienSchulverteiler2').click();}
            if(document.getElementById('medienSonstige').checked){document.getElementById('medienSonstige2').click();}
            document.getElementById('jgtSonst').value = "";

            // Anhänge
            document.getElementById('jgtVid').value = "";
            document.getElementById('jgtAnVid').value = "";
            document.getElementById('jgtBeschrieb').value = "";
            document.getElementById('jgtAnInfo').value = "";
            document.getElementById('jgtAnBe').value = "";

            // Schluss
            if(document.getElementById('teilnahmebedingungen').checked){document.getElementById('teilnahmebedingungen2').click();}
            document.getElementById('jgtSign').value  = "";
            setTimeout(function(){
                location.reload();
            }, 800);
     } else {
       document.getElementById("jgtResponseDel").innerHTML = "Loading...";
     }
  };
  var request = "id=" + CurrentJgtID;
  xhttp.open("POST", "functions/functions.php?func=delJgt", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(request);
}

function changeJgt(){
  var xhttp = new XMLHttpRequest();
  // Zum Stück
  var jgtTitel = document.getElementById('jgtTitel').value;
  var jgtUntertitel = document.getElementById('jgtUntertitel').value;
  var jgtDate = document.getElementById('jgtDate').value;
  var jgtOrt = document.getElementById('jgtOrt').value;
  var jgtDauer = document.getElementById('jgtDauer').value;
  var actCheck = document.getElementById('actCheck').checked;
  var jgtAlter = document.getElementById('jgtAlter').value;
  var jgtSprachen = document.getElementById('jgtSprachen').value;
  var jgtCC = document.getElementById('jgtCC').value;
  var requestStueck = "jgtTitel=" + jgtTitel + "&jgtUntertitel=" + jgtUntertitel + "&jgtDate=" + jgtDate + "&jgtOrt=" + jgtOrt + "&jgtDauer=" + jgtDauer + "&actCheck=" + actCheck + "&jgtAlter=" + jgtAlter + "&jgtSprachen=" + jgtSprachen + "&jgtCC=" + jgtCC;

  // Zum Ensemble
  var jgtEnsembleName = document.getElementById('jgtEnsembleName').value;
  var jgtEnsembleCity = document.getElementById('jgtEnsembleCity').value;
  var jgtPlayer = document.getElementById('jgtPlayer').value;
  var jgtNonPlayer = document.getElementById('jgtNonPlayer').value;
  var jgtAgeFrom = document.getElementById('jgtAgeFrom').value;
  var jgtAgeTo = document.getElementById('jgtAgeTo').value;
  var jgtAge13W = document.getElementById('jgtAge13W').value;
  var jgtAge13M = document.getElementById('jgtAge13M').value;
  var jgtAge14W = document.getElementById('jgtAge14W').value;
  var jgtAge14M = document.getElementById('jgtAge14M').value;
  var jgtAge18W = document.getElementById('jgtAge18W').value;
  var jgtAge18M = document.getElementById('jgtAge18M').value;
  var jgtAge21W = document.getElementById('jgtAge21W').value;
  var jgtAge21M = document.getElementById('jgtAge21M').value;
  var jgtSpielleitung = document.getElementById('jgtSpielleitung').value;
  var jgtAdress = document.getElementById('jgtAdress').value;
  var jgtTele = document.getElementById('jgtTele').value;
  var jgtEmail = document.getElementById('jgtEmail').value;
  var jgtInfo = document.getElementById('jgtInfo').value;
  var requestEnsemble = "&jgtEnsembleName=" + jgtEnsembleName + "&jgtEnsembleCity=" + jgtEnsembleCity + "&jgtPlayer=" + jgtPlayer + "&jgtNonPlayer=" + jgtNonPlayer + "&jgtAgeFrom=" + jgtAgeFrom + "&jgtAgeTo=" + jgtAgeTo + "&jgtAge13W=" + jgtAge13W + "&jgtAge13M=" + jgtAge13M + "&jgtAge14W=" + jgtAge14W + "&jgtAge14M=" + jgtAge14M + "&jgtAge18W=" + jgtAge18W + "&jgtAge18M=" + jgtAge18M + "&jgtAge21W=" + jgtAge21W + "&jgtAge21M=" + jgtAge21M + "&jgtSpielleitung=" + jgtSpielleitung + "&jgtAdress=" + jgtAdress + "&jgtTele=" + jgtTele + "&jgtEmail=" + jgtEmail + "&jgtInfo=" + jgtInfo;

  // Zur Trägerschaft
  var jgtTrager = document.getElementById('jgtTrager').value;
  var jgtTragerAdress = document.getElementById('jgtTragerAdress').value;
  var jgtTragerTele = document.getElementById('jgtTragerTele').value;
  var jgtTragerEmail = document.getElementById('jgtTragerEmail').value;
  var jgtTragerWebsite = document.getElementById('jgtTragerWebsite').value;
  var requestTrager = "&jgtTrager=" + jgtTrager + "&jgtTragerAdress=" + jgtTragerAdress + "&jgtTragerTele=" + jgtTragerTele + "&jgtTragerEmail=" + jgtTragerEmail + "&jgtTragerWebsite=" + jgtTragerWebsite;

  // Vom Wettbewerb erfahren durch
  var medienInsta = document.getElementById('medienInsta').checked;
  var medienFlickr = document.getElementById('medienFlickr').checked;
  var medienEmail = document.getElementById('medienEmail').checked;
  var medienFacebook = document.getElementById('medienFacebook').checked;
  var medienWebsite = document.getElementById('medienWebsite').checked;
  var medienTagespresse = document.getElementById('medienTagespresse').checked;
  var medienFachzeitschrift = document.getElementById('medienFachzeitschrift').checked;
  var medienAnzeige = document.getElementById('medienAnzeige').checked;
  var medienFlyer = document.getElementById('medienFlyer').checked;
  var medienKollegen = document.getElementById('medienKollegen').checked;
  var medienSchulverteiler = document.getElementById('medienSchulverteiler').checked;
  var medienSonstige = document.getElementById('medienSonstige').checked;
  var jgtSonst = document.getElementById('jgtSonst').value;
  var requestWett = "&medienInsta=" + medienInsta + "&medienFlickr=" + medienFlickr + "&medienEmail=" + medienEmail + "&medienFacebook=" + medienFacebook + "&medienWebsite=" + medienWebsite + "&medienTagespresse=" + medienTagespresse + "&medienFachzeitschrift=" + medienFachzeitschrift + "&medienAnzeige=" + medienAnzeige + "&medienFlyer=" + medienFlyer + "&medienKollegen=" + medienKollegen + "&medienSchulverteiler=" + medienSchulverteiler + "&medienSonstige=" + medienSonstige + "&jgtSonst=" + jgtSonst;

  // Anhänge
  var jgtVid = document.getElementById('jgtVid').value;
  var jgtAnVid = document.getElementById('jgtAnVid').value;
  var jgtBeschrieb = document.getElementById('jgtBeschrieb').value;
  var jgtAnInfo = document.getElementById('jgtAnInfo').value;
  var jgtAnBe = document.getElementById('jgtAnBe').value;
  var requestAnhang = "&jgtVid=" + jgtVid + "&jgtAnVid=" + jgtAnVid + "&jgtBeschrieb=" + jgtBeschrieb + "&jgtAnInfo=" + jgtAnInfo + "&jgtAnBe=" + jgtAnBe;

  // Schluss
  var teilnahmebedingungen = document.getElementById('teilnahmebedingungen').checked;
  var jgtSign = document.getElementById('jgtSign').value;
  var requestSchluss = "&teilnahmebedingungen=" + teilnahmebedingungen + "&jgtSign=" + jgtSign;


  var request = requestStueck + requestEnsemble + requestTrager + requestWett + requestAnhang + requestSchluss + "&id=" + CurrentJgtID;
  $('#jgtmodal').animate({ scrollTop: 0 }, 'slow');
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var ret = this.responseText;
        if(ret.includes("Success")){
            document.getElementById("jgtResponse").innerHTML = ret;
          setTimeout(function(){
            location.reload();
          }, 800);
        } else {
          document.getElementById("jgtResponse").innerHTML = ret;
        }
     } else {
       document.getElementById("jgtResponse").innerHTML = "Loading...";
     }
  };
  xhttp.open("POST", "functions/functions.php?func=changeJgt", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(request);
}

function SearchJgt() {
  var input, filter, table, tr, td, i, group;
  input = document.getElementById("JgtSearch");
  filter = input.value.toUpperCase();
  table = document.getElementById("jgtTable");
  tr = table.getElementsByTagName("tr");
  group = document.getElementById("SearchForJgt").options[document.getElementById("SearchForJgt").selectedIndex].value;

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


function sortTableJgt(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("jgtTable");
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

function loadMockFiles(){
  Dropzone.forElement("#jgtdz").removeAllFiles(true);
  Dropzone.forElement("#jgtdzA").removeAllFiles(true);
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var ret = this.responseText;
        var res = ret.split("/");
        if(res[0] != ""){
          addMockFile(res[0],"jgtdz");
        }
        for(var i = 1; i < res.length; i++){
          addMockFile(res[i],"jgtdzA");
        }
     }
  };
  var request = "id="+CurrentJgtID;
  xhttp.open("POST", "functions/functions.php?func=getFileInfos", true);
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

var fileName3 = "tech_";
$(document).ready(function(){
  Dropzone.autoDiscover = false;
  $("#jgtdz").dropzone({
    paramName: fileName3,
    url: '../functions/functions.php?func=techUploader',
    maxFilesize: 1, //FileSize in MB
    acceptedFiles: ".pdf",
    init: function() {
      this.removeEventListeners();
    }
  });
});

var jgtdzA_Counter = 0;
var jgtdzA_MaxFiles = 5;
var jgtdzA_FileName = "file_";
var jgtdzA_ID = "#jgtdzA";
var jgtdzA_FileTypes = ".pdf,.jpg,.png,.doc,.docx";
var jgtdzA_FileSizeMB = 1;
var jgtdzA_Url = "../functions/functions.php?func=fileUploader";

function openChooserJgt(){var mydz = Dropzone.forElement(jgtdzA_ID);mydz.hiddenFileInput.click();}
$(document).ready(function(){Dropzone.autoDiscover = false;
  $(jgtdzA_ID).dropzone({paramName: jgtdzA_FileName,url: jgtdzA_Url,maxFilesize: jgtdzA_FileSizeMB, acceptedFiles: jgtdzA_FileTypes,
    init: function() {this.removeEventListeners();}});
  });

function premDelAll(){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("delAllRes").innerHTML = "Gelöscht";
        setTimeout(function(){
            location.reload();
        }, 800);
      }
  };
  document.getElementById("delAllRes").innerHTML = "Loading...";
  xhttp.open("POST", "functions/functions.php?func=premDelAll", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("");
}
