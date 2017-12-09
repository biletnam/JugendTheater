<?php if(!$loggedIn){ ?>
<!-- this is hidden (the dialog that shows up on pressing "login") -->
<div id="loginmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title modalCorr"><?php gCT("Login");?> <span class="modalResponse" id="loginResponse"></span></h4>
      </div>
      <form onsubmit="tryLogin();return false;">
      <div class="modal-body modalCorr">
          <div class="row">
            <div class="col-md-6 regMod">
                  <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="Username" id="logUsername" type="text" placeholder="<?php gCT("Benutzername/Email");?>" required>
              </div>
              <div class="col-md-6 regMod">
                  <input class="form-control input-lg mt-1 modalCorr" maxlength="100" name="Password" id="logPassword" type="password" placeholder="<?php gCT("Passwort");?>" required>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-outline btn-black pull-left" data-dismiss="modal"><?php gCT("Cancel");?></button>
        <input type="submit" class="btn btn-success btn-outline pull-right" value="<?php gCT("Login");?>">
        <button type="button" class="btn btn-primary btn-outline btn-black pull-right" onclick="forgotPw();"><?php gCT("Passwort vergessen");?></button>
        </form>
      </div>
    </div>
  </div>
</div>



<!-- this is hidden (the dialog that shows up on pressing a button) -->
<div id="registermodal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header modalCorr">
        <h4 class="modal-title modalCorr"><?php gCT("Register");?> <span class="modalResponse" id="registerResponse"><?php gCT("* zwingend ausfüllen"); ?></span></h4>
      </div>
      <form onsubmit="tryRegister();return false;">
      <div class="modal-body modalCorr">
          <div class="row">
            <div class="col-md-6 regMod">
                  <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="Username" id="regUsername" type="text" placeholder="<?php gCT("Benutzername");?>*" required>
              </div>
              <div class="col-md-6 regMod">
                  <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="Ename" id="regEname" type="text" placeholder="<?php gCT("Ensemblename");?>">
              </div>
              <div class="col-md-6 regMod">
                  <input class="form-control input-lg mt-1 modalCorr" maxlength="100" name="Password" id="regPassword" type="password" placeholder="<?php gCT("Passwort");?>*" required>
              </div>
              <div class="col-md-6 regMod">
                  <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="City" id="regCity" type="text" placeholder="<?php gCT("Stadt,Kanton");?>">
              </div>
              <div class="col-md-6 regMod">
                  <input class="form-control input-lg mt-1 modalCorr" maxlength="100" name="Email" id="regEmail" type="email" placeholder="<?php gCT("Email");?>*" required>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-outline btn-black pull-left" data-dismiss="modal"><?php gCT("Cancel");?></button>
        <input type="submit" class="btn btn-success btn-outline pull-right" value="<?php gCT("Register");?>">
        </form>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<?php if($loc == "home" || $loc == "profile"){  ?>
<!-- this is hidden (the dialog that shows up on pressing a button) -->
<div id="premieremodal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header modalCorr">
        <h4 class="modal-title modalCorr"><?php gCT("Premiere anmelden");?> <span class="modalResponse" id="premResponse"></span></h4>
      </div>
      <div class="modal-body modalCorr">
          <div class="row">
              <div class="col-md-6 regMod dz-fancy" onclick="openChooser();">
                <form action="" class="dropzone" id="my-dz">
                  <div class="dz-message" id="my-dz-msg"><?php gCT("Bild hochladen");?></div>
                </form>
              </div>
              <form onsubmit="tryPremiere();return false;">
              <div class="col-md-6 regMod">
                    <input class="form-control input-lg mt-1 modalCorr easyDisablerFix" maxlength="50" name="premProduktion" id="premProduktion" type="text" placeholder="<?php gCT("Name Produktion");?>" required disabled>
                </div>
                <div class="col-md-6 regMod">
                  <!-- NOTE: Fixed Datepicker, Required not working somehow -->
                    <div class="form-control input-lg mt-1 modalCorr input-append date form_datetime">
                      <input placeholder="<?php gCT("Datum Premiere");?>" class="noBorder" id="premDate" type="text" value="" readonly required>
                      <span class="add-on"><i class="fa fa-calendar"></i></span>
                    </div>
                </div>
                <div class="col-md-6 regMod">
                    <input class="form-control input-lg mt-1 modalCorr modSpace easyDisablerFix" maxlength="50" name="premOrt" id="premOrt" type="text" placeholder="<?php gCT("Aufführungort");?>" required disabled>
                </div>

                <div class="col-md-12 regMod" id="newAufDiv">
                  <div class="form-control input-lg addDate clickable text-center easyDisablerFix" onclick="newAuf();" disabled>
                    <?php gCT("Weitere Aufführung");?>
                  </div>
                </div>

                <div class="col-md-12 regMod">
                    <textarea class="form-control input-lg mt-1 modalCorr easyDisablerFix" maxlength="1000" name="premSpieler" id="premSpieler" type="text" disabled placeholder="<?php gCT("Spieler (kommagetrennt)");?>" required></textarea>
                </div>
                <div class="col-md-12 regMod">
                  <textarea class="form-control input-lg mt-1 modalCorr beschriebArea easyDisablerFix" maxlength="1000" id="premTA" name="premTA" disabled placeholder="<?php gCT("Stückbeschrieb");?>" required></textarea>
                </div>
                <div class="col-md-12 regMod">
                    <input class="form-control input-lg mt-1 modalCorr easyDisablerFix" disabled maxlength="1000" name="premVid" id="premVid" type="url" placeholder="<?php gCT("Youtube-Link");?>">
                </div>
                <div class="col-md-12 regMod dz-fancy easyDisablerFix" onclick="openChooserPremAn();" disabled>
                  <div class="dropzone dz-clickable" id="premDzAn">
                    <div class="dz-message" id="premDzAnMsg"><?php gCT("Anhänge");?></div>
                  </div>
                </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-outline btn-black pull-left" data-dismiss="modal"><?php gCT("Cancel");?></button>
        <input type="submit" class="btn btn-success btn-outline pull-right" value="<?php gCT("Anmelden");?>">
        </form>
      </div>
    </div>
  </div>
</div>

<!-- this is hidden (the dialog that shows up on pressing a button) -->
<div id="jgtmodal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content" id="jgtModalContent">
      <div class="modal-header modalCorr">
        <h4 class="modal-title modalCorr"><?php gCT("Für das Festival bewerben");?> <span class="modalResponse" id="jgtResponse">
          <?php if($loggedIn){$query = "SELECT ID FROM anmeldungen WHERE UserID=".$user->getProperty('ID');if ($result=mysqli_query($DBconn,$query)){if(mysqli_num_rows($result) > 0){gCT("Du hast dich bereits angemeldet.");} else {
          gCT("* zwingend ausfüllen");}}}
            ?>

        </span></h4>
      </div>
      <div class="modal-body modalCorr">
          <div class="row">
            <form id="jgtForm" onsubmit="tryJgt();return false;">
              <div class="col-md-12 regMod text-center">
                <h4 class="modal-title modalCorr"><?php gCT("Zum Stück");?></h4>
              </div>
              <div class="col-md-6 regMod">
                <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="jgtTitel" id="jgtTitel" type="text" placeholder="<?php gCT("*Titel der Produktion");?>" required>
              </div>

              <div class="col-md-6 regMod">
                <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="jgtUntertitel" id="jgtUntertitel" type="text" placeholder="<?php gCT("Untertitel der Produktion");?>">
              </div>

              <div class="col-md-4 regMod text-center">
                <?php gCT("*Datum/Uhrzeit");?>
              </div>

              <div class="col-md-4 regMod text-center">
                <?php gCT("*Ort");?>
              </div>

              <div class="col-md-4 regMod text-center">
                <?php gCT("*Dauer (gesamt)");?>
              </div>
              <div class="col-md-4 regMod">
                <div class="form-control input-lg mt-1 modalCorr input-append date form_datetime">
                  <input placeholder="<?php gCT("*Datum Premiere");?>" class="noBorder" id="jgtDate" type="text" value="" readonly required>
                  <span class="add-on"><i class="fa fa-calendar"></i></span>
                </div>
              </div>

              <div class="col-md-4 regMod">
                <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="jgtOrt" id="jgtOrt" type="text" placeholder="<?php gCT("*Ort");?>" required>
              </div>

              <div class="col-md-4 regMod">
                <input class="form-control input-lg mt-1 modalCorr" name="jgtDauer" id="jgtDauer" type="number" placeholder="<?php gCT("*Dauer (in Minuten)");?>" required>
              </div>

              <div class="col-md-12 regMod" id="newAufDivJgt">
                <div class="form-control input-lg addDate clickable text-center" onclick="newAufJgt();">
                  <?php gCT("Weitere Aufführung");?>
                </div>
              </div>

              <div class="col-md-4 regMod">
                <div class="checkbox">
                  <label>
                    <input id="actCheck" type="checkbox" value="">
                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                    <span><?php gCT("*Pause");?><span>
                  </label>
                </div>
              </div>

              <div class="col-md-4 regMod">
                <input class="form-control input-lg mt-1 modalCorr" max="18" name="jgtAlter" id="jgtAlter" type="number" placeholder="<?php gCT("*Altersfreigabe");?>" required>
              </div>

              <div class="col-md-4 regMod">
                <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="jgtSprachen" id="jgtSprachen" type="text" placeholder="<?php gCT("*Sprachen");?>" required>
              </div>
              <div class="col-md-12 regMod20">
                <?php gCT("Falls die Aufführung auf Texten Dritter basiert bzw. Textpassagen Dritter enthält, bitte Angaben zum Urheberrecht (Name der Autorin/des Autors, ggf. des Verlags):");?>"
              </div>
              <div class="col-md-12 regMod">
                <input class="form-control input-lg mt-1 modalCorr" maxlength="100" name="jgtCC" id="jgtCC" type="text" placeholder="<?php gCT("Urheber");?>">
              </div>


              <div class="col-md-12 regModTitle text-center">
                <h4 class="modal-title modalCorr"><?php gCT("Zum Ensemble");?></h4>
              </div>

              <div class="col-md-6 regMod">
                <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="jgtEnsembleName" id="jgtEnsembleName" type="text" placeholder="<?php gCT("*Name des Ensembles");?>" required value="">
              </div>

              <div class="col-md-6 regMod">
                <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="jgtEnsembleCity" id="jgtEnsembleCity" type="text" placeholder="<?php gCT("*Herkunft des Ensembles");?>" required value="">
              </div>
              <div class="col-md-6 regMod">
                <input class="form-control input-lg mt-1 modalCorr" name="jgtPlayer" id="jgtPlayer" type="number" placeholder="<?php gCT("*Anzahl SpielerInnen");?>" required>
              </div>

              <div class="col-md-6 regMod">
                <input class="form-control input-lg mt-1 modalCorr" name="jgtNonPlayer" id="jgtNonPlayer" type="number" placeholder="<?php gCT("*Anzahl weitere beteiligte Personen (SpielleiterInnen, TechnikerInnen, Maske, usw.)");?>" required>
              </div>

              <div class="col-md-6 regMod FormTextAlign">
                <?php gCT("*Alter aller SpielerInnen:");?>
              </div>

              <div class="col-md-3 regMod">
                <input class="form-control input-lg mt-1 modalCorr" name="jgtAgeFrom" id="jgtAgeFrom" type="number" placeholder="<?php gCT("von...Jahren");?>" required>
              </div>

              <div class="col-md-3 regMod">
                <input class="form-control input-lg mt-1 modalCorr" name="jgtAgeTo" id="jgtAgeTo" type="number" placeholder="<?php gCT("bis...Jahren");?>" required>
              </div>

              <div class="col-md-6 regMod FormTextAlign">
                <?php gCT("davon jünger als 13 Jahre:");?>
              </div>

              <div class="col-md-3 regMod">
                <input class="form-control input-lg mt-1 modalCorr" name="jgtAge13W" id="jgtAge13W" type="number" placeholder="<?php gCT("Weiblich");?>">
              </div>

              <div class="col-md-3 regMod">
                <input class="form-control input-lg mt-1 modalCorr" name="jgtAge13M" id="jgtAge13M" type="number" placeholder="<?php gCT("Männlich");?>">
              </div>

              <div class="col-md-6 regMod FormTextAlign">
                <?php gCT("davon 14-17 Jahre:");?>
              </div>

              <div class="col-md-3 regMod">
                <input class="form-control input-lg mt-1 modalCorr" name="jgtAge14W" id="jgtAge14W" type="number" placeholder="<?php gCT("Weiblich");?>">
              </div>

              <div class="col-md-3 regMod">
                <input class="form-control input-lg mt-1 modalCorr" name="jgtAge14M" id="jgtAge14M" type="number" placeholder="<?php gCT("Männlich");?>">
              </div>

              <div class="col-md-6 regMod FormTextAlign">
                <?php gCT("davon 18-20 Jahre:");?>
              </div>

              <div class="col-md-3 regMod">
                <input class="form-control input-lg mt-1 modalCorr" name="jgtAge18W" id="jgtAge18W" type="number" placeholder="<?php gCT("Weiblich");?>">
              </div>

              <div class="col-md-3 regMod">
                <input class="form-control input-lg mt-1 modalCorr" name="jgtAge18M" id="jgtAge18M" type="number" placeholder="<?php gCT("Männlich");?>">
              </div>

              <div class="col-md-6 regMod FormTextAlign">
                <?php gCT("davon älter als 21 Jahre:");?>
              </div>

              <div class="col-md-3 regMod">
                <input class="form-control input-lg mt-1 modalCorr" name="jgtAge21W" id="jgtAge21W" type="number" placeholder="<?php gCT("Weiblich");?>">
              </div>

              <div class="col-md-3 regMod">
                <input class="form-control input-lg mt-1 modalCorr" name="jgtAge21M" id="jgtAge21M" type="number" placeholder="<?php gCT("Männlich");?>">
              </div>

              <div class="col-md-6 regMod">
                <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="jgtSpielleitung" id="jgtSpielleitung" type="text" placeholder="<?php gCT("*Name der Spielleitung");?>" required>
              </div>

              <div class="col-md-6 regMod">
                <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="jgtAdress" id="jgtAdress" type="text" placeholder="<?php gCT("*Adresse");?>" required>
              </div>

              <div class="col-md-6 regMod">
                <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="jgtTele" id="jgtTele" type="tel" placeholder="<?php gCT("*Telefonnummer (079 132 89 76)");?>" required>
              </div>

              <div class="col-md-6 regMod">
                <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="jgtEmail" id="jgtEmail" type="email" placeholder="<?php gCT("*Email");?>" required>
              </div>

              <div class="col-md-12 regMod">
                <input class="form-control input-lg mt-1 modalCorr" maxlength="100" name="jgtInfo" id="jgtInfo" type="text" placeholder="<?php gCT("Weitere Infos zum Ensemble (Zusammensetzung, Arbeitsweise/-bedingungen)");?>">
              </div>


              <div class="col-md-12 regModTitle text-center">
                <h4 class="modal-title modalCorr"><?php gCT("Zur Trägerschaft");?></h4>
              </div>
              <div class="col-md-6 regMod">
                <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="jgtTrager" id="jgtTrager" type="text" placeholder="<?php gCT("*Name Trägerinstitution(Theater,Verein,Schule...)");?>" required>
              </div>

              <div class="col-md-6 regMod">
                <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="jgtTragerAdress" id="jgtTragerAdress" type="text" placeholder="<?php gCT("*Adresse");?>" required>
              </div>

              <div class="col-md-6 regMod">
                <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="jgtTragerTele" id="jgtTragerTele" type="tel" placeholder="<?php gCT("*Telefonnummer (079 132 89 76)");?>" required>
              </div>

              <div class="col-md-6 regMod">
                <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="jgtTragerEmail" id="jgtTragerEmail" type="email" placeholder="<?php gCT("*Email");?>" required>
              </div>

              <div class="col-md-12 regMod">
                <input class="form-control input-lg mt-1 modalCorr" maxlength="100" name="jgtTragerWebsite" id="jgtTragerWebsite" type="url" placeholder="<?php gCT("Website");?>">
              </div>


              <div class="col-md-12 regModTitle text-center">
                <h4 class="modal-title modalCorr"><?php gCT("*Vom Wettbewerb haben wir erfahren durch");?></h4>
              </div>
              <div class="col-md-12 regMod text-center">
                <?php gCT("Elektronische Medien");?>
              </div>

              <div class="col-md-3 regMod">
                <div class="checkbox ">
                  <label>
                    <input id="medienInsta" type="checkbox">
                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                    <?php gCT("Instagram");?>
                  </label>
                </div>
              </div>

              <div class="col-md-3 regMod">
                <div class="checkbox ">
                  <label>
                    <input id="medienFlickr" type="checkbox">
                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                    <?php gCT("Flickr");?>
                  </label>
                </div>
              </div>

              <div class="col-md-3 regMod">
                <div class="checkbox ">
                  <label>
                    <input id="medienEmail" type="checkbox">
                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                    <?php gCT("Email");?>
                  </label>
                </div>
              </div>

              <div class="col-md-3 regMod">
                <div class="checkbox ">
                  <label>
                    <input id="medienFacebook" type="checkbox">
                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                    <?php gCT("Facebook");?>
                  </label>
                </div>
              </div>

              <div class="col-md-12 regMod">
                <div class="checkbox ">
                  <label>
                    <input id="medienWebsite" type="checkbox">
                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                    www.jugendtheaterfestival.ch
                  </label>
                </div>
              </div>

              <div class="col-md-12 regMod text-center">
                 <?php gCT("Printmedien");?>
              </div>

              <div class="col-md-3 regMod">
                <div class="checkbox ">
                  <label>
                    <input id="medienTagespresse" type="checkbox">
                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                    <?php gCT("Tagespresse");?>
                  </label>
                </div>
              </div>

              <div class="col-md-6 regMod">
                <div class="checkbox ">
                  <label>
                    <input id="medienFachzeitschrift" type="checkbox">
                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                    <?php gCT("Artikel Fachzeitschrift");?>
                  </label>
                </div>
              </div>

              <div class="col-md-3 regMod">
                <div class="checkbox ">
                  <label>
                    <input id="medienAnzeige" type="checkbox">
                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                    <?php gCT("Anzeige");?>
                  </label>
                </div>
              </div>

              <div class="col-md-6 regMod">
                <div class="checkbox ">
                  <label>
                    <input id="medienFlyer" type="checkbox">
                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                    <?php gCT("Auschreibungsflyer");?>
                  </label>
                </div>
              </div>

              <div class="col-md-12 regMod text-center">
                 <?php gCT("Sonstige");?>
              </div>

              <div class="col-md-3 regMod">
                <div class="checkbox ">
                  <label>
                    <input id="medienKollegen" type="checkbox">
                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                    <?php gCT("KollegInnen");?>
                  </label>
                </div>
              </div>

              <div class="col-md-3 regMod">
                <div class="checkbox ">
                  <label>
                    <input id="medienSchulverteiler" type="checkbox">
                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                    <?php gCT("Schulverteiler");?>
                  </label>
                </div>
              </div>

              <div class="col-md-3 regMod">
                <div class="checkbox ">
                  <label>
                    <input onclick="sonstTxtToggle();" id="medienSonstige" type="checkbox">
                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                    <?php gCT("Sonstige");?>
                  </label>
                </div>
              </div>

              <div class="col-md-3 regMod">
                  <input class="form-control mt-1 modalCorr" maxlength="50" name="jgtSonst" id="jgtSonst" type="text" placeholder="..." disabled>
              </div>

              <div class="col-md-12 regModTitle text-center">
                <h4 class="modal-title modalCorr"><?php gCT("Anhänge");?></h4>
              </div>
              <div class="col-md-6 regMod dz-fancy" onclick="openChooserTech();">
                <div class="dropzone dz-clickable" id="jgtdz">
                  <div class="dz-message" id="jgtdzmsg"><?php gCT("Techrider (PDF)");?></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-12 regMod">
                      <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="jgtVid" id="jgtVid" type="url" placeholder="<?php gCT("Videolink");?>">
                  </div>
                  <div class="col-md-12 regMod">
                      <textarea class="form-control input-lg mt-1 modalCorr beschriebArea-xm" maxlength="500" id="jgtAnVid" name="jgtAnVid" placeholder="<?php gCT("Beschrieb zu Videolink");?>"></textarea>
                  </div>
                </div>
              </div>
              <div class="col-md-12 regMod">
                  <textarea class="form-control input-lg mt-1 modalCorr beschriebArea-sm" maxlength="500" id="jgtBeschrieb" name="jgtBeschrieb" placeholder="<?php gCT("*Stückbeschrieb");?>" required></textarea>
              </div>
              <div class="col-md-12 regMod dz-fancy" onclick="openChooserJgt();">
                <div class="dropzone dz-clickable" id="jgtdzA">
                  <div class="dz-message" id="jgtdzmsgA"><?php gCT("Weitere Anhänge");?></div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-6 regMod">
                    <textarea class="form-control input-lg mt-1 modalCorr beschriebArea-xs" maxlength="500" id="jgtAnInfo" name="jgtAnInfo" placeholder="<?php gCT("Weitere Informationen zur Produktion");?>"></textarea>
                  </div>
                  <div class="col-md-6 regMod">
                      <textarea class="form-control input-lg mt-1 modalCorr beschriebArea-xs" maxlength="500" id="jgtAnBe" name="jgtAnBe" placeholder="<?php gCT("Beschrieb weitere Anhänge");?>"></textarea>
                  </div>
                </div>
              </div>


              <div class="col-md-8 regModTitle2">
                <div class="checkbox ">
                  <label>
                    <input onclick="tbClick();" id="teilnahmebedingungen" type="checkbox">
                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                    <?php gCT('*Ich habe die <a href="../?loc=teilnahmebedingungen" target="_blank">Teilnahmebedingungen</a> gelesen');?>
                  </label>
                </div>
              </div>
              <div class="col-md-4 regMod regModTitle">
                <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="jgtSign" id="jgtSign" type="text" placeholder="<?php gCT("*Ort, Datum");?>" required>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-outline btn-black pull-left" data-dismiss="modal"><?php gCT("Cancel");?></button>

        <?php if($loggedIn){
          $query = "SELECT final FROM anmeldungen WHERE UserID=".$user->getProperty('ID');
          $result = mysqli_query($DBconn, $query);
          $row = mysqli_fetch_assoc($result);
          if($row['final'] == 0){
          ?>

          <input id="jgtSubmitBtn" type="submit" class="btn btn-primary btn-outline btn-black pull-left" value="<?php gCT("Speichern");?>">

          <button id="realSubBtn" type="button" class="btn btn-success btn-outline pull-right" disabled onclick="realSubBtnClick();"><?php gCT("Bewerben");?></button>

          <?php }} ?>
        </form>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<?php if($loc == "profile"){  ?>
<!-- this is hidden (the dialog that shows up on pressing a button) -->
<div id="premEditmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header modalCorr">
        <h4 class="modal-title modalCorr"><?php gCT("Premiere bearbeiten");?> <span class="modalResponse" id="premResponseEdit"></span></h4>
      </div>
      <div class="modal-body modalCorr">
          <div class="row">
            <div class="col-md-12">
              <div class="col-md-6 regMod dz-fancy" onclick="openChooserEdit();">
                <form action="" class="dropzone" id="my-dz-Edit">
                  <div class="dz-message modalCorr" id="my-dz-msg-Edit"><?php gCT("Bild hochladen");?></div>
                </form>
              </div>
                <form onsubmit="updatePrem();return false;">
              <div class="col-md-6 regMod">
                    <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="premProduktion" id="premProduktionEdit" type="text" placeholder="<?php gCT("Name Produktion");?>" required>
                </div>
                <div class="col-md-6 regMod">

                  <div class="form-control input-lg mt-1 modalCorr input-append date form_datetime">
                    <input placeholder="<?php gCT("Datum Premiere");?>" class="noBorder" id="premDateEdit" type="text" value="" readonly required>
                    <span class="add-on"><i class="fa fa-calendar"></i></span>
                  </div>
                  
                </div>
                <div class="col-md-6 regMod">
                    <input class="form-control input-lg mt-1 modalCorr modSpace" maxlength="50" name="premOrt" id="premOrtEdit" type="text" placeholder="<?php gCT("Aufführungort");?>" required>
                </div>

                <div class="col-md-12 regMod" id="newAufDivEdit">
                  <div class="form-control input-lg addDate clickable text-center" onclick="newAufEdit();">
                    <?php gCT("Weitere Aufführung");?>
                  </div>
                </div>

                <div class="col-md-12 regMod">
                    <textarea class="form-control input-lg mt-1 modalCorr" maxlength="500" name="premSpieler" id="premSpielerEdit" type="text" placeholder="<?php gCT("Spieler (kommagetrennt)");?>" required></textarea>
                </div>
                <div class="col-md-12 regMod">
                  <textarea class="form-control input-lg mt-1 modalCorr beschriebArea" maxlength="500" id="premTAEdit" name="premTA" placeholder="<?php gCT("Stückbeschrieb");?>" required></textarea>
                </div>
                <div class="col-md-12 regMod">
                    <input class="form-control input-lg mt-1 modalCorr" maxlength="1000" name="premVid" id="premVidEdit" type="url" placeholder="<?php gCT("Youtube-Link");?>">
                </div>
                <div class="col-md-12 regMod dz-fancy" onclick="openChooserPremAnEdit();">
                  <div class="dropzone dz-clickable" id="premDzAnEdit">
                    <div class="dz-message" id="premDzAnMsgEdit"><?php gCT("Anhänge");?></div>
                  </div>
                </div>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-outline btn-black pull-left" data-dismiss="modal"><?php gCT("Cancel");?></button>
        <input type="submit" id="premChange" class="btn btn-success btn-outline pull-right disabled" value="<?php gCT("Ändern");?>" disabled>
          <button type="button" id="premDel" class="btn btn-danger btn-outline pull-right disabled" data-toggle="modal" data-target="#deletemodal" disabled><?php gCT("Löschen");?></button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- this is hidden (the dialog that shows up on pressing a button)-->
<div id="deletemodal" class="modal fade bootbox" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header modalCorr">
        <h4 class="modal-title modalCorr"><?php gCT("Sicher?");?>" <span class="modalResponse" id="premResponseDel"></span></h4>
      </div>
      <div class="modal-body modalCorr">
          <div class="row">
            <div class="col-md-12 regMod">
                  <?php gCT('Bist du sicher, dass du <span id="deleteName"></span> löschen willst?');?>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-outline btn-black pull-left" data-dismiss="modal"><?php gCT("Cancel");?></button>
        <button type="button" class="btn btn-danger btn-outline pull-right" onclick="delPrem();"><?php gCT("Löschen");?></button>
      </div>
    </div>
  </div>
</div>
<?php } ?>


<!-- this is hidden (the dialog that shows up on pressing a button) -->
<div id="infomodal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header modalCorr">
        <h4 class="modal-title modalCorr"><?php gCT("Info");?> <i class="fa fa-info-circle pull-right bigger-icon" aria-hidden="true"></i> </h4>
      </div>
      <div class="modal-body modalCorr">
          <div class="row">
            <div class="col-md-12 regMod">
                  <span class="modalCorr" id="infoModText"></span>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-outline btn-black pull-right" data-dismiss="modal"><?php gCT("OK");?></button>
      </div>
    </div>
  </div>
</div>
