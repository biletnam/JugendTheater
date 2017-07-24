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
                    <input class="form-control input-lg mt-1 modalCorr" maxlength="500" name="premSpieler" id="premSpielerEdit" type="text" placeholder="Spieler (kommagetrennt)" required>
                </div>
                <div class="col-md-6 regMod">
                    <input class="form-control input-lg mt-1 modalCorr" name="premDate" id="premDateEdit" type="datetime-local" placeholder="Datum Premiere" required>
                </div>
                <div class="col-md-6 regMod">
                    <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="premOrt" id="premOrtEdit" type="text" placeholder="Aufführungort" required>
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
