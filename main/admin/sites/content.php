<div class="fh5co-cover fh5co-cover-style-2 js-full-height" data-stellar-background-ratio="0.5" data-next="yes"  style="background-image: url(../images/edit/medien.jpg);">
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
            <h1 class="cover-text-lead wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">Content</h1>
            <h2 class="cover-text-sublead wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">Hier findest du den Inhalt der Seite</h2>
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
        <h2 class="fh5co-heading">Content</h2>
      </div>
      <div class="col-md-6">
          <input class="form-control input-lg mt-1 modalCorr" type="text" id="ContentSearch" onkeyup="SearchContent();" placeholder="Suche">
      </div>
      <div class="col-md-6">
        <select id="SearchForContent" class="form-control input-lg mt-1 modalCorr" name="Suchen nach" onchange="SearchContent();">
          <option value="0">ID</option>
          <option value="1" selected>Standard</option>
        </select>
      </div>
    </div>
  </div>

    <div class="container">
      <div class="row">
        <table class="table table-hover table-striped modalCorr" id="ContentTable">
          <thead>
            <tr>
              <th class="clickable text-center" onclick="sortTableContent(0)">ID</th>
              <th class="clickable text-center" onclick="sortTableContent(1)">Standard</th>
              <th class="text-center"></th>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php $tour = 0; $result = mysqli_query($DBconn, "SELECT ID,std FROM content");
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)): $tour++;?>
              <tr>
                <td scope="row"><?php echo $row["ID"]; ?></td>
                <td><?php echo $row["std"]; ?></td>
                <td><button type="button" onclick="showContent(<?php echo $row["ID"] ?>);" id="contentBtn" class="btn btn-primary btn-outline btn-black">Bearbeiten</button></td>
              </tr>
            <?php endwhile;?>
          </tbody>
        </table>
      </div>
    </div>
</div>
