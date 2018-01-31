<div class="fh5co-cover fh5co-cover-style-2 js-full-height" data-stellar-background-ratio="0.5" data-next="yes"  style="background-image: url(../images/edit/back3.jpg);">
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
            <h1 class="cover-text-lead wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">Festival Anmeldungen</h1>
            <h2 class="cover-text-sublead wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">Hier findest du alle Festival Anmeldungen</h2>
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
        <h2 class="fh5co-heading">Festival Anmeldungen</h2>
      </div>
      <div class="col-md-6">
          <input class="form-control input-lg mt-1 modalCorr" type="text" id="JgtSearch" onkeyup="SearchJgt();" placeholder="Suche">
      </div>
      <div class="col-md-6">
        <select id="SearchForJgt" class="form-control input-lg mt-1 modalCorr" name="Suchen nach" onchange="SearchJgt();">
          <option value="0">ID</option>
          <option value="1" selected>Ensemble Name</option>
          <option value="2">Email</option>
        </select>
      </div>
    </div>
  </div>

    <div class="container">
      <div class="row">
        <table class="table table-hover table-striped modalCorr" id="jgtTable">
          <thead>
            <tr>
              <th class="clickable text-center" onclick="sortTableJgt(0)">ID</th>
              <th class="clickable text-center" onclick="sortTableJgt(1)">Ensemble Name</th>
              <th class="clickable text-center" onclick="sortTableJgt(2)">Email</th>
              <th class="clickable text-center" onclick="sortTableJgt(3)">Details</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php $tour = 0; $result = mysqli_query($DBconn, "SELECT * FROM anmeldungen WHERE final = 1");
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)): $tour++;?>
            <?php $result2 = mysqli_query($DBconn, "SELECT Email,EnsembleName FROM Users WHERE ID=".$row["UserID"]);
            $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC); ?>
              <tr>
                <td scope="row"><?php echo $row["ID"]; ?></td>
                <td><?php echo umlautFix($row2["EnsembleName"]); ?></td>
                <td><?php echo umlautFix($row2["Email"]); ?></td>
                <td><button type="button" onclick="showJgt(<?php echo $row["ID"] ?>);" id="premInv" class="btn btn-primary btn-outline btn-black">Details</button></td>
              </tr>
            <?php endwhile;?>
          </tbody>
        </table>
        <p class="wow fadeInUp col-md-12 text-center <?php if($tour != 0){echo 'invisibleStrict'; } ?>" data-wow-duration="1s" data-wow-delay=".8s">Keine Anmeldungen</p>
        <button type="button" id="premDelAll" class="btn btn-danger btn-outline col-md-3 pull-right <?php if($tour == 0){echo 'invisibleStrict'; } ?>" data-toggle="modal" data-target="#delAllModal">Alle Anmeldungen löschen</button>
      </div>
    </div>
</div>
