<nav class="fh5co-nav-style-1" role="navigation" data-offcanvass-position="fh5co-offcanvass-left">
  <div class="container">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 fh5co-logo">
      <a href="#" class="js-fh5co-mobile-toggle fh5co-nav-toggle"><i></i></a>
      <a href="../">Jugend-Theater</a>
    </div>
    <div class="col-lg-6 col-md-5 col-sm-5 text-center fh5co-link-wrap">
      <ul data-offcanvass="yes">
        <li><a href="../">Home</a></li>
      <!--  <li class="active"><a href="build/festivals.php">Festivals</a></li> -->
        <li><a href="../?loc=medien">Medien</a></li>
        <li><a href="../?loc=wir">About</a></li>
      </ul>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-4 text-right fh5co-link-wrap">
      <ul class="fh5co-special" data-offcanvass="yes">
        <?php
          if(!$loggedIn){
		          echo '<li id="loginBtn"><a href="#" data-toggle="modal" data-target="#loginmodal">Login</a></li>
                    <li id="registerBtn"><a href="#" data-toggle="modal" data-target="#registermodal" class="call-to-action">Register</a></li>';
          }
        ?>
        <li class="dropdown top-dd <?php if(!$loggedIn){echo'invisible';}?>" id="userIcon">
          <a href="#" class="dropdown-toggle call-to-action" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span id="profileName"><?php echo $user->getProperty("Username"); ?></span> <i class="fa fa-user" aria-hidden="true"></i> <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="../?loc=profile">Profile</a></li>
              <li><a href="../?loc=settings">Settings</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="../functions/functions.php?func=logout">Logout</a></li>
            </ul>
          </li>
      </ul>
    </div>
  </div>
</nav>
