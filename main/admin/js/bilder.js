$(document).ready(function(){
  Dropzone.autoDiscover = false;
  initDzBilder(1);
  initDzBilder(2);
  initDzBilder(3);
  initDzBilder(4);
});



function initDzBilder(dzID){
  $("#my-back-dz-"+dzID).dropzone({
    paramName: "back_"+dzID,
    url: '../functions/functions.php?func=changeBackImage&dzID='+dzID,
    maxFilesize: 1, //FileSize in MB
    acceptedFiles: ".jpg",

    init: function() {
      this.on("addedfile", function() {
        if (this.files[1]!=null){
          this.removeFile(this.files[0]);
        }
      });
    }
  });
  addMockFileBilder(dzID);
}

function addMockFileBilder(dzID){
  var mockFile = { name: "back"+dzID+".jpg", size: 323450 };
  var myDropzone = Dropzone.forElement("#my-back-dz-"+dzID);
  myDropzone.emit("addedfile", mockFile);
  myDropzone.createThumbnailFromUrl(mockFile, "../images/edit/back"+dzID+".jpg");
  myDropzone.emit("complete", mockFile);
  myDropzone.files.push(mockFile);
}

function openChooserBilder(id){
  var mydz = Dropzone.forElement("#my-back-dz-"+id);
  mydz.hiddenFileInput.click();
}
