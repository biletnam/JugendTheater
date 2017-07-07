<nav class="fh5co-nav-style-1" role="navigation" data-offcanvass-position="fh5co-offcanvass-left">
  <div class="container">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 fh5co-logo">
      <a href="#" class="js-fh5co-mobile-toggle fh5co-nav-toggle"><i></i></a>
      <a href="#">Jugend-Theater</a>
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
          if($user->getProperty("Username") != "Guess"){
		          echo '<li id="userIcon"><a href="#" class="call-to-action"><i class="fa fa-user bigger-icon" aria-hidden="true"></i></a></li>';
          } else {
            echo '
              <li id="loginBtn"><a href="#" data-toggle="modal" data-target="#loginmodal">Login</a></li>
              <li id="registerBtn"><a href="#" data-toggle="modal" data-target="#registermodal" class="call-to-action">Register</a></li>
              <li class="invisible" id="userIcon"><a href="#" class="call-to-action"><i class="fa fa-user bigger-icon" aria-hidden="true"></i></a></li>';
          }
        ?>

      </ul>
    </div>
  </div>
</nav>
