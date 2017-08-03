<?php
function changeJgt(){
  global $DBconn;
  $jgtTeilnahme = gMS($_POST['teilnahmebedingungen']);
  // Zum Stück
  $jgtTitel = gMS($_POST['jgtTitel']);
  $jgtUntertitel = gMS($_POST['jgtUntertitel']);
  $jgtDate = gMS($_POST['jgtDate']);
  $jgtOrt = gMS($_POST['jgtOrt']);
  $jgtDauer = gMS($_POST['jgtDauer']);
  $actCheck = gMS($_POST['actCheck']);
  $jgtAlter = gMS($_POST['jgtAlter']);
  $jgtSprachen= gMS($_POST['jgtSprachen']);
  $jgtCC = gMS($_POST['jgtCC']);

  // Zum Ensemble
  $jgtEnsembleName = gMS($_POST['jgtEnsembleName']);
  $jgtEnsembleCity= gMS($_POST['jgtEnsembleCity']);
  $jgtPlayer = gMS($_POST['jgtPlayer']);
  $jgtNonPlayer = gMS($_POST['jgtNonPlayer']);
  $jgtAgeFrom = gMS($_POST['jgtAgeFrom']);
  $jgtAgeTo = gMS($_POST['jgtAgeTo']);
  $jgtAge13W = gMS($_POST['jgtAge13W']);
  $jgtAge13M = gMS($_POST['jgtAge13M']);
  $jgtAge14W = gMS($_POST['jgtAge14W']);
  $jgtAge14M = gMS($_POST['jgtAge14M']);
  $jgtAge18W = gMS($_POST['jgtAge18W']);
  $jgtAge18M = gMS($_POST['jgtAge18M']);
  $jgtAge21W = gMS($_POST['jgtAge21W']);
  $jgtAge21M = gMS($_POST['jgtAge21M']);
  $jgtSpielleitung = gMS($_POST['jgtSpielleitung']);
  $jgtAdress = gMS($_POST['jgtAdress']);
  $jgtTele = gMS($_POST['jgtTele']);
  $jgtEmail = gMS($_POST['jgtEmail']);
  $jgtInfo = gMS($_POST['jgtInfo']);

  // Zur Trägerschaft
  $jgtTrager = gMS($_POST['jgtTrager']);
  $jgtTragerAdress = gMS($_POST['jgtTragerAdress']);
  $jgtTragerTele = gMS($_POST['jgtTragerTele']);
  $jgtTragerEmail = gMS($_POST['jgtTragerEmail']);
  $jgtTragerWebsite = gMS($_POST['jgtTragerWebsite']);

  // Vom Wettbewerb erfahren durch
  $medienInsta = gMS($_POST['medienInsta']);
  $medienFlickr = gMS($_POST['medienFlickr']);
  $medienEmail = gMS($_POST['medienEmail']);
  $medienFacebook = gMS($_POST['medienFacebook']);
  $medienWebsite = gMS($_POST['medienWebsite']);
  $medienTagespresse = gMS($_POST['medienTagespresse']);
  $medienFachzeitschrift = gMS($_POST['medienFachzeitschrift']);
  $medienAnzeige = gMS($_POST['medienAnzeige']);
  $medienFlyer = gMS($_POST['medienFlyer']);
  $medienKollegen = gMS($_POST['medienKollegen']);
  $medienSchulverteiler = gMS($_POST['medienSchulverteiler']);
  $medienSonstige = gMS($_POST['medienSonstige']);
  $jgtSonst = gMS($_POST['jgtSonst']);

  // Anhänge
  $jgtVid = gMS($_POST['jgtVid']);
  $jgtAnVid = gMS($_POST['jgtAnVid']);
  $jgtBeschrieb = gMS($_POST['jgtBeschrieb']);
  $jgtAnInfo = gMS($_POST['jgtAnInfo']);
  $jgtAnBe = gMS($_POST['jgtAnBe']);

  // Schluss
  $jgtSign = gMS($_POST['jgtSign']);

  $varArray = array($jgtTitel,$jgtUntertitel,$jgtDate,$jgtOrt,$jgtDauer,$actCheck,$jgtAlter,$jgtSprachen,$jgtCC,$jgtEnsembleName,$jgtEnsembleCity,$jgtPlayer,$jgtNonPlayer,$jgtAgeFrom,$jgtAgeTo,$jgtAge13W,$jgtAge13M,$jgtAge14W,$jgtAge14M,$jgtAge18W,$jgtAge18M,$jgtAge21W,$jgtAge21M,$jgtSpielleitung,$jgtAdress,$jgtTele,$jgtEmail,$jgtInfo,$jgtTrager,$jgtTragerAdress,$jgtTragerTele,$jgtTragerEmail,$jgtTragerWebsite,$medienInsta,$medienFlickr,$medienEmail,$medienFacebook,$medienWebsite,$medienTagespresse,$medienFachzeitschrift,$medienAnzeige,$medienFlyer,$medienKollegen,$medienSchulverteiler,$medienSonstige,$jgtSonst,$jgtVid,$jgtAnVid,$jgtBeschrieb,$jgtAnInfo,$jgtAnBe,$jgtTeilnahme,$jgtSign);
  $dbjson = json_encode($varArray);

  $sql = "UPDATE anmeldungen SET Json='".$dbjson."' WHERE ID=".$_POST['id'];
  if ($DBconn->query($sql) === TRUE) {
    echo "Success!";
  } else {
    echo "Error: " . $sql . "<br>" . $DBconn->error;
  }
}

 ?>
