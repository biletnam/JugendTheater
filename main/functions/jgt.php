<?php
function jgtSendEmail($email,$msg){
  $to      = $email;
  $subject = 'Bestätigung';
  $message = '<!doctype html>
  <html>
    <head>
      <meta name="viewport" content="width=device-width">
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <title>Bestätigung</title>
      <style>
      @media only screen and (max-width: 620px) {
        table[class=body] h1 {
          font-size: 28px !important;
          margin-bottom: 10px !important;
        }
        table[class=body] p,
              table[class=body] ul,
              table[class=body] ol,
              table[class=body] td,
              table[class=body] span,
              table[class=body] a {
          font-size: 16px !important;
        }
        table[class=body] .wrapper,
              table[class=body] .article {
          padding: 10px !important;
        }
        table[class=body] .content {
          padding: 0 !important;
        }
        table[class=body] .container {
          padding: 0 !important;
          width: 100% !important;
        }
        table[class=body] .main {
          border-left-width: 0 !important;
          border-radius: 0 !important;
          border-right-width: 0 !important;
        }
        table[class=body] .btn table {
          width: 100% !important;
        }
        table[class=body] .btn a {
          width: 100% !important;
        }
        table[class=body] .img-responsive {
          height: auto !important;
          max-width: 100% !important;
          width: auto !important;
        }
      }

      /* -------------------------------------
          PRESERVE THESE STYLES IN THE HEAD
      ------------------------------------- */
      @media all {
        .ExternalClass {
          width: 100%;
        }
        .ExternalClass,
              .ExternalClass p,
              .ExternalClass span,
              .ExternalClass font,
              .ExternalClass td,
              .ExternalClass div {
          line-height: 100%;
        }
        .apple-link a {
          color: inherit !important;
          font-family: inherit !important;
          font-size: inherit !important;
          font-weight: inherit !important;
          line-height: inherit !important;
          text-decoration: none !important;
        }
        .btn-primary table td:hover {
          background-color: #1268E8 !important;
        }
        .btn-primary a:hover {
          background-color: #1268E8 !important;
          border-color: #1268E8 !important;
        }
      }
      </style>
    </head>
    <body class="" style="background-color: #000; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">

      <table background="https://jugend-theater.ch/images/edit/email.jpg" border="0" cellpadding="0" cellspacing="0" class="body" style="background-repeat: norepeat; background-size: cover; background-position: center;border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; height: 1024px; background-color: #f6f6f6;">
        <tr>
          <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
          <td class="container" style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; Margin: 0 auto; max-width: 580px; padding: 10px; width: 580px;">
            <div class="content" style="box-sizing: border-box; display: block; Margin: 0 auto; max-width: 580px; padding: 10px;">

              <!-- START CENTERED WHITE CONTAINER -->
              <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">Bestätigung</span>
              <table class="main" style="margin-top: 300px;border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: rgba(0,0,0,0.6); color:#fff; border-radius: 6px;">

                <!-- START MAIN CONTENT AREA -->
                <tr>
                  <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;">
                    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                      <tr>
                        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
                          <p style="font-family: sans-serif; font-size: 24px; font-weight: bold; margin: 0; Margin-bottom: 15px;">'.$msg.'</p>
                          <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; box-sizing: border-box;">
                            <tbody>
                              <tr>
                                <td align="left" style="font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;">
                                  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;">
                                    <tbody>
                                      <tr>

  </tr>
  </tbody>
  </table>
  </td>
  </tr>
  </tbody>
  </table>

  </td>
  </tr>
  </table>
  </td>
  </tr>

  <!-- END MAIN CONTENT AREA -->
  </table>



  <!-- END CENTERED WHITE CONTAINER -->
  </div>
  </td>
  <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
  </tr>
  </table>
  </body>
  </html>
';
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  $headers .= 'From: <info@jugendtheaterfestival.ch>' . "\r\n";
  $suc = mail($to, $subject, $message, $headers);
}

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
      if($fin == 1){
        jgtSendEmail($user->getProperty('Email'),"Ihre Anmeldung ist bei uns eingegangen");
      } else {
        jgtSendEmail($user->getProperty('Email'),"Ihre Anmeldung wurde gespeichert");
      }

      echo gCTSilent("Success!");
    } else {
      echo gCTSilent("Error: ") . $sql . "<br>" . $DBconn->error;
    }
  }
}
?>
