<?php
if(isset($_GET['hash'])){
    $hsh = $_GET['hash'];
} else {$hsh = "";}
echo '<script>var hash="'.$hsh.'"</script>'; ?>
<div class="fh5co-cover fh5co-cover-style-2 js-full-height" data-stellar-background-ratio="0.5" data-next="yes"  style="background-image: url(images/png.jpg);">
  <div class="fh5co-overlay"></div>
  <div class="fh5co-cover-text">
    <div class="container">
      <div class="row">
        <div class="col-md-push-6 col-md-6 full-height js-full-height">
          <div class="fh5co-cover-intro">
            <h1 class="cover-text-lead wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">Password ändern</h1>
            <form onsubmit="resetPw();return false;">
            <div class="col-md-6 resPw wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s">
                  <input class="form-control input-lg mt-1" maxlength="100" name="Password1" id="resPw1" type="password" placeholder="Neues Passwort" required>
              </div>
              <div class="col-md-6 resPw wow fadeInUp" data-wow-duration="1s" data-wow-delay=".8s">
                  <input class="form-control input-lg mt-1" maxlength="100" name="Password2" id="resPw2" type="password" placeholder="Passwort wiederholen" required>
              </div>
              <div class="col-md-6 resPw"></div>
              <div class="col-md-6 resPw wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
                <input id="resetPwBtn" type="submit" class="btn btn-invert btn-outline pull-right" value="Ändern">
              </div>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
