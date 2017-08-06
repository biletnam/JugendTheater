<div class="fh5co-cover fh5co-cover-style-2 js-full-height" data-stellar-background-ratio="0.5" data-next="yes"  style="background-image: url(../images/edit/kontakt.jpg);">
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
            <h1 class="cover-text-lead wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">Premieren</h1>
            <h2 class="cover-text-sublead wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">Hier findest du alle Premieren</h2>
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
        <h2 class="fh5co-heading" data-wow-duration="1s" data-wow-delay=".2s">Premieren</h2>
        <p class="" data-wow-duration="1s" data-wow-delay=".4s">Warten auf Aktivierung</p>
        <div class="col-md-6">
            <input class="form-control input-lg mt-1 modalCorr" type="text" id="PremSearch0" onkeyup="SearchPrem0();" placeholder="Suche">
        </div>
        <div class="col-md-6">
          <select id="SearchForPrem0" class="form-control input-lg mt-1 modalCorr" name="Suchen nach" onchange="SearchPrem0();">
            <option value="0">ID</option>
            <option value="1" selected>Username</option>
            <option value="2">Produktion</option>
            <option value="4">Datum/Zeit</option>
            <option value="5">Ort</option>
          </select>
        </div>
      </div>
    </div>
  </div>


    <div class="container">
    <div class="row">
      <table class="table table-hover table-striped modalCorr" id="PremTable0">
        <thead>
          <tr>
            <th class="clickable text-center" onclick="sortTablePrem0(0)">ID</th>
            <th class="clickable text-center" onclick="sortTablePrem0(1)">Username</th>
            <th class="clickable text-center" onclick="sortTablePrem0(2)">Produktion</th>
            <th class="clickable text-center" onclick="sortTablePrem0(3)">Datum/Zeit</th>
            <th class="clickable text-center" onclick="sortTablePrem0(4)">Ort</th>
            <th class="clickable text-center" onclick="sortTablePrem0(5)">Details</th>
          </tr>
        </thead>
        <tbody class="text-center">
          <?php $tour = 0; $result = mysqli_query($DBconn, "SELECT * FROM premieren WHERE Activation=0");
          while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)): $tour++;?>
          <?php $result2 = mysqli_query($DBconn, "SELECT Username FROM Users WHERE ID=".$row["UserID"]);
          $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC); ?>
            <tr>
              <td scope="row"><?php echo $row["ID"]; ?></td>
              <td><?php echo $row2["Username"]; ?></td>
              <td><?php echo $row["Produktion"]; ?></td>
              <td><?php echo $row["PremiereDatum"]; ?></td>
              <td><?php echo $row["Ort"]; ?></td>
              <td><button type="button" onclick="showPremEditModal(<?php echo $row["ID"] ?>);" class="btn btn-primary btn-outline btn-black">Details</button></td>
            </tr>
          <?php endwhile;?>
        </tbody>
      </table>
    <p class="col-md-12 text-center <?php if($tour != 0){echo 'invisibleStrict'; } ?>" data-wow-duration="1s" data-wow-delay=".8s">Keine Anmeldungen</p>
  </div>
</div>
</div>

<div class="fh5co-project-style-2">
  <div class="container">
    <div class="row p-b">
      <div class="col-md-6 col-md-offset-3 text-center">
        <p class="" data-wow-duration="1s" data-wow-delay=".4s">Aktiviert</p>
        <div class="col-md-6">
            <input class="form-control input-lg mt-1 modalCorr" type="text" id="PremSearch1" onkeyup="SearchPrem1();" placeholder="Suche">
        </div>
        <div class="col-md-6">
          <select id="SearchForPrem1" class="form-control input-lg mt-1 modalCorr" name="Suchen nach" onchange="SearchPrem1();">
            <option value="0">ID</option>
            <option value="1" selected>Username</option>
            <option value="2">Produktion</option>
            <option value="4">Datum/Zeit</option>
            <option value="5">Ort</option>
          </select>
        </div>
      </div>
    </div>
  </div>

  <div class="fh5co-projects">
    <div class="container">
    <div class="row">
      <table class="table table-hover table-striped modalCorr" id="PremTable1">
        <thead>
          <tr>
            <th class="clickable text-center" onclick="sortTablePrem1(0)">ID</th>
            <th class="clickable text-center" onclick="sortTablePrem1(1)">Username</th>
            <th class="clickable text-center" onclick="sortTablePrem1(2)">Produktion</th>
            <th class="clickable text-center" onclick="sortTablePrem1(3)">Datum/Zeit</th>
            <th class="clickable text-center" onclick="sortTablePrem1(4)">Ort</th>
            <th class="clickable text-center" onclick="sortTablePrem1(5)">Details</th>
          </tr>
        </thead>
        <tbody class="text-center">
          <?php $tour = 0; $result = mysqli_query($DBconn, "SELECT * FROM premieren WHERE Activation=1");
          while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)): $tour++;?>
          <?php $result2 = mysqli_query($DBconn, "SELECT Username FROM Users WHERE ID=".$row["UserID"]);
          $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC); ?>
            <tr>
              <td scope="row"><?php echo $row["ID"]; ?></td>
              <td><?php echo $row2["Username"]; ?></td>
              <td><?php echo $row["Produktion"]; ?></td>
              <td><?php echo $row["PremiereDatum"]; ?></td>
              <td><?php echo $row["Ort"]; ?></td>
              <td><button type="button" onclick="showPremEditModal(<?php echo $row["ID"] ?>);" class="btn btn-primary btn-outline btn-black">Details</button></td>
            </tr>
          <?php endwhile;?>
        </tbody>
      </table>
    <p class="col-md-12 text-center <?php if($tour != 0){echo 'invisibleStrict'; } ?>" data-wow-duration="1s" data-wow-delay=".8s">Keine Premieren aktiv</p>
  </div>
</div>
</div>
</div>

<div class="fh5co-project-style-2">
<div class="container">
  <div class="row p-b">
    <div class="col-md-6 col-md-offset-3 text-center">
      <p class="" data-wow-duration="1s" data-wow-delay=".4s">Abgelehnt</p>
      <div class="col-md-6">
          <input class="form-control input-lg mt-1 modalCorr" type="text" id="PremSearch2" onkeyup="SearchPrem2();" placeholder="Suche">
      </div>
      <div class="col-md-6">
        <select id="SearchForPrem2" class="form-control input-lg mt-1 modalCorr" name="Suchen nach" onchange="SearchPrem2();">
          <option value="0">ID</option>
          <option value="1" selected>Username</option>
          <option value="2">Produktion</option>
          <option value="4">Datum/Zeit</option>
          <option value="5">Ort</option>
        </select>
      </div>
    </div>
  </div>
</div>

<div class="fh5co-projects">
  <div class="container">
  <div class="row">
    <table class="table table-hover table-striped modalCorr" id="PremTable2">
      <thead>
        <tr>
          <th class="clickable text-center" onclick="sortTablePrem2(0)">ID</th>
          <th class="clickable text-center" onclick="sortTablePrem2(1)">Username</th>
          <th class="clickable text-center" onclick="sortTablePrem2(2)">Produktion</th>
          <th class="clickable text-center" onclick="sortTablePrem2(3)">Datum/Zeit</th>
          <th class="clickable text-center" onclick="sortTablePrem2(4)">Ort</th>
          <th class="clickable text-center" onclick="sortTablePrem2(5)">Details</th>
        </tr>
      </thead>
      <tbody class="text-center">
        <?php $tour = 0; $result = mysqli_query($DBconn, "SELECT * FROM premieren WHERE Activation=2");
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)): $tour++;?>
        <?php $result2 = mysqli_query($DBconn, "SELECT Username FROM Users WHERE ID=".$row["UserID"]);
        $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC); ?>
          <tr>
            <td scope="row"><?php echo $row["ID"]; ?></td>
            <td><?php echo $row2["Username"]; ?></td>
            <td><?php echo $row["Produktion"]; ?></td>
            <td><?php echo $row["PremiereDatum"]; ?></td>
            <td><?php echo $row["Ort"]; ?></td>
            <td><button type="button" onclick="showPremEditModal(<?php echo $row["ID"] ?>);" class="btn btn-primary btn-outline btn-black">Details</button></td>
          </tr>
        <?php endwhile;?>
      </tbody>
    </table>
  <p class="col-md-12 text-center <?php if($tour != 0){echo 'invisibleStrict'; } ?>" data-wow-duration="1s" data-wow-delay=".8s">Keine Premieren abgelehnt</p>
  </div>
  </div>
</div>
</div>
