<?php $allowEdit = false; if($user->getProperty("GroupID") == 4){ $allowEdit = true; } ?>
<div class="fh5co-cover fh5co-cover-style-2 js-full-height" data-stellar-background-ratio="0.5" data-next="yes"  style="background-image: url(../images/edit/wir.jpg);">
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
            <h1 class="cover-text-lead wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">User</h1>
            <h2 class="cover-text-sublead wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">Hier findest du alle User</h2>
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
        <h2 class="fh5co-heading">User</h2>
      </div>
    </div>
  </div>

    <div class="container">
      <div class="row">
        <table class="table table-hover modalCorr">
          <thead>
            <tr>
              <th>Username</th>
              <th>Email</th>
              <th>Letztes Login</th>
              <th>Ensemble Name</th>
              <th>Stadt,Kanton</th>
              <th>Rolle</th>
              <th>Bearbeiten</th>
            </tr>
          </thead>
          <tbody>
            <?php $tour = 0; $result = mysqli_query($DBconn, "SELECT * FROM Users");
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)): $tour++;?>
              <tr>
                <th scope="row"><?php echo $row["Username"]; ?></th>
                <td><?php echo $row["Email"]; ?></td>
                <td><?php echo date("d.m.y",$row["LastLogin"]); ?></td>
                <td><?php echo $row["EnsembleName"]; ?></td>
                <td><?php echo $row["StadtKanton"]; ?></td>
                <td><?php if($row["GroupID"] < 3){ echo "User";} elseif($row["GroupID"] == 3){ echo "Moderator";} elseif($row["GroupID"] == 4){ echo "Admin";} ?></td>
                <td><button type="button" onclick="showUser(<?php echo $row["ID"] ?>);" id="premInv" class="btn btn-primary btn-outline btn-black <?php if(!$allowEdit) echo "disabled";?>" <?php if(!$allowEdit) echo "disabled";?>>Bearbeiten</button></td>
              </tr>
            <?php endwhile;?>
          </tbody>
        </table>
        <p class="wow fadeInUp col-md-12 text-center <?php if($tour != 0){echo 'invisibleStrict'; } ?>" data-wow-duration="1s" data-wow-delay=".8s">Keine User</p>
      </div>
    </div>
</div>
