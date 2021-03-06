<div class="fh5co-cover fh5co-cover-style-2 js-full-height" data-stellar-background-ratio="0.5" data-next="yes"  style="background-image: url(images/edit/kontakt.jpg);">
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
            <h1 class="cover-text-lead wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">Profile</h1>
            <h2 class="cover-text-sublead wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">Hier kannst du deine Premieren verwalten</h2>
            <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s"><a onclick="openJgt();" class="btn btn-primary btn-outline btn-lg">Für das Jugendtheater-Festival Schweiz bewerben</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="fh5co-project-style-2">
  <div class="container">
    <div class="row p-b">
      <div class="col-md-6 col-md-offset-3 text-center">
        <h2 class="fh5co-heading wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">Premieren</h2>
        <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">Hier findest du deine Premieren</p>
        <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s"><a onclick="openPremiere();" class="btn btn-primary btn-outline btn-lg btn-black">Meine Premiere anmelden</a></p>
      </div>
    </div>
  </div>

  <div class="fh5co-projects">
    <div id="premiere-container" class="container">
    <div class="row">
    <ul id="profPrems">

      <?php $tour = 0; $result = mysqli_query($DBconn, "SELECT * FROM premieren WHERE UserID=".$user->getProperty("ID"));
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)): $tour++;?>
      <li class="wow fadeInUp col-md-4" style="background-image: url(../uploads/small/<?php  echo $row['ID'].$row['Bilder']; ?>);" data-wow-duration="1s" data-wow-delay=".8s" data-stellar-background-ratio="0.5" id="premNr<?php echo $row['ID'];?>">
        <a  href="#" onclick="showPremEditModal(<?php echo $row['ID'] ?>);event.preventDefault();">
          <div class="fh5co-overlay"></div>
            <div class="fh5co-text">
              <div class="fh5co-text-inner">
                  <div class="text-center"><h3 id="premTxtNr<?php echo $row['ID'];?>"><?php echo $row['Produktion']; ?></h3></div>
              </div>
            </div>
        </a>
      </li>

    <?php endwhile;?>
    </ul>
    <p id="noPremtxt" class="wow fadeInUp col-md-12 text-center <?php if($tour != 0){echo 'invisibleStrict'; } ?>" data-wow-duration="1s" data-wow-delay=".8s">Du hast noch keine Premieren angemeldet</p>
  </div>
</div>
</div>
</div>
