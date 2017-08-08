function tryPremiere(){
  var xhttp = new XMLHttpRequest();
  var name = document.getElementById('premProduktion').value;
  var spieler = document.getElementById('premSpieler').value;
  var datum = document.getElementById('premDate').value;
  var ort = document.getElementById('premOrt').value;
  var beschrieb = document.getElementById('premTA').value;
  var video = document.getElementById('premVid').value;
  var jon = getAddDatesJ();
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          var ret = this.responseText;
          if(ret.includes("Success")){
            var res = ret.split("/");
            document.getElementById('premProduktion').value = "";
            document.getElementById('premSpieler').value = "";
            document.getElementById('premDate').value = "";
            document.getElementById('premOrt').value = "";
            document.getElementById('premTA').value = "";
            document.getElementById('premVid').value = "";
            Dropzone.forElement("#my-dz").removeAllFiles(true);
            document.getElementById("premResponse").innerHTML = res[0];
            document.getElementById("noPremtxt").className = "wow fadeInUp col-md-12 text-center invisibleStrict";
            setTimeout(function(){
              $("#premieremodal").modal("hide");
              document.getElementById("premResponse").innerHTML = "";
                $("ul#profPrems").append('<li class="wow fadeInUp col-md-4" style="background-image: url(../uploads/small/'+res[1]+res[2]+');" data-wow-duration="1s" data-wow-delay="0s" data-stellar-background-ratio="0.5" id="premNr'+res[1]+'"><a  href="#" onclick="showPremEditModal('+res[1]+');event.preventDefault();"><div class="fh5co-overlay"></div><div class="fh5co-text"><div class="fh5co-text-inner"><div class="text-center"><h3>'+res[3]+'</h3></div></div></div></a></li>');
            }, 800);
          } else {
            document.getElementById("premResponse").innerHTML = this.responseText;
          }
     } else {
       document.getElementById("premResponse").innerHTML = "Waiting for response...";
     }
  };
  var request = "name=" + name + "&spieler=" + spieler + "&datum=" + datum + "&ort=" + ort + "&beschrieb=" + beschrieb + "&video=" + video + "&jon=" + jon;
  xhttp.open("POST", "functions/functions.php?func=newPrem", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(request);
}

function openPremiere(){
  if(!loggedIn){
    $("#infoModText").html("Du musst eingeloggt sein!");
    $("#infomodal").modal("show");
  } else {
    $("#premieremodal").modal("show");
  }
}

var currentPremID = 0;
var filetype = "";
function showPremEditModal(premID){
  var xhttp = new XMLHttpRequest();
  currentPremID = premID;
  xhttp.onreadystatechange = function() {
      $("#premEditmodal").modal("show");
      if (this.readyState == 4 && this.status == 200) {
            var rows = JSON.parse(this.responseText);
            loadMockFilesEdit();
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
            if(rows["Activation"] == 0){
              document.getElementById("premResponseEdit").innerHTML = "Warten auf Aktivierung...";
            } else if(rows["Activation"] == 1){
              document.getElementById("premResponseEdit").innerHTML = "Aktiviert.";
            } else if(rows["Activation"] == 2){
              document.getElementById("premResponseEdit").innerHTML = "Abgelehnt.";
            }

            document.getElementById("premDel").className = "btn btn-danger btn-outline pull-right";
            document.getElementById("premDel").disabled = false;
            document.getElementById("premChange").className = "btn btn-success btn-outline pull-right";
            document.getElementById("premChange").disabled = false;
     } else {
       document.getElementById("premResponseEdit").innerHTML = "Loading...";
     }
  };
  var request = "id=" + premID;
  xhttp.open("POST", "functions/functions.php?func=getPremInfo", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(request);
}

function delPrem(){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
            document.getElementById("premResponseDel").innerHTML = "Deleted";
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
              if($("ul#profPrems > li").length == 0){document.getElementById("noPremtxt").className = "wow fadeInUp col-md-12 text-center";}
            }, 800);
     } else {
       document.getElementById("premResponseDel").innerHTML = "Loading...";
     }
  };
  var request = "id=" + currentPremID;
  xhttp.open("POST", "functions/functions.php?func=delPrem", true);
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
  var jon = getAddDatesJEdit();
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
  var request = "id=" + currentPremID + "&name=" + name + "&spieler=" + spieler + "&datum=" + datum + "&ort=" + ort + "&beschrieb=" + beschrieb + "&video=" + video + "&filetype=" + filetype + "&jon=" + jon;
  xhttp.open("POST", "functions/functions.php?func=changePrem", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(request);
}

function remAuf(nmbr){
  $("#premDateDiv" + nmbr).remove();
  $("#premOrtDiv" + nmbr).remove();
  $("#premIcoDiv" + nmbr).remove();
  var index = nmbrs.indexOf(nmbr);
  if (index > -1) {
    nmbrs.splice(index, 1);
  }
}
var nmbrs = [];
var lastNmbr = 0;
function newAuf(){
  var nmbr = lastNmbr + 1;
  $( '<div class="col-md-6 regMod" id="premDateDiv'+nmbr+'"><input class="form-control input-lg mt-1 modalCorr" name="premDate" id="premDate'+nmbr+'" type="datetime-local" placeholder="Datum Premiere" required></div><div class="col-md-4 regMod" id="premOrtDiv'+nmbr+'"><input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="premOrt" id="premOrt'+nmbr+'" type="text" placeholder="Aufführungort" required>  </div><div class="col-md-2 regMod" id="premIcoDiv'+nmbr+'"><i onclick="remAuf('+nmbr+');" id="delIco'+nmbr+'" class="fa fa-minus-square-o huge-icon clickable" aria-hidden="true"></i></div>').insertBefore( "#newAufDiv" );
  lastNmbr = nmbr;
  nmbrs.push(nmbr);
}
function getAddDatesJ(){
  var dates = [];
  for (var i = 0; i < nmbrs.length; i++){
    dates.push($("#premDate"+nmbrs[i]).val());
    dates.push($("#premOrt"+nmbrs[i]).val());
  }
  var jon = JSON.stringify(dates);
  return jon;
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


  function openChooser(){
    var mydz = Dropzone.forElement("#my-dz");
    mydz.hiddenFileInput.click();
  }

  function openChooserEdit(){
    var mydz = Dropzone.forElement("#my-dz-Edit");
    mydz.hiddenFileInput.click();
  }

// Dropzone config
var fileName2 = "img_" + profileName.innerHTML;
var fileName3 = "tech_" + profileName.innerHTML;
$(document).ready(function(){
  Dropzone.autoDiscover = false;

  $("#my-dz").dropzone({
    paramName: fileName2,
    url: '../functions/functions.php?func=imageUploader',
    maxFilesize: 1,
    acceptedFiles: "image/jpeg,image/png,image/gif",

    init: function() {
      this.removeEventListeners();
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
      this.on("addedfile", function() {
        if (this.files[1]!=null){
          this.removeFile(this.files[0]);
        }
      });
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


function openChooserTech(){
  if(!jgtdone){
    var mydz = Dropzone.forElement("#jgtdz");
    mydz.hiddenFileInput.click();
  }
}

$(document).ready(function(){
  Dropzone.autoDiscover = false;
  $("#jgtdz").dropzone({
    paramName: fileName3,
    url: '../functions/functions.php?func=techUploader',
    maxFilesize: 1, //FileSize in MB
    acceptedFiles: ".pdf",

    init: function() {
      this.removeEventListeners();
      this.on("addedfile", function() {
        if (this.files[1]!=null){
          this.removeFile(this.files[0]);
        }
        if(!loadsMocks){
          var ext = this.files[0].name.split('.').pop();
          if (ext == "pdf") {
             $(this.files[0].previewElement).find(".dz-image img").attr("src", "../images/edit/pdf.png");
          }
          loadsMocks = true;
        }
      });
    }
  });
});

var jgtdzA_Counter = 0;
var jgtdzA_MaxFiles = 5;
var jgtdzA_FileName = "file_" + profileName.innerHTML;
var jgtdzA_ID = "#jgtdzA";
var jgtdzA_FileTypes = ".pdf,.jpg,.png,.doc,.docx";
var jgtdzA_FileSizeMB = 1;
var jgtdzA_Url = "../functions/functions.php?func=fileUploader";

function openChooserJgt(){if(!jgtdone){var mydz = Dropzone.forElement(jgtdzA_ID);mydz.hiddenFileInput.click();}}
$(document).ready(function(){Dropzone.autoDiscover = false;
  $(jgtdzA_ID).dropzone({paramName: jgtdzA_FileName,url: jgtdzA_Url,maxFilesize: jgtdzA_FileSizeMB, acceptedFiles: jgtdzA_FileTypes,
    init: function() {this.removeEventListeners();this.on("addedfile", function() {
        if (this.files[jgtdzA_MaxFiles]!=null){this.removeFile(this.files[0]);}
        if(!loadsMocks){
        var ext = this.files[jgtdzA_Counter].name.split('.').pop();
        if (ext == "pdf") { $(this.files[jgtdzA_Counter].previewElement).find(".dz-image img").attr("src", "../images/edit/pdf.png");}
        if (ext == "doc") { $(this.files[jgtdzA_Counter].previewElement).find(".dz-image img").attr("src", "../images/edit/doc.png");}
        if (ext == "docx") { $(this.files[jgtdzA_Counter].previewElement).find(".dz-image img").attr("src", "../images/edit/docx.png");}
        }loadsMocks = true;if(jgtdzA_Counter < jgtdzA_MaxFiles-1){jgtdzA_Counter++;}});}});
  });


  var premDzAn_Counter = 0;
  var premDzAn_MaxFiles = 2;
  var premDzAn_FileName = "premFile_" + profileName.innerHTML;
  var premDzAn_ID = "#premDzAn";
  var premDzAn_FileTypes = ".pdf,.jpg,.png";
  var premDzAn_FileSizeMB = 1;
  var premDzAn_Url = "../functions/functions.php?func=premFileUploader";

  function openChooserPremAn(){var mydz = Dropzone.forElement(premDzAn_ID);mydz.hiddenFileInput.click();}
  $(document).ready(function(){Dropzone.autoDiscover = false;
    $(premDzAn_ID).dropzone({paramName: premDzAn_FileName,url: premDzAn_Url,maxFilesize: premDzAn_FileSizeMB, acceptedFiles: premDzAn_FileTypes,
      init: function() {this.removeEventListeners();this.on("addedfile", function() {
          if (this.files[premDzAn_MaxFiles]!=null){this.removeFile(this.files[0]);}
          var ext = this.files[premDzAn_Counter].name.split('.').pop();
          if (ext == "pdf") { $(this.files[premDzAn_Counter].previewElement).find(".dz-image img").attr("src", "../images/edit/pdf.png");}
          if (ext == "doc") { $(this.files[premDzAn_Counter].previewElement).find(".dz-image img").attr("src", "../images/edit/doc.png");}
          if (ext == "docx") { $(this.files[premDzAn_Counter].previewElement).find(".dz-image img").attr("src", "../images/edit/docx.png");}
          if(premDzAn_Counter < premDzAn_MaxFiles-1){premDzAn_Counter++;}});}});
    });



    function openChooserPremAnEdit(){Dropzone.forElement("#premDzAnEdit").hiddenFileInput.click();}
    $(document).ready(function(){Dropzone.autoDiscover = false;
      var Counter = 0;
      var MaxFiles = 2;
      var FileName = "premFile_" + profileName.innerHTML;
      var FileTypes = ".pdf,.jpg,.png";
      var FileSizeMB = 1;
      var Url = "../functions/functions.php?func=premFileUploader";
      $("#premDzAnEdit").dropzone({paramName:FileName,url:Url,maxFilesize:FileSizeMB,acceptedFiles: FileTypes,init:function(){this.removeEventListeners();this.on("addedfile",function(){if (this.files[MaxFiles]!=null){this.removeFile(this.files[0]);}
            if(!AddsMockFiles){
            var ext = this.files[Counter].name.split('.').pop();
            if (ext == "pdf") { $(this.files[Counter].previewElement).find(".dz-image img").attr("src", "../images/edit/pdf.png");}
            if (ext == "doc") { $(this.files[Counter].previewElement).find(".dz-image img").attr("src", "../images/edit/doc.png");}
            if (ext == "docx") { $(this.files[Counter].previewElement).find(".dz-image img").attr("src", "../images/edit/docx.png");}
            } AddsMockFiles = false;
            if(Counter < MaxFiles-1){Counter++;}});}});
      });

    var AddsMockFiles = false;
    function loadMockFilesEdit(){
      Dropzone.forElement("#premDzAnEdit").removeAllFiles(true);
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            var ret = this.responseText;
            if(ret != ""){
              var res = ret.split("/");
              for(var i = 0; i < res.length; i++){
                AddsMockFiles = true;
                addMockFileEdit(res[i],"premDzAnEdit");
              }
            }
         }
      };
      var request = "id="+currentPremID;
      xhttp.open("POST", "functions/functions.php?func=getPremFileInfos", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send(request);
    }

    function addMockFileEdit(filename,dzID){
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
