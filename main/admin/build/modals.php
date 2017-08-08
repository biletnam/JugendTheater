<?php
$allowEdit = false;
if($loggedIn){
  if($user->getProperty("GroupID") >= 4){ $allowEdit = true; }
}
 ?>
<!-- this is hidden (the dialog that shows up on pressing a button) -->
<div id="premEditmodal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header modalCorr">
        <h4 class="modal-title modalCorr">Premiere bearbeiten <span class="modalResponse" id="premResponseEdit"></span></h4>
      </div>
      <div class="modal-body modalCorr">
          <div class="row">
            <div class="col-md-12">
              <div class="col-md-6 regMod dz-fancy">
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
                  <textarea class="form-control input-lg mt-1 modalCorr" maxlength="500" id="premTAEdit" name="premTA" placeholder="Stückbeschrieb" required></textarea>
                </div>
                <div class="col-md-12 regMod">
                    <input class="form-control input-lg mt-1 modalCorr" maxlength="1000" name="premVid" id="premVidEdit" type="url" placeholder="Youtube-Link" required>
                </div>
                <div class="col-md-12 regMod dz-fancy">
                  <div class="dropzone dz-clickable" id="premDzAnEdit">
                    <div class="dz-message" id="premDzAnMsgEdit">Anhänge</div>
                  </div>
                </div>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-outline btn-black pull-left" data-dismiss="modal">Cancel</button>
        <button type="button" onclick="changeActivation(1);" id="premGrant" class="btn btn-danger btn-outline pull-right disabled" disabled>Aktivieren</button>
        <input type="submit" id="premChange" class="btn btn-success btn-outline pull-right disabled" value="Ändern" disabled>
        <button type="button" onclick="changeActivation(2);" id="premInv" class="btn btn-danger btn-outline pull-right disabled" disabled>Ablehnen</button>
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

<!-- this is hidden (the dialog that shows up on pressing a button)-->
<div id="delAllModal" class="modal fade bootbox" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header modalCorr">
        <h4 class="modal-title modalCorr">Sicher? <span class="modalResponse" id="delAllRes"></span></h4>
      </div>
      <div class="modal-body modalCorr">
          <div class="row">
            <div class="col-md-12 regMod">
                  Bist du sicher, dass du alle Anmeldungen löschen willst?
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-outline btn-black pull-left" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger btn-outline pull-right" onclick="premDelAll();">Löschen</button>
      </div>
    </div>
  </div>
</div>


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

<!-- this is hidden (the dialog that shows up on pressing a button)-->
<div id="deleteUsermodal" class="modal fade bootbox" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header modalCorr">
        <h4 class="modal-title modalCorr">Sicher? <span class="modalResponse" id="premResponseDelUser"></span></h4>
      </div>
      <div class="modal-body modalCorr">
          <div class="row">
            <div class="col-md-12 regMod">
                  Bist du sicher, dass du <span id="deleteUserName"></span> löschen willst?
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-outline btn-black pull-left" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger btn-outline pull-right" onclick="delUser();">Löschen</button>
      </div>
    </div>
  </div>
</div>


<div id="usermodal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title modalCorr">User bearbeiten <span class="modalResponse" id="UserResponse"></span></h4>
      </div>
      <div class="modal-body modalCorr">
          <div class="row">
            <div class="col-md-6 regMod">
                  <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="Username" id="Username" type="text" placeholder="Benutzername" required>
              </div>
              <div class="col-md-6 regMod">
                  <input class="form-control input-lg mt-1 modalCorr" maxlength="100" name="Email" id="UserEmail" type="email" placeholder="Email" required>
              </div>
              <div class="col-md-6 regMod">
                  <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="EnsemleName" id="UserEnsemleName" type="text" placeholder="EnsemleName" required>
              </div>
              <div class="col-md-6 regMod">
                  <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="StadtKanton" id="UserStadtKanton" type="text" placeholder="Stadt,Kanton" required>
              </div>
              <div class="col-md-6 regMod">
                  <select id="UserGroup" class="form-control input-lg mt-1 modalCorr" name="Rolle">
                    <option id="UserModalUser" value="1">User</option>
                    <option id="UserModalModerator" value="3">Moderator</option>
                    <option id="UserModalAdmin" value="4">Admin</option>
                  </select>
              </div>
              <div class="col-md-6 regMod">
                <div class="checkbox">
                  <label>
                    <input id="actCheck" type="checkbox" value="">
                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                    <span>Aktiviert<span>
                  </label>
                </div>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-outline btn-black pull-left" data-dismiss="modal">Cancel</button>
        <button  onclick="changeUser();" type="button" class="btn btn-success btn-outline pull-right">Ändern</button>
        <button type="button" class="btn btn-danger btn-outline pull-right" data-toggle="modal" data-target="#deleteUsermodal">Löschen</button>
      </div>
    </div>
  </div>
</div>

<div id="jgtmodal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content" id="jgtModalContent">
      <div class="modal-header modalCorr">
        <h4 class="modal-title modalCorr">Anmeldung <span class="modalResponse" id="jgtResponse"></span></h4>
      </div>
      <div class="modal-body modalCorr">
          <div class="row">
              <div class="col-md-12 regMod text-center">
                <h4 class="modal-title modalCorr">Zum Stück</h4>
              </div>
              <form>
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
                *Dauer (gesamt)
              </div>
              <div class="col-md-4 regMod">
                <input class="form-control input-lg mt-1 modalCorr" name="jgtDate" id="jgtDate" type="datetime-local" placeholder="*Datum Premiere" required>
              </div>

              <div class="col-md-4 regMod">
                <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="jgtOrt" id="jgtOrt" type="text" placeholder="*Ort" required>
              </div>

              <div class="col-md-4 regMod">
                <input class="form-control input-lg mt-1 modalCorr" name="jgtDauer" id="jgtDauer" type="number" placeholder="*Dauer (in Minuten)" required>
              </div>

              <div class="col-md-12 regMod" id="newAufDivJgt">
                <div class="form-control input-lg addDate clickable text-center" onclick="newAufJgt();">
                  Weitere Aufführung
                </div>
              </div>
              
              <div class="col-md-4 regMod">
                <div class="checkbox">
                  <label>
                    <input id="actCheck" type="checkbox" value="">
                    <span id="actCheck2" class="cr"><i class="cr-icon fa fa-check"></i></span>
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
                <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="jgtEnsembleName" id="jgtEnsembleName" type="text" placeholder="*Name des Ensembles" required>
              </div>

              <div class="col-md-6 regMod">
                <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="jgtEnsembleCity" id="jgtEnsembleCity" type="text" placeholder="*Herkunft des Ensembles" required>
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
                <input class="form-control input-lg mt-1 modalCorr" name="jgtAge13W" id="jgtAge13W" type="number" placeholder="Weiblich" required>
              </div>

              <div class="col-md-3 regMod">
                <input class="form-control input-lg mt-1 modalCorr" name="jgtAge13M" id="jgtAge13M" type="number" placeholder="Männlich" required>
              </div>

              <div class="col-md-6 regMod FormTextAlign">
                davon 14-17 Jahre:
              </div>

              <div class="col-md-3 regMod">
                <input class="form-control input-lg mt-1 modalCorr" name="jgtAge14W" id="jgtAge14W" type="number" placeholder="Weiblich" required>
              </div>

              <div class="col-md-3 regMod">
                <input class="form-control input-lg mt-1 modalCorr" name="jgtAge14M" id="jgtAge14M" type="number" placeholder="Männlich" required>
              </div>

              <div class="col-md-6 regMod FormTextAlign">
                davon 18-20 Jahre:
              </div>

              <div class="col-md-3 regMod">
                <input class="form-control input-lg mt-1 modalCorr" name="jgtAge18W" id="jgtAge18W" type="number" placeholder="Weiblich" required>
              </div>

              <div class="col-md-3 regMod">
                <input class="form-control input-lg mt-1 modalCorr" name="jgtAge18M" id="jgtAge18M" type="number" placeholder="Männlich" required>
              </div>

              <div class="col-md-6 regMod FormTextAlign">
                davon älter als 21 Jahre:
              </div>

              <div class="col-md-3 regMod">
                <input class="form-control input-lg mt-1 modalCorr" name="jgtAge21W" id="jgtAge21W" type="number" placeholder="Weiblich" required>
              </div>

              <div class="col-md-3 regMod">
                <input class="form-control input-lg mt-1 modalCorr" name="jgtAge21M" id="jgtAge21M" type="number" placeholder="Männlich" required>
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
                    <span id="medienInsta2" class="cr"><i class="cr-icon fa fa-check"></i></span>
                    Instagram
                  </label>
                </div>
              </div>

              <div class="col-md-3 regMod">
                <div class="checkbox ">
                  <label>
                    <input id="medienFlickr" type="checkbox">
                    <span id="medienFlickr2" class="cr"><i class="cr-icon fa fa-check"></i></span>
                    Flickr
                  </label>
                </div>
              </div>

              <div class="col-md-3 regMod">
                <div class="checkbox ">
                  <label>
                    <input id="medienEmail" type="checkbox">
                    <span id="medienEmail2" class="cr"><i class="cr-icon fa fa-check"></i></span>
                    Email
                  </label>
                </div>
              </div>

              <div class="col-md-3 regMod">
                <div class="checkbox ">
                  <label>
                    <input id="medienFacebook" type="checkbox">
                    <span id="medienFacebook2" class="cr"><i class="cr-icon fa fa-check"></i></span>
                    Facebook
                  </label>
                </div>
              </div>

              <div class="col-md-12 regMod">
                <div class="checkbox ">
                  <label>
                    <input id="medienWebsite" type="checkbox">
                    <span id="medienWebsite2" class="cr"><i class="cr-icon fa fa-check"></i></span>
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
                    <span id="medienTagespresse2" class="cr"><i class="cr-icon fa fa-check"></i></span>
                    Tagespresse
                  </label>
                </div>
              </div>

              <div class="col-md-6 regMod">
                <div class="checkbox ">
                  <label>
                    <input id="medienFachzeitschrift" type="checkbox">
                    <span id="medienFachzeitschrift2" class="cr"><i class="cr-icon fa fa-check"></i></span>
                    Artikel Fachzeitschrift
                  </label>
                </div>
              </div>

              <div class="col-md-3 regMod">
                <div class="checkbox ">
                  <label>
                    <input id="medienAnzeige" type="checkbox">
                    <span id="medienAnzeige2" class="cr"><i class="cr-icon fa fa-check"></i></span>
                    Anzeige
                  </label>
                </div>
              </div>

              <div class="col-md-6 regMod">
                <div class="checkbox ">
                  <label>
                    <input id="medienFlyer" type="checkbox">
                    <span id="medienFlyer2" class="cr"><i class="cr-icon fa fa-check"></i></span>
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
                    <span id="medienKollegen2" class="cr"><i class="cr-icon fa fa-check"></i></span>
                    KollegInnen
                  </label>
                </div>
              </div>

              <div class="col-md-3 regMod">
                <div class="checkbox ">
                  <label>
                    <input id="medienSchulverteiler" type="checkbox">
                    <span id="medienSchulverteiler2" class="cr"><i class="cr-icon fa fa-check"></i></span>
                    Schulverteiler
                  </label>
                </div>
              </div>

              <div class="col-md-3 regMod">
                <div class="checkbox ">
                  <label>
                    <input id="medienSonstige" type="checkbox">
                    <span id="medienSonstige2" class="cr"><i class="cr-icon fa fa-check"></i></span>
                    Sonstige
                  </label>
                </div>
              </div>

              <div class="col-md-3 regMod">
                  <input class="form-control mt-1 modalCorr" maxlength="50" name="jgtSonst" id="jgtSonst" type="text" placeholder="...">
              </div>

              <div class="col-md-12 regModTitle text-center">
                <h4 class="modal-title modalCorr">Anhänge</h4>
              </div>
              <div class="col-md-6 regMod">
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
              <div class="col-md-12 regMod">
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
                    <input id="teilnahmebedingungen" type="checkbox">
                    <span id="teilnahmebedingungen2" class="cr"><i class="cr-icon fa fa-check"></i></span>
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
        <button  onclick="changeJgt();" type="button" class="btn btn-success btn-outline pull-right"<?php if(!$allowEdit){echo 'disabled';} ?>>Ändern</button>
        <button type="button" class="btn btn-danger btn-outline pull-right" data-toggle="modal" data-target="#deleteJgtmodal" <?php if(!$allowEdit){echo 'disabled';} ?>>Löschen</button>
      </form>
      </div>
    </div>
  </div>
</div>

<!-- this is hidden (the dialog that shows up on pressing a button)-->
<div id="deleteJgtmodal" class="modal fade bootbox" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header modalCorr">
        <h4 class="modal-title modalCorr">Sicher? <span class="modalResponse" id="jgtResponseDel"></span></h4>
      </div>
      <div class="modal-body modalCorr">
          <div class="row">
            <div class="col-md-12 regMod">
                  Bist du sicher, dass du <span id="deleteJgt"></span> löschen willst?
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-outline btn-black pull-left" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger btn-outline pull-right" onclick="delJgt();">Löschen</button>
      </div>
    </div>
  </div>
</div>
