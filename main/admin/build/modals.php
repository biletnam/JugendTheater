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
              <div class="col-md-6 regMod">
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
                    <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="premOrt" id="premOrtEdit" type="text" placeholder="Aufführungort" required>
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
                <div class="col-md-12 regMod">

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
                    Aktiviert
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
