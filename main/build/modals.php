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
                  <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="Username" id="logUsername" type="text" placeholder="Benutzername" required>
              </div>
              <div class="col-md-6 regMod">
                  <input class="form-control input-lg mt-1 modalCorr" maxlength="100" name="Password" id="logPassword" type="password" placeholder="Passwort" required>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-outline btn-black pull-left" data-dismiss="modal">Cancel</button>
        <input type="submit" class="btn btn-success btn-outline pull-right" value="Login">
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
            <div class="col-md-12 regMod">
                  <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="Username" id="regUsername" type="text" placeholder="Benutzername" required>
              </div>
              <div class="col-md-12 regMod">
                  <input class="form-control input-lg mt-1 modalCorr" maxlength="100" name="Password" id="regPassword" type="password" placeholder="Passwort" required>
              </div>
              <div class="col-md-12 regMod">
                  <input class="form-control input-lg mt-1 modalCorr" maxlength="100" name="Email" id="regEmail" type="email" placeholder="Email" required>
              </div>
              <div class="col-md-12 regMod">
                  <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="Ename" id="regEname" type="text" placeholder="Ensemblename" required>
              </div>
              <div class="col-md-12 regMod">
                  <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="City" id="regCity" type="text" placeholder="Stadt,Kanton" required>
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
        </form>
      </div>
    </div>
  </div>
</div>




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
            <div class="col-md-12">
              <div class="col-md-6 regMod">
                <form action="" class="dropzone" id="my-dz">
                  <div class="dz-message modalCorr" id="my-dz-msg">Bild hochladen</div>
                </form>
              </div>
              <div class="col-md-6 regMod">
                <form onsubmit="tryPremiere();return false;">
                    <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="premProduktion" id="premProduktion" type="text" placeholder="Name Produktion" required>
                </div>
                <div class="col-md-6 regMod">
                    <input class="form-control input-lg mt-1 modalCorr" maxlength="500" name="premSpieler" id="premSpieler" type="text" placeholder="Spieler (kommagetrennt)" required>
                </div>
                <div class="col-md-6 regMod">
                    <input class="form-control input-lg mt-1 modalCorr" name="premDate" id="premDate" type="datetime-local" placeholder="Datum Premiere" required>
                </div>
                <div class="col-md-6 regMod">
                    <input class="form-control input-lg mt-1 modalCorr" maxlength="50" name="premOrt" id="premOrt" type="text" placeholder="Aufführungort" required>
                </div>
                <div class="col-md-12 regMod">
                  <textarea class="form-control input-lg mt-1 modalCorr" maxlength="500" id="premTA" name="premTA" placeholder="Stückbeschrieb" required></textarea>
                </div>
                <div class="col-md-12 regMod">
                    <input class="form-control input-lg mt-1 modalCorr" maxlength="1000" name="premVid" id="premVid" type="url" placeholder="Youtube-Link" required>
                </div>
                <div class="col-md-12 regMod">

                </div>
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
<div id="premEditmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header modalCorr">
        <h4 class="modal-title modalCorr">Premiere anmelden <span class="modalResponse" id="premResponseEdit"></span></h4>
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
                <form onsubmit="tryPremiere();return false;">
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
        <button type="button" class="btn btn-danger btn-outline pull-left disabled" disabled>Premiere entfernen</button>
        <input type="submit" class="btn btn-success btn-outline pull-right disabled" value="Ändern" disabled>
        </form>
      </div>
    </div>
  </div>
</div>
