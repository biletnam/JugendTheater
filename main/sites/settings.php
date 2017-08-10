<div class="fh5co-cover fh5co-cover-style-2 js-full-height" data-stellar-background-ratio="0.5" data-next="yes"  style="background-image: url(images/edit/medien.jpg);">
    <span class="scroll-btn wow fadeInUp" data-wow-duration="1s" data-wow-delay=".8s">
    <a href="#">
      <span class="mouse"><span></span></span>
    </a>
  </span>
  <div class="fh5co-overlay"></div>
  <div class="fh5co-cover-text">
    <div class="container">
      <div class="row">
        <div class="col-md-push-6 col-md-6 full-height js-full-height">
          <div class="fh5co-cover-intro">
            <h1 class="cover-text-lead wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s"><?php gCT("Settings"); ?></h1>
            <h2 class="cover-text-sublead wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s"><?php gCT("Hier kannst du deine Email-Adresse und dein Passwort ändern"); ?></h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="fh5co-project-style-2">
  <div class="container">
    <div class="row p-b">
      <div class="col-md-6 text-center mgt5">
        <h2 class="fh5co-heading wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s"><?php gCT("Ensemblenamen ändern"); ?></h2>
        <form onsubmit="tryChangeEname();return false;">
            <input class="form-control input-lg mt-1 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s" name="setName" id="setName" type="text" placeholder="<?php echo $user->getProperty("EnsembleName"); ?>" required>
            <input type="submit" class="btn btn-primary btn-outline btn-lg btn-black regMod setBtn wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s" value="<?php gCT("Change"); ?>">
        </form>
      </div>
      <div class="col-md-6 text-center mgt5">
        <h2 class="fh5co-heading wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s"><?php gCT("Stadt,Kanton ändern"); ?></h2>
        <form onsubmit="tryChangeCity();return false;">
            <input class="form-control input-lg mt-1 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s" name="setCity" id="setCity" type="text" placeholder="<?php echo $user->getProperty("StadtKanton"); ?>" required>
            <input type="submit" class="btn btn-primary btn-outline btn-lg btn-black regMod setBtn wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s" value="<?php gCT("Change"); ?>">
        </form>
      </div>
      <div class="col-md-6 text-center mgt5">
        <h2 class="fh5co-heading wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s"><?php gCT("Email ändern");?></h2>
        <form onsubmit="tryChangeEmail();return false;">
            <input class="form-control input-lg mt-1 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s" name="setMail" id="setMail" type="email" placeholder="<?php gCT("New Email");?>" required>
            <input class="form-control input-lg mt-1 regMod wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s" name="setMail2" id="setMail2" type="email" placeholder="<?php gCT("Confirm");?>" required>
            <input type="submit" class="btn btn-primary btn-outline btn-lg btn-black regMod setBtn wow fadeInUp" data-wow-duration="1s" data-wow-delay=".8s" value="<?php gCT("Change"); ?>">
        </form>
      </div>
      <div class="col-md-6 text-center mgt5">
        <h2 class="fh5co-heading wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s"><?php gCT("Password ändern");?></h2>
        <form onsubmit="tryChangePw();return false;">
            <input class="form-control input-lg mt-1 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s" name="setPw" id="setPw" type="password" placeholder="<?php gCT("New Password");?>" required>
            <input class="form-control input-lg mt-1 regMod wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s" name="setPw2" id="setPw2" type="password" placeholder="<?php gCT("Confirm");?>" required>
            <input type="submit" class="btn btn-primary btn-outline btn-lg btn-black regMod setBtn wow fadeInUp" data-wow-duration="1s" data-wow-delay=".8s" value="<?php gCT("Change");?>">
        </form>
      </div>
    </div>
  </div>
</div>
