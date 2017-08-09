<nav class="fh5co-nav-style-1" role="navigation" data-offcanvass-position="fh5co-offcanvass-left">
  <div class="container">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 fh5co-logo">
      <a href="#" class="js-fh5co-mobile-toggle fh5co-nav-toggle"><i></i></a>
      <a href="../">Jugend-Theater</a>
    </div>
    <div class="col-lg-6 col-md-5 col-sm-5 text-center fh5co-link-wrap">
      <ul data-offcanvass="yes">
        <li><a href="../">Home</a></li>
        <li><a href="../?loc=wir">About</a></li>
        <li><a href="https://www.jugendtheaterfestival.ch/de" target="_blank">JTF Webseite</a></li>
      </ul>

    </div>
    <div class="col-lg-3 col-md-4 col-sm-4 text-right fh5co-link-wrap hidden-xs">
      <ul class="fh5co-special visible-xs" data-offcanvass="yes">
      <li class="dropdown top-dd">
        <a href="#" class="dropdown-toggle useFontStrict" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-globe" aria-hidden="true"> Sprachen</i></a>
        <ul class="dropdown-menu">
          <!-- REVIEW: Hard Coded Langs -->
            <li><a href="<?php echo $oldUrl;?>&newln=de">Deutsch</a></li>
            <li><a href="<?php echo $oldUrl;?>&newln=fr">Französisch</a></li>
            <li><a href="<?php echo $oldUrl;?>&newln=it">Italienisch</a></li>
        </ul>
      </li>
    </ul>
      <ul class="fh5co-special hidden-xs" data-offcanvass="yes">
        <?php if(!$loggedIn){ ?>
		         <li id="langDrop" class="dropdown top-dd col-md-1">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-globe" aria-hidden="true"></i></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo $oldUrl;?>&newln=de">Deutsch</a></li>
                      <li><a href="<?php echo $oldUrl;?>&newln=fr">Französisch</a></li>
                      <li><a href="<?php echo $oldUrl;?>&newln=it">Italienisch</a></li>
                  </ul>
                </li>
              <li id="loginBtn"><a href="#" data-toggle="modal" data-target="#loginmodal"></i> Login</a></li>
              <li id="registerBtn"><a href="#" data-toggle="modal" data-target="#registermodal" class="call-to-action">Register</a></li>
        <?php } ?>
        <li class="dropdown top-dd  <?php if(!$loggedIn){echo'invisible';}?>" id="userIcon">
          <a href="#" class="dropdown-toggle call-to-action" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span id="profileName"><?php echo $user->getProperty("Username"); ?></span> <i class="fa fa-user" aria-hidden="true"></i> <span class="caret"></span></a>
            <ul id="topbarMenu" class="dropdown-menu">
              <?php if($loggedIn && $user->getProperty("GroupID") >= 3){ echo '<li><a href="../admin/">Admin-Page</a></li>';} ?>
              <li><a href="../?loc=profile"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>

              <li class="dropdown">
                <a tabindex="-1" href="#" class="dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn fadeIn fadeIn fadeIn"><i class="fa fa-globe" aria-hidden="true"></i> Sprachen</a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo $oldUrl;?>&newln=de">Deutsch</a></li>
                    <li><a href="<?php echo $oldUrl;?>&newln=fr">Französisch</a></li>
                    <li><a href="<?php echo $oldUrl;?>&newln=it">Italienisch</a></li>
                </ul>
              </li>

              <li><a href="../?loc=settings"><i class="fa fa-gears" aria-hidden="true"></i> Settings</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="../functions/functions.php?func=logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
            </ul>
          </li>
      </ul>
    </div>
  </div>
</nav>
