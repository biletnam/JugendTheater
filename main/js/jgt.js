function parseDatetime(dt){
  dt = dt.replace(".","-");
  dt = dt.replace(" ","T");
  dt = dt.replace(".","-");
  return dt;
}

function parseDatetimeBack(dt){
  dt = dt.replace("-",".");
  dt = dt.replace("T"," ");
  dt = dt.replace("-",".");
  return dt;
}

function htmlDecode(string){
  return $('<textarea />').html(string).text();
}

/* REVIEW: Hard Coded Text */
function openJgt(){
  if(!loggedIn){
    $("#infoModText").html("Du musst eingeloggt sein!");
    $("#infomodal").modal("show");
  } else {
    $("#jgtmodal").modal("show");
    if(jgtdone){
      loadAnmeldung(UserIDforJS);
    } else {
      getNames();
    }
  }
}

var final = 0;
var CurrentJgtID = 0;
function loadAnmeldung(id){
  CurrentJgtID = id;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          var ret = JSON.parse(this.responseText);
            var rows = JSON.parse(ret['Json']);
            var JgtAddDates = JSON.parse(ret['Jon']);

            loadMockFiles();
            remAufAllJgt();
            for (var e = 0; e < JgtAddDates.length; e += 2){
              newAufJgt();
              $("#premDateJgt"+lastNmbrJgt).val(parseDatetimeBack(JgtAddDates[e]));
              $("#premOrtJgt"+lastNmbrJgt).val(JgtAddDates[e+1]);
            }
            document.getElementById('jgtTitel').value = htmlDecode(rows[0]);
            document.getElementById('jgtUntertitel').value = htmlDecode(rows[1]);
            document.getElementById('jgtDate').value = parseDatetimeBack(rows[2]);
            document.getElementById('jgtOrt').value = htmlDecode(rows[3]);
            document.getElementById('jgtDauer').value = rows[4];
            if(rows[5] == 'true'){document.getElementById('actCheck2').checked = true;}
            document.getElementById('jgtAlter').value = rows[6];
            document.getElementById('jgtSprachen').value = htmlDecode(rows[7]);
            document.getElementById('jgtCC').value = htmlDecode(rows[8]);
            document.getElementById('jgtEnsembleName').value = htmlDecode(rows[9]);
            document.getElementById('jgtEnsembleCity').value = htmlDecode(rows[10]);
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
            document.getElementById('jgtSpielleitung').value = htmlDecode(rows[23]);
            document.getElementById('jgtAdress').value = htmlDecode(rows[24]);
            document.getElementById('jgtTele').value = rows[25];
            document.getElementById('jgtEmail').value = htmlDecode(rows[26]);
            document.getElementById('jgtInfo').value = htmlDecode(rows[27]);
            document.getElementById('jgtTrager').value = htmlDecode(rows[28]);
            document.getElementById('jgtTragerAdress').value = htmlDecode(rows[29]);
            document.getElementById('jgtTragerTele').value = htmlDecode(rows[30]);
            document.getElementById('jgtTragerEmail').value = htmlDecode(rows[31]);
            document.getElementById('jgtTragerWebsite').value = htmlDecode(rows[32]);
            if(rows[33] == 'true'){document.getElementById('medienInsta').checked = true;}
            if(rows[34] == 'true'){document.getElementById('medienFlickr').checked = true;}
            if(rows[35] == 'true'){document.getElementById('medienEmail').checked = true;}
            if(rows[36] == 'true'){document.getElementById('medienFacebook').checked = true;}
            if(rows[37] == 'true'){document.getElementById('medienWebsite').checked = true;}
            if(rows[38] == 'true'){document.getElementById('medienTagespresse').checked = true;}
            if(rows[39] == 'true'){document.getElementById('medienFachzeitschrift').checked = true;}
            if(rows[40] == 'true'){document.getElementById('medienAnzeige').checked = true;}
            if(rows[41] == 'true'){document.getElementById('medienFlyer').checked = true;}
            if(rows[42] == 'true'){document.getElementById('medienKollegen').checked = true;}
            if(rows[43] == 'true'){document.getElementById('medienSchulverteiler').checked = true;}
            if(rows[44] == 'true'){document.getElementById('medienSonstige').checked = true;}
            document.getElementById('jgtSonst').value = htmlDecode(rows[45]);
            document.getElementById('jgtVid').value = htmlDecode(rows[46]);
            document.getElementById('jgtAnVid').value = htmlDecode(rows[47]);
            document.getElementById('jgtBeschrieb').value = htmlDecode(rows[48]);
            document.getElementById('jgtAnInfo').value = htmlDecode(rows[49]);
            document.getElementById('jgtAnBe').value = htmlDecode(rows[50]);
            if(rows[51] == 'true'){
              document.getElementById('teilnahmebedingungen').checked = true;
              document.getElementById("realSubBtn").disabled = false;
            }
            document.getElementById('jgtSign').value  = htmlDecode(rows[52]);
            document.getElementById("jgtResponse").innerHTML = "";
     } else {
       document.getElementById("jgtResponse").innerHTML = "Loading...";
     }
  };
  var request = "id=" + id;
  xhttp.open("POST", "../admin/functions/functions.php?func=getAnmeldung", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(request);
}

function realSubBtnClick(){
  final = 1;
  tryJgt();
}


function tryJgt(){
  // Zum Stück
  var jgtTitel = document.getElementById('jgtTitel').value;
  var jgtUntertitel = document.getElementById('jgtUntertitel').value;
  var jgtDate = parseDatetime(document.getElementById('jgtDate').value);
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


  var request = requestStueck + requestEnsemble + requestTrager + requestWett + requestAnhang + requestSchluss + "&jon=" + getAddDatesJJgt() + "&final=" + final;
  $('#jgtmodal').animate({ scrollTop: 0 }, 'slow');

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var ret = this.responseText;
      document.getElementById("jgtResponse").innerHTML = ret;
      if(ret.includes("Success")){
        if(final == 1){
          $("#jgtSubmitBtn").hide();
          $("#realSubBtn").hide();
        }
        jgtdone = true;
        setTimeout(function(){
          $("#jgtmodal").modal("hide");
        }, 1000);
      }
      final = 0;
    } else {
      document.getElementById("jgtResponse").innerHTML = "Loading...";
    }
  };
  xhttp.open("POST", "functions/functions.php?func=jgt", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(request);
}

function getNames(){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var ret = this.responseText;
        var res = ret.split("/");
        $("#jgtEnsembleName").val(res[0]);
        $("#jgtEnsembleCity").val(res[1]);
    }
  };
  var request = "";
  xhttp.open("POST", "functions/functions.php?func=getUserInfo", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(request);
}

function sonstTxtToggle(){
  document.getElementById("jgtSonst").disabled = !document.getElementById("jgtSonst").disabled;
}

function tbClick(){
    document.getElementById("realSubBtn").disabled = !document.getElementById("realSubBtn").disabled;
}



$(document).ready(function() {
  $('#jgtmodal').on('hidden.bs.modal', function () {
    Dropzone.forElement("#jgtdz").removeAllFiles(true);
    Dropzone.forElement("#jgtdzA").removeAllFiles(true);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {if (this.readyState == 4 && this.status == 200) {}};
    xhttp.open("POST", "functions/functions.php?func=delUploads", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("");
  });
  $('#premieremodal').on('hidden.bs.modal', function () {
    Dropzone.forElement("#my-dz").removeAllFiles(true);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {if (this.readyState == 4 && this.status == 200) {}};
    xhttp.open("POST", "functions/functions.php?func=delUploads", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("");
  });
  $('#premEditmodal').on('hidden.bs.modal', function () {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {if (this.readyState == 4 && this.status == 200) {}};
    xhttp.open("POST", "functions/functions.php?func=delUploads", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("");
  });
});

function remAufAllJgt(){
  var size = nmbrsJgt.length;
  for (var i = 0; i < size; i++){
    $("#premDateDivJgt" + nmbrsJgt[i]).remove();
    $("#premOrtDivJgt" + nmbrsJgt[i]).remove();
    $("#premIcoDivJgt" + nmbrsJgt[i]).remove();
  }
  lastNmbrJgt = 0;
  nmbrsJgt = [];
}

function remAufJgt(nmbr){
  $("#premDateDivJgt" + nmbr).remove();
  $("#premOrtDivJgt" + nmbr).remove();
  $("#premIcoDivJgt" + nmbr).remove();
  var index = nmbrsJgt.indexOf(nmbr);
  if (index > -1) {
    nmbrsJgt.splice(index, 1);
  }
}
var nmbrsJgt = [];
var lastNmbrJgt = 0;
function newAufJgt(){
  var nmbrJgt = lastNmbrJgt + 1;
  $( '<div class="col-md-4 regMod" id="premDateDivJgt'+nmbrJgt+'"><input placeholder="Datum" class="form-control input-lg mt-1 modalCorr addAuf form_datetime" id="premDateJgt'+nmbrJgt+'" type="text" value="" readonly required></div><div class="col-md-6 regMod" id="premOrtDivJgt'+nmbrJgt+'"><input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="premOrt" id="premOrtJgt'+nmbrJgt+'" type="text" placeholder="*Aufführungort" required>  </div><div class="col-md-2 regMod" id="premIcoDivJgt'+nmbrJgt+'"><i onclick="remAufJgt('+nmbrJgt+');" id="delIcoJgt'+nmbrJgt+'" class="fa fa-minus-square-o huge-icon clickable" aria-hidden="true"></i></div>').insertBefore( "#newAufDivJgt" );
  lastNmbrJgt = nmbrJgt;
  nmbrsJgt.push(nmbrJgt);
  activateDatepicker();
}
function getAddDatesJJgt(){
  var datesJgt = [];
  for (var i = 0; i < nmbrsJgt.length; i++){
    datesJgt.push(parseDatetime($("#premDateJgt"+nmbrsJgt[i]).val()));
    datesJgt.push($("#premOrtJgt"+nmbrsJgt[i]).val());
  }
  var jonJgt = JSON.stringify(datesJgt);
  return jonJgt;
}

var loadsMocks = false;
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
  loadsMocks = true;
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
