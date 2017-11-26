<?php function umlautFix($s){
  $s = str_replace("Ã¤","ä",$s);
  $s = str_replace("Ã„","Ä",$s);
  $s = str_replace("Ã¶","ö",$s);
  $s = str_replace("Ã–","Ö",$s);
  $s = str_replace("Ã¼","ü",$s);
  $s = str_replace("Ãœ","Ü",$s);
  $s = str_replace("ÃŸ","ß",$s);
  return $s;
} ?>
<?php $allowEdit = false; $superuser=false; if($user->getProperty("GroupID") >= 4){ $allowEdit = true; } if($user->getProperty("GroupID") > 4){$superuser = true;} ?>
<div class="fh5co-cover fh5co-cover-style-2 js-full-height" data-stellar-background-ratio="0.5" data-next="yes"  style="background-image: url(../images/edit/back2.jpg);">
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
      <div class="col-md-5">
          <input class="form-control input-lg mt-1 modalCorr" type="text" id="UserSearch" onkeyup="SearchUser();" placeholder="Suche">
      </div>
      <div class="col-md-5">
        <select id="SearchFor" class="form-control input-lg mt-1 modalCorr" name="Suchen nach" onchange="SearchUser();">
          <option value="0">ID</option>
          <option value="1" selected>Username</option>
          <option value="2">Email</option>
          <option value="4">Registriert seit</option>
          <option value="5">Letztes Login</option>
          <option value="6">Ensemble Name</option>
          <option value="7">Stadt,Kanton</option>
          <option value="8">Rolle</option>
        </select>
      </div>
      <div class="col-md-2">
        <button type="button" onclick="addNewUser();" class="btn btn-primary btn-outline btn-black pull-right">Add User</button>
      </div>
    </div>
  </div>

    <div class="container">
      <div class="row">
        <table class="table table-hover table-striped modalCorr" id="UserTable">
          <thead>
            <tr>
              <th class="clickable text-center" onclick="sortTable(0)">ID</th>
              <th class="clickable text-center" onclick="sortTable(1)">Username</th>
              <th class="clickable text-center" onclick="sortTable(2)">Email</th>
              <th class="clickable text-center" onclick="sortTable(3)">Aktiviert</th>
              <th class="clickable text-center" onclick="sortTable(4)">Registriert seit</th>
              <th class="clickable text-center" onclick="sortTable(5)">Letztes Login</th>
              <th class="clickable text-center" onclick="sortTable(6)">Ensemble Name</th>
              <th class="clickable text-center" onclick="sortTable(7)">Stadt,Kanton</th>
              <th class="clickable text-center" onclick="sortTable(8)">Rolle</th>
              <th class="clickable text-center" onclick="sortTable(9)">Bearbeiten</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php $tour = 0; $result = mysqli_query($DBconn, "SELECT * FROM Users");
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)): $tour++;?>
            <?php if($row["GroupID"] == 5){continue;}?>
              <tr>
                <td scope="row"><?php echo $row["ID"]; ?></td>
                <td><?php echo umlautFix($row["Username"]); ?></td>
                <td><?php echo $row["Email"]; ?></td>
                <td><?php if($row["Activated"]){ echo '<i class="fa fa-check" aria-hidden="true"></i>';} else { echo '<i class="fa fa-times" aria-hidden="true"></i>';} ?></td>
                <td><?php echo date("d.m.y",$row["RegDate"]); ?></td>
                <td><?php echo date("d.m.y",$row["LastLogin"]); ?></td>
                <td><?php echo umlautFix($row["EnsembleName"]); ?></td>
                <td><?php echo umlautFix($row["StadtKanton"]); ?></td>
                <td><?php if($row["GroupID"] < 3){ echo "User";} elseif($row["GroupID"] == 3){ echo "Moderator";} elseif($row["GroupID"] == 4){ echo "Admin";} ?></td>
                <td><button type="button" onclick="showUser(<?php echo $row["ID"] ?>);" id="premInv" class="btn btn-primary btn-outline btn-black <?php if(!$allowEdit){ echo "disabled";} else {if($row["GroupID"] == 4 && !$superuser){echo "disabled";}}?>" <?php if(!$allowEdit){ echo "disabled";} else {if($row["GroupID"] == 4 && !$superuser){echo "disabled";}}?>>Bearbeiten</button></td>
              </tr>
            <?php endwhile;?>
          </tbody>
        </table>
        <p class="wow fadeInUp col-md-12 text-center <?php if($tour != 0){echo 'invisibleStrict'; } ?>" data-wow-duration="1s" data-wow-delay=".8s">Keine User</p>
      </div>
    </div>
</div>
