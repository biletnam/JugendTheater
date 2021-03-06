function tryPremiere(){
  var xhttp = new XMLHttpRequest();
  var name = document.getElementById('premProduktion').value;
  var spieler = document.getElementById('premSpieler').value;
  var datum = document.getElementById('premDate').value;
  var ort = document.getElementById('premOrt').value;
  var beschrieb = document.getElementById('premTA').value;
  var video = document.getElementById('premVid').value;
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
            document.getElementById("homeNoPremtxt").className = "wow fadeInUp col-md-12 text-center invisibleStrict";
            setTimeout(function(){
              $("#premieremodal").modal("hide");
              document.getElementById("premResponse").innerHTML = "";
              $("ul#homePrems").append('<li class="wow fadeInUp col-md-4" style="background-image: url(../uploads/small/'+res[1]+res[2]+');" data-wow-duration="1s" data-wow-delay="0s" data-stellar-background-ratio="0.5"><a href="../?loc=premiere&prem='+res[1]+'"><div class="fh5co-overlay"></div><div class="fh5co-text"><div class="fh5co-text-inner"><div class="text-center"><h3>'+res[3]+'</h3></div></div></div></a></li>');
            }, 800);
          } else {
            document.getElementById("premResponse").innerHTML = this.responseText;
          }
     } else {
       document.getElementById("premResponse").innerHTML = "Waiting for response...";
     }
  };
  var request = "name=" + name + "&spieler=" + spieler + "&datum=" + datum + "&ort=" + ort + "&beschrieb=" + beschrieb + "&video=" + video;
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

function openChooser(){
  var mydz = Dropzone.forElement("#my-dz");
  mydz.hiddenFileInput.click();
}

function openChooserEdit(){
  var mydz = Dropzone.forElement("#my-dz-Edit");
  mydz.hiddenFileInput.click();
}

// Disable newline
  $(document).ready(function() {
    $("#premTA").keypress(function(event) {
      if(event.which == '13') {
        return false;
      }
    });
  });

// Dropzone config
var fileName2 = "img_" + profileName.innerHTML;
var fileName3 = "tech_" + profileName.innerHTML;

  $(document).ready(function(){
  Dropzone.autoDiscover = false;

  $("#my-dz").dropzone({
    paramName: fileName2,
    url: '../functions/functions.php?func=imageUploader',
    maxFilesize: 1, //FileSize in MB
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
  maxFilesize: 1, //FileSize in MB
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

function openChooserTech(){
  var mydz = Dropzone.forElement("#jgtdz");
  mydz.hiddenFileInput.click();
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
        var ext = this.files[0].name.split('.').pop();
        if (ext == "pdf") {
           $(this.files[0].previewElement).find(".dz-image img").attr("src", "../images/edit/pdf.png");
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

function openChooserJgt(){var mydz = Dropzone.forElement(jgtdzA_ID);mydz.hiddenFileInput.click();}
$(document).ready(function(){Dropzone.autoDiscover = false;
  $(jgtdzA_ID).dropzone({paramName: jgtdzA_FileName,url: jgtdzA_Url,maxFilesize: jgtdzA_FileSizeMB, acceptedFiles: jgtdzA_FileTypes,
    init: function() {this.removeEventListeners();this.on("addedfile", function() {
        if (this.files[jgtdzA_MaxFiles]!=null){this.removeFile(this.files[0]);}
        var ext = this.files[jgtdzA_Counter].name.split('.').pop();
        if (ext == "pdf") { $(this.files[jgtdzA_Counter].previewElement).find(".dz-image img").attr("src", "../images/edit/pdf.png");}
        if (ext == "doc") { $(this.files[jgtdzA_Counter].previewElement).find(".dz-image img").attr("src", "../images/edit/doc.png");}
        if (ext == "docx") { $(this.files[jgtdzA_Counter].previewElement).find(".dz-image img").attr("src", "../images/edit/docx.png");}
        if(jgtdzA_Counter < jgtdzA_MaxFiles-1){jgtdzA_Counter++;}});}});
  });
