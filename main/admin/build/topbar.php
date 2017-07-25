<nav class="fh5co-nav-style-1" role="navigation" data-offcanvass-position="fh5co-offcanvass-left">
  <div class="container">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 fh5co-logo">
      <a href="#" class="js-fh5co-mobile-toggle fh5co-nav-toggle"><i></i></a>
      <a href="?loc=home">Jugend-Theater</a>
    </div>
    <?php if($loggedIn){ ?>
    <div class="col-lg-6 col-md-5 col-sm-5 text-center fh5co-link-wrap">
      <ul data-offcanvass="yes">
        <li><a href="?loc=premieren">Premieren</a></li>
        <li><a href="?loc=anmeldungen">Festival Anmeldungen</a></li>
        <li><a href="?loc=user">User</a></li>
      </ul>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-4 text-right fh5co-link-wrap">
      <ul class="fh5co-special" data-offcanvass="yes">
        <li class="dropdown top-dd" id="userIcon">
          <a href="#" class="dropdown-toggle call-to-action" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span id="profileName"><?php if($user->getProperty("GroupID") == 4){echo "Admin";}else{echo "Moderator";} ?></span> <i class="fa fa-user" aria-hidden="true"></i> <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="../">Main-Page</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="functions/functions.php?func=logout">Logout</a></li>
            </ul>
          </li>
      </ul>
    </div>
    <?php } ?>
  </div>
</nav>
