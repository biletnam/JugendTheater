function openJgt(){
  if(!loggedIn){
    $("#infoModText").html("Du musst eingeloggt sein!");
    $("#infomodal").modal("show");
  } else {
    $("#jgtmodal").modal("show");
  }
}
