<?php $allowEdit = false; if($user->getProperty("GroupID") > 3){ $allowEdit = true; } ?>
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
            <h1 class="cover-text-lead wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">Bilder</h1>
            <h2 class="cover-text-sublead wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">Hier findest du die Bilder der Seite</h2>
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
        <h2 class="fh5co-heading">Bilder</h2>
      </div>
    </div>
  </div>

    <div class="container">
      <div class="row">

        <div class="col-md-3 regMod dz-fancy" onclick="openChooserBilder(1);">
          <div class="dropzone dz-clickable" id="my-back-dz-1">
            <div class="dz-message" id="my-back-dz-1-msg">Bild hochladen</div>
          </div>
        </div>

        <div class="col-md-3 regMod dz-fancy" onclick="openChooserBilder(2);">
          <div class="dropzone dz-clickable" id="my-back-dz-2">
            <div class="dz-message" id="my-back-dz-2-msg">Bild hochladen</div>
          </div>
        </div>

        <div class="col-md-3 regMod dz-fancy" onclick="openChooserBilder(3);">
          <div class="dropzone dz-clickable" id="my-back-dz-3">
            <div class="dz-message" id="my-back-dz-3-msg">Bild hochladen</div>
          </div>
        </div>

        <div class="col-md-3 regMod dz-fancy" onclick="openChooserBilder(4);">
          <div class="dropzone dz-clickable" id="my-back-dz-4">
            <div class="dz-message" id="my-back-dz-4-msg">Bild hochladen</div>
          </div>
        </div>

      </div>
    </div>
</div>
