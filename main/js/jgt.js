function openJgt(){
  if(!loggedIn){
    $("#infoModText").html("Du musst eingeloggt sein!");
    $("#infomodal").modal("show");
  } else {
    if(jgtdone){
      $("#infoModText").html("Du hast dich bereits angemeldet. ");
      $("#infomodal").modal("show");
    } else {
      $("#jgtmodal").modal("show");
      getNames();
    }
  }
}

function tryJgt(){
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


  var request = requestStueck + requestEnsemble + requestTrager + requestWett + requestAnhang + requestSchluss;
  $('#jgtmodal').animate({ scrollTop: 0 }, 'slow');

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var ret = this.responseText;
      document.getElementById("jgtResponse").innerHTML = ret;
      if(ret.includes("Success")){
        jgtdone = true;
        setTimeout(function(){
          $("#jgtmodal").modal("hide");
        }, 1000);
      }
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
  document.getElementById("jgtSubmitBtn").disabled = !document.getElementById("jgtSubmitBtn").disabled;
}
