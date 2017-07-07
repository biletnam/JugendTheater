<!-- this is hidden (the dialog that shows up on pressing "login") -->
<div id="loginmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Login <span class="modalResponse" id="loginResponse"></span></h4>
      </div>
      <form onsubmit="tryLogin();return false;">
      <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
                  <input class="form-control input-lg mt-1" name="Username" id="logUsername" type="text" placeholder="Benutzername" required>
              </div>
              <div class="col-md-6">
                  <input class="form-control input-lg mt-1" name="Password" id="logPassword" type="password" placeholder="Passwort" required>
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
      <div class="modal-header">
        <h4 class="modal-title">Register <span class="modalResponse" id="registerResponse"></span></h4>
      </div>
      <form onsubmit="tryRegister();return false;">
      <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
                  <input class="form-control input-lg mt-1" name="Username" id="regUsername" type="text" placeholder="Benutzername" required>
              </div>
              <div class="col-md-12 regMod">
                  <input class="form-control input-lg mt-1" name="Password" id="regPassword" type="password" placeholder="Passwort" required>
              </div>
              <div class="col-md-12 regMod">
                  <input class="form-control input-lg mt-1" name="Email" id="regEmail" type="email" placeholder="Email" required>
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
