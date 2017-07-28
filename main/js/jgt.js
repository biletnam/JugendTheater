function openJgt(){
  if(!loggedIn){
    $("#infoModText").html("Du musst eingeloggt sein!");
    $("#infomodal").modal("show");
  } else {
    $("#jgtmodal").modal("show");
  }
}

function tryJgt(){
  //TODO: Write JS to Jgt-Form
  alert("In Bearbeitung");
}
