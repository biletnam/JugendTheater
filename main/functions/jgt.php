<?php
function jgt(){
  global $user;
  global $DBconn;
  $jgtTeilnahme = gMSS($_POST['teilnahmebedingungen']);
  if($jgtTeilnahme == "false"){
    echo gCTSilent("Bitte akzeptieren Sie die Teilnahmebedingungen");
  } else {
    // Zum Stück
    $jgtTitel = gMSS($_POST['jgtTitel']);
    $jgtUntertitel = gMSS($_POST['jgtUntertitel']);
    $jgtDate = gMSS($_POST['jgtDate']);
    $jgtOrt = gMSS($_POST['jgtOrt']);
    $jgtDauer = gMSS($_POST['jgtDauer']);
    $actCheck = gMSS($_POST['actCheck']);
    $jgtAlter = gMSS($_POST['jgtAlter']);
    $jgtSprachen= gMSS($_POST['jgtSprachen']);
    $jgtCC = gMSS($_POST['jgtCC']);

    // Zum Ensemble
    $jgtEnsembleName = gMSS($_POST['jgtEnsembleName']);
    $jgtEnsembleCity= gMSS($_POST['jgtEnsembleCity']);
    $jgtPlayer = gMSS($_POST['jgtPlayer']);
    $jgtNonPlayer = gMSS($_POST['jgtNonPlayer']);
    $jgtAgeFrom = gMSS($_POST['jgtAgeFrom']);
    $jgtAgeTo = gMSS($_POST['jgtAgeTo']);
    $jgtAge13W = gMSS($_POST['jgtAge13W']);
    $jgtAge13M = gMSS($_POST['jgtAge13M']);
    $jgtAge14W = gMSS($_POST['jgtAge14W']);
    $jgtAge14M = gMSS($_POST['jgtAge14M']);
    $jgtAge18W = gMSS($_POST['jgtAge18W']);
    $jgtAge18M = gMSS($_POST['jgtAge18M']);
    $jgtAge21W = gMSS($_POST['jgtAge21W']);
    $jgtAge21M = gMSS($_POST['jgtAge21M']);
    $jgtSpielleitung = gMSS($_POST['jgtSpielleitung']);
    $jgtAdress = gMSS($_POST['jgtAdress']);
    $jgtTele = gMSS($_POST['jgtTele']);
    $jgtEmail = gMSS($_POST['jgtEmail']);
    $jgtInfo = gMSS($_POST['jgtInfo']);

    // Zur Trägerschaft
    $jgtTrager = gMSS($_POST['jgtTrager']);
    $jgtTragerAdress = gMSS($_POST['jgtTragerAdress']);
    $jgtTragerTele = gMSS($_POST['jgtTragerTele']);
    $jgtTragerEmail = gMSS($_POST['jgtTragerEmail']);
    $jgtTragerWebsite = gMSS($_POST['jgtTragerWebsite']);

    // Vom Wettbewerb erfahren durch
    $medienInsta = gMSS($_POST['medienInsta']);
    $medienFlickr = gMSS($_POST['medienFlickr']);
    $medienEmail = gMSS($_POST['medienEmail']);
    $medienFacebook = gMSS($_POST['medienFacebook']);
    $medienWebsite = gMSS($_POST['medienWebsite']);
    $medienTagespresse = gMSS($_POST['medienTagespresse']);
    $medienFachzeitschrift = gMSS($_POST['medienFachzeitschrift']);
    $medienAnzeige = gMSS($_POST['medienAnzeige']);
    $medienFlyer = gMSS($_POST['medienFlyer']);
    $medienKollegen = gMSS($_POST['medienKollegen']);
    $medienSchulverteiler = gMSS($_POST['medienSchulverteiler']);
    $medienSonstige = gMSS($_POST['medienSonstige']);
    $jgtSonst = gMSS($_POST['jgtSonst']);

    // Anhänge
    $jgtVid = gMSS($_POST['jgtVid']);
    $jgtAnVid = gMSS($_POST['jgtAnVid']);
    $jgtBeschrieb = gMSS($_POST['jgtBeschrieb']);
    $jgtAnInfo = gMSS($_POST['jgtAnInfo']);
    $jgtAnBe = gMSS($_POST['jgtAnBe']);

    // Schluss
    $jgtSign = gMSS($_POST['jgtSign']);
    $jon = gMS($_POST['jon']);

    $varArray = array($jgtTitel,$jgtUntertitel,$jgtDate,$jgtOrt,$jgtDauer,$actCheck,$jgtAlter,$jgtSprachen,$jgtCC,$jgtEnsembleName,$jgtEnsembleCity,$jgtPlayer,$jgtNonPlayer,$jgtAgeFrom,$jgtAgeTo,$jgtAge13W,$jgtAge13M,$jgtAge14W,$jgtAge14M,$jgtAge18W,$jgtAge18M,$jgtAge21W,$jgtAge21M,$jgtSpielleitung,$jgtAdress,$jgtTele,$jgtEmail,$jgtInfo,$jgtTrager,$jgtTragerAdress,$jgtTragerTele,$jgtTragerEmail,$jgtTragerWebsite,$medienInsta,$medienFlickr,$medienEmail,$medienFacebook,$medienWebsite,$medienTagespresse,$medienFachzeitschrift,$medienAnzeige,$medienFlyer,$medienKollegen,$medienSchulverteiler,$medienSonstige,$jgtSonst,$jgtVid,$jgtAnVid,$jgtBeschrieb,$jgtAnInfo,$jgtAnBe,$jgtTeilnahme,$jgtSign);

    $fin = $_POST['final'];
    $query = "SELECT final FROM anmeldungen WHERE UserID=".$user->getProperty('ID');
    $result=mysqli_query($DBconn,$query);
    if(mysqli_num_rows($result) > 0){
      $sql = "UPDATE anmeldungen SET Json = '".json_encode($varArray)."', Jon = '".$jon."', final = ".$fin." WHERE UserID = " . $user->getProperty('ID');
    } else {
      $sql = "INSERT INTO anmeldungen (UserID, Json, Jon, final) VALUES ('".$user->getProperty('ID')."','".json_encode($varArray)."','".$jon."',".$fin.")";
    }



    if ($DBconn->query($sql) === TRUE) {
      echo gCTSilent("Success!");
    } else {
      echo gCTSilent("Error: ") . $sql . "<br>" . $DBconn->error;
    }
  }
}
?>
