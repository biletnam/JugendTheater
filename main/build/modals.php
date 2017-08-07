<?php if(!$loggedIn){ ?>
<!-- this is hidden (the dialog that shows up on pressing "login") -->
<div id="loginmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title modalCorr">Login <span class="modalResponse" id="loginResponse"></span></h4>
      </div>
      <form onsubmit="tryLogin();return false;">
      <div class="modal-body modalCorr">
          <div class="row">
            <div class="col-md-6 regMod">
                  <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="Username" id="logUsername" type="text" placeholder="Benutzername/Email" required>
              </div>
              <div class="col-md-6 regMod">
                  <input class="form-control input-lg mt-1 modalCorr" maxlength="100" name="Password" id="logPassword" type="password" placeholder="Passwort" required>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-outline btn-black pull-left" data-dismiss="modal">Cancel</button>
        <input type="submit" class="btn btn-success btn-outline pull-right" value="Login">
        <button type="button" class="btn btn-primary btn-outline btn-black pull-right" onclick="forgotPw();">Passwort vergessen</button>
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
        <h4 class="modal-title modalCorr">Register <span class="modalResponse" id="registerResponse"></span></h4>
      </div>
      <form onsubmit="tryRegister();return false;">
      <div class="modal-body modalCorr">
          <div class="row">
            <div class="col-md-6 regMod">
                  <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="Username" id="regUsername" type="text" placeholder="Benutzername" required>
              </div>
              <div class="col-md-6 regMod">
                  <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="Ename" id="regEname" type="text" placeholder="Ensemblename" required>
              </div>
              <div class="col-md-6 regMod">
                  <input class="form-control input-lg mt-1 modalCorr" maxlength="100" name="Password" id="regPassword" type="password" placeholder="Passwort" required>
              </div>
              <div class="col-md-6 regMod">
                  <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="City" id="regCity" type="text" placeholder="Stadt,Kanton" required>
              </div>
              <div class="col-md-6 regMod">
                  <input class="form-control input-lg mt-1 modalCorr" maxlength="100" name="Email" id="regEmail" type="email" placeholder="Email" required>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-outline btn-black pull-left" data-dismiss="modal">Cancel</button>
        <input type="submit" class="btn btn-success btn-outline pull-right" value="Register">
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
        <h4 class="modal-title modalCorr">Premiere anmelden <span class="modalResponse" id="premResponse"></span></h4>
      </div>
      <div class="modal-body modalCorr">
          <div class="row">
              <div class="col-md-6 regMod dz-fancy" onclick="openChooser();">
                <form action="" class="dropzone" id="my-dz">
                  <div class="dz-message" id="my-dz-msg">Bild hochladen</div>
                </form>
              </div>
              <form onsubmit="tryPremiere();return false;">
              <div class="col-md-6 regMod">
                    <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="premProduktion" id="premProduktion" type="text" placeholder="Name Produktion" required>
                </div>
                <div class="col-md-6 regMod">
                    <input class="form-control input-lg mt-1 modalCorr" name="premDate" id="premDate" type="datetime-local" placeholder="Datum Premiere" required>
                </div>
                <div class="col-md-6 regMod">
                    <input class="form-control input-lg mt-1 modalCorr modSpace" maxlength="50" name="premOrt" id="premOrt" type="text" placeholder="Aufführungort" required>
                </div>

                <div class="col-md-12 regMod" id="newAufDiv">
                  <div class="form-control input-lg addDate clickable text-center" onclick="newAuf();">
                    Weitere Aufführung
                  </div>
                </div>

                <div class="col-md-12 regMod">
                    <textarea class="form-control input-lg mt-1 modalCorr" maxlength="500" name="premSpieler" id="premSpieler" type="text" placeholder="Spieler (kommagetrennt)" required></textarea>
                </div>
                <div class="col-md-12 regMod">
                  <textarea class="form-control input-lg mt-1 modalCorr beschriebArea" maxlength="500" id="premTA" name="premTA" placeholder="Stückbeschrieb" required></textarea>
                </div>
                <div class="col-md-12 regMod">
                    <input class="form-control input-lg mt-1 modalCorr" maxlength="1000" name="premVid" id="premVid" type="url" placeholder="Youtube-Link">
                </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-outline btn-black pull-left" data-dismiss="modal">Cancel</button>
        <input type="submit" class="btn btn-success btn-outline pull-right" value="Anmelden">
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
        <h4 class="modal-title modalCorr">Für das Festival bewerben <span class="modalResponse" id="jgtResponse">* zwingend ausfüllen</span></h4>
      </div>
      <div class="modal-body modalCorr">
          <div class="row">
            <form id="jgtForm" onsubmit="tryJgt();return false;">
              <div class="col-md-12 regMod text-center">
                <h4 class="modal-title modalCorr">Zum Stück</h4>
              </div>
              <div class="col-md-6 regMod">
                <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="jgtTitel" id="jgtTitel" type="text" placeholder="*Titel der Produktion" required>
              </div>

              <div class="col-md-6 regMod">
                <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="jgtUntertitel" id="jgtUntertitel" type="text" placeholder="Untertitel der Produktion">
              </div>

              <div class="col-md-4 regMod text-center">
                *Datum/Uhrzeit
              </div>

              <div class="col-md-4 regMod text-center">
                *Ort
              </div>

              <div class="col-md-4 regMod text-center">
                *Dauer(gesamt)
              </div>
              <div class="col-md-4 regMod">
                <input class="form-control input-lg mt-1 modalCorr" name="jgtDate" id="jgtDate" type="datetime-local" placeholder="*Datum Premiere" required>
              </div>

              <div class="col-md-4 regMod">
                <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="jgtOrt" id="jgtOrt" type="text" placeholder="*Ort" required>
              </div>

              <div class="col-md-4 regMod">
                <input class="form-control input-lg mt-1 modalCorr" name="jgtDauer" id="jgtDauer" type="time" placeholder="*Dauer (gesamt)" required>
              </div>

              <div class="col-md-4 regMod">
                <div class="checkbox">
                  <label>
                    <input id="actCheck" type="checkbox" value="">
                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                    <span>*Pause<span>
                  </label>
                </div>
              </div>

              <div class="col-md-4 regMod">
                <input class="form-control input-lg mt-1 modalCorr" max="18" name="jgtAlter" id="jgtAlter" type="number" placeholder="*Altersfreigabe" required>
              </div>

              <div class="col-md-4 regMod">
                <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="jgtSprachen" id="jgtSprachen" type="text" placeholder="*Sprachen" required>
              </div>
              <div class="col-md-12 regMod20">
                Falls die Aufführung auf Texten Dritter basiert bzw. Textpassagen Dritter enthält, bitte Angaben zum Urheberrecht (Name der Autorin/des Autors, ggf. des Verlags):
              </div>
              <div class="col-md-12 regMod">
                <input class="form-control input-lg mt-1 modalCorr" maxlength="100" name="jgtCC" id="jgtCC" type="text" placeholder="Urheber">
              </div>


              <div class="col-md-12 regModTitle text-center">
                <h4 class="modal-title modalCorr">Zum Ensemble</h4>
              </div>

              <div class="col-md-6 regMod">
                <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="jgtEnsembleName" id="jgtEnsembleName" type="text" placeholder="*Name des Ensembles" required value="">
              </div>

              <div class="col-md-6 regMod">
                <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="jgtEnsembleCity" id="jgtEnsembleCity" type="text" placeholder="*Herkunft des Ensembles" required value="">
              </div>
              <div class="col-md-6 regMod">
                <input class="form-control input-lg mt-1 modalCorr" name="jgtPlayer" id="jgtPlayer" type="number" placeholder="*Anzahl SpielerInnen" required>
              </div>

              <div class="col-md-6 regMod">
                <input class="form-control input-lg mt-1 modalCorr" name="jgtNonPlayer" id="jgtNonPlayer" type="number" placeholder="*Anzahl weitere beteiligte Personen (SpielleiterInnen, TechnikerInnen, Maske, usw.)" required>
              </div>

              <div class="col-md-6 regMod FormTextAlign">
                *Alter aller SpielerInnen:
              </div>

              <div class="col-md-3 regMod">
                <input class="form-control input-lg mt-1 modalCorr" name="jgtAgeFrom" id="jgtAgeFrom" type="number" placeholder="von...Jahren" required>
              </div>

              <div class="col-md-3 regMod">
                <input class="form-control input-lg mt-1 modalCorr" name="jgtAgeTo" id="jgtAgeTo" type="number" placeholder="bis...Jahren" required>
              </div>

              <div class="col-md-6 regMod FormTextAlign">
                davon jünger als 13 Jahre:
              </div>

              <div class="col-md-3 regMod">
                <input class="form-control input-lg mt-1 modalCorr" name="jgtAge13W" id="jgtAge13W" type="number" placeholder="Weiblich">
              </div>

              <div class="col-md-3 regMod">
                <input class="form-control input-lg mt-1 modalCorr" name="jgtAge13M" id="jgtAge13M" type="number" placeholder="Männlich">
              </div>

              <div class="col-md-6 regMod FormTextAlign">
                davon 14-17 Jahre:
              </div>

              <div class="col-md-3 regMod">
                <input class="form-control input-lg mt-1 modalCorr" name="jgtAge14W" id="jgtAge14W" type="number" placeholder="Weiblich">
              </div>

              <div class="col-md-3 regMod">
                <input class="form-control input-lg mt-1 modalCorr" name="jgtAge14M" id="jgtAge14M" type="number" placeholder="Männlich">
              </div>

              <div class="col-md-6 regMod FormTextAlign">
                davon 18-20 Jahre:
              </div>

              <div class="col-md-3 regMod">
                <input class="form-control input-lg mt-1 modalCorr" name="jgtAge18W" id="jgtAge18W" type="number" placeholder="Weiblich">
              </div>

              <div class="col-md-3 regMod">
                <input class="form-control input-lg mt-1 modalCorr" name="jgtAge18M" id="jgtAge18M" type="number" placeholder="Männlich">
              </div>

              <div class="col-md-6 regMod FormTextAlign">
                davon älter als 21 Jahre:
              </div>

              <div class="col-md-3 regMod">
                <input class="form-control input-lg mt-1 modalCorr" name="jgtAge21W" id="jgtAge21W" type="number" placeholder="Weiblich">
              </div>

              <div class="col-md-3 regMod">
                <input class="form-control input-lg mt-1 modalCorr" name="jgtAge21M" id="jgtAge21M" type="number" placeholder="Männlich">
              </div>

              <div class="col-md-6 regMod">
                <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="jgtSpielleitung" id="jgtSpielleitung" type="text" placeholder="*Name der Spielleitung" required>
              </div>

              <div class="col-md-6 regMod">
                <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="jgtAdress" id="jgtAdress" type="text" placeholder="*Adresse" required>
              </div>

              <div class="col-md-6 regMod">
                <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="jgtTele" id="jgtTele" type="tel" placeholder="*Telefonnummer" required>
              </div>

              <div class="col-md-6 regMod">
                <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="jgtEmail" id="jgtEmail" type="email" placeholder="*Email" required>
              </div>

              <div class="col-md-12 regMod">
                <input class="form-control input-lg mt-1 modalCorr" maxlength="100" name="jgtInfo" id="jgtInfo" type="text" placeholder="Weitere Infos zum Ensemble (Zusammensetzung, Arbeitsweise/-bedingungen)">
              </div>


              <div class="col-md-12 regModTitle text-center">
                <h4 class="modal-title modalCorr">Zur Trägerschaft</h4>
              </div>
              <div class="col-md-6 regMod">
                <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="jgtTrager" id="jgtTrager" type="text" placeholder="*Name Trägerinstitution(Theater,Verein,Schule...)" required>
              </div>

              <div class="col-md-6 regMod">
                <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="jgtTragerAdress" id="jgtTragerAdress" type="text" placeholder="*Adresse" required>
              </div>

              <div class="col-md-6 regMod">
                <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="jgtTragerTele" id="jgtTragerTele" type="tel" placeholder="*Telefonnummer" required>
              </div>

              <div class="col-md-6 regMod">
                <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="jgtTragerEmail" id="jgtTragerEmail" type="email" placeholder="*Email" required>
              </div>

              <div class="col-md-12 regMod">
                <input class="form-control input-lg mt-1 modalCorr" maxlength="100" name="jgtTragerWebsite" id="jgtTragerWebsite" type="url" placeholder="Website">
              </div>


              <div class="col-md-12 regModTitle text-center">
                <h4 class="modal-title modalCorr">*Vom Wettbewerb haben wir erfahren durch</h4>
              </div>
              <div class="col-md-12 regMod text-center">
                Elektronische Medien
              </div>

              <div class="col-md-3 regMod">
                <div class="checkbox ">
                  <label>
                    <input id="medienInsta" type="checkbox">
                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                    Instagram
                  </label>
                </div>
              </div>

              <div class="col-md-3 regMod">
                <div class="checkbox ">
                  <label>
                    <input id="medienFlickr" type="checkbox">
                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                    Flickr
                  </label>
                </div>
              </div>

              <div class="col-md-3 regMod">
                <div class="checkbox ">
                  <label>
                    <input id="medienEmail" type="checkbox">
                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                    Email
                  </label>
                </div>
              </div>

              <div class="col-md-3 regMod">
                <div class="checkbox ">
                  <label>
                    <input id="medienFacebook" type="checkbox">
                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                    Facebook
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
                 Printmedien
              </div>

              <div class="col-md-3 regMod">
                <div class="checkbox ">
                  <label>
                    <input id="medienTagespresse" type="checkbox">
                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                    Tagespresse
                  </label>
                </div>
              </div>

              <div class="col-md-6 regMod">
                <div class="checkbox ">
                  <label>
                    <input id="medienFachzeitschrift" type="checkbox">
                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                    Artikel Fachzeitschrift
                  </label>
                </div>
              </div>

              <div class="col-md-3 regMod">
                <div class="checkbox ">
                  <label>
                    <input id="medienAnzeige" type="checkbox">
                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                    Anzeige
                  </label>
                </div>
              </div>

              <div class="col-md-6 regMod">
                <div class="checkbox ">
                  <label>
                    <input id="medienFlyer" type="checkbox">
                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                    Auschreibungsflyer
                  </label>
                </div>
              </div>

              <div class="col-md-12 regMod text-center">
                 Sonstige
              </div>

              <div class="col-md-3 regMod">
                <div class="checkbox ">
                  <label>
                    <input id="medienKollegen" type="checkbox">
                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                    KollegInnen
                  </label>
                </div>
              </div>

              <div class="col-md-3 regMod">
                <div class="checkbox ">
                  <label>
                    <input id="medienSchulverteiler" type="checkbox">
                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                    Schulverteiler
                  </label>
                </div>
              </div>

              <div class="col-md-3 regMod">
                <div class="checkbox ">
                  <label>
                    <input onclick="sonstTxtToggle();" id="medienSonstige" type="checkbox">
                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                    Sonstige
                  </label>
                </div>
              </div>

              <div class="col-md-3 regMod">
                  <input class="form-control mt-1 modalCorr" maxlength="50" name="jgtSonst" id="jgtSonst" type="text" placeholder="..." disabled>
              </div>

              <div class="col-md-12 regModTitle text-center">
                <h4 class="modal-title modalCorr">Anhänge</h4>
              </div>
              <div class="col-md-6 regMod" onclick="openChooserTech();">
                <div class="dropzone dz-clickable" id="jgtdz">
                  <div class="dz-message modalCorr" id="jgtdzmsg">Techrider</div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-12 regMod">
                      <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="jgtVid" id="jgtVid" type="url" placeholder="*Videolink" required>
                  </div>
                  <div class="col-md-12 regMod">
                      <textarea class="form-control input-lg mt-1 modalCorr beschriebArea-xm" maxlength="500" id="jgtAnVid" name="jgtAnVid" placeholder="Beschrieb zu Videolink"></textarea>
                  </div>
                </div>
              </div>
              <div class="col-md-12 regMod">
                  <textarea class="form-control input-lg mt-1 modalCorr beschriebArea-sm" maxlength="500" id="jgtBeschrieb" name="jgtBeschrieb" placeholder="*Stückbeschrieb" required></textarea>
              </div>
              <div class="col-md-12 regMod" onclick="openChooserJgt();">
                <div class="dropzone dz-clickable" id="jgtdzA">
                  <div class="dz-message modalCorr" id="jgtdzmsgA">Weitere Anhänge</div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-6 regMod">
                    <textarea class="form-control input-lg mt-1 modalCorr beschriebArea-xs" maxlength="500" id="jgtAnInfo" name="jgtAnInfo" placeholder="Weitere Informationen zur Produktion"></textarea>
                  </div>
                  <div class="col-md-6 regMod">
                      <textarea class="form-control input-lg mt-1 modalCorr beschriebArea-xs" maxlength="500" id="jgtAnBe" name="jgtAnBe" placeholder="Beschrieb weitere Anhänge"></textarea>
                  </div>
                </div>
              </div>


              <div class="col-md-8 regModTitle2">
                <div class="checkbox ">
                  <label>
                    <input onclick="tbClick();" id="teilnahmebedingungen" type="checkbox">
                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                    *Ich habe die <a href="../?loc=teilnahmebedingungen" target="_blank">Teilnahmebedingungen</a> gelesen
                  </label>
                </div>
              </div>
              <div class="col-md-4 regMod regModTitle">
                <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="jgtSign" id="jgtSign" type="text" placeholder="*Ort, Datum" required>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-outline btn-black pull-left" data-dismiss="modal">Cancel</button>
        <input id="jgtSubmitBtn" type="submit" class="btn btn-success btn-outline pull-right" value="Bewerben" disabled>
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
        <h4 class="modal-title modalCorr">Premiere bearbeiten <span class="modalResponse" id="premResponseEdit"></span></h4>
      </div>
      <div class="modal-body modalCorr">
          <div class="row">
            <div class="col-md-12">
              <div class="col-md-6 regMod" onclick="openChooserEdit();">
                <form action="" class="dropzone" id="my-dz-Edit">
                  <div class="dz-message modalCorr" id="my-dz-msg-Edit">Bild hochladen</div>
                </form>
              </div>
              <div class="col-md-6 regMod">
                <form onsubmit="updatePrem();return false;">
                    <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="premProduktion" id="premProduktionEdit" type="text" placeholder="Name Produktion" required>
                </div>
                <div class="col-md-6 regMod">
                    <input class="form-control input-lg mt-1 modalCorr" name="premDate" id="premDateEdit" type="datetime-local" placeholder="Datum Premiere" required>
                </div>
                <div class="col-md-6 regMod">
                    <input class="form-control input-lg mt-1 modalCorr modSpace" maxlength="50" name="premOrt" id="premOrtEdit" type="text" placeholder="Aufführungort" required>
                </div>

                <div class="col-md-12 regMod" id="newAufDivEdit">
                  <div class="form-control input-lg addDate clickable text-center" onclick="newAufEdit();">
                    Weitere Aufführung
                  </div>
                </div>

                <div class="col-md-12 regMod">
                    <textarea class="form-control input-lg mt-1 modalCorr" maxlength="500" name="premSpieler" id="premSpielerEdit" type="text" placeholder="Spieler (kommagetrennt)" required></textarea>
                </div>
                <div class="col-md-12 regMod">
                  <textarea class="form-control input-lg mt-1 modalCorr beschriebArea" maxlength="500" id="premTAEdit" name="premTA" placeholder="Stückbeschrieb" required></textarea>
                </div>
                <div class="col-md-12 regMod">
                    <input class="form-control input-lg mt-1 modalCorr" maxlength="1000" name="premVid" id="premVidEdit" type="url" placeholder="Youtube-Link" required>
                </div>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-outline btn-black pull-left" data-dismiss="modal">Cancel</button>
        <input type="submit" id="premChange" class="btn btn-success btn-outline pull-right disabled" value="Ändern" disabled>
          <button type="button" id="premDel" class="btn btn-danger btn-outline pull-right disabled" data-toggle="modal" data-target="#deletemodal" disabled>Löschen</button>
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
        <h4 class="modal-title modalCorr">Sicher? <span class="modalResponse" id="premResponseDel"></span></h4>
      </div>
      <div class="modal-body modalCorr">
          <div class="row">
            <div class="col-md-12 regMod">
                  Bist du sicher, dass du <span id="deleteName"></span> löschen willst?
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-outline btn-black pull-left" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger btn-outline pull-right" onclick="delPrem();">Löschen</button>
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
        <h4 class="modal-title modalCorr">Info <i class="fa fa-info-circle pull-right bigger-icon" aria-hidden="true"></i> </h4>
      </div>
      <div class="modal-body modalCorr">
          <div class="row">
            <div class="col-md-12 regMod">
                  <span class="modalCorr" id="infoModText"></span>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-outline btn-black pull-right" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>
