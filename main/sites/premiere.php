<?php
if(isset($_GET['prem'])){
    $prem = $_GET['prem'];
}
if(empty($prem) || $prem == ""){include ('404.php');} else {
  $query = "SELECT * FROM premieren WHERE ID=".$prem;
  if (!mysqli_fetch_assoc(mysqli_query($DBconn,$query))){
        include ('404.php');
  } else {
$query = "SELECT * FROM premieren WHERE ID=".$prem;
$result = mysqli_query($DBconn, $query);
$row = mysqli_fetch_assoc($result);
function convertYoutube($string) {
    return preg_replace("/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","<iframe id=\"premVid\" class=\"embed-responsive-item\" src=\"//www.youtube.com/embed/$2\" allowfullscreen></iframe>",$string);}
?>

    <div class="fh5co-cover fh5co-cover-style-2 js-full-height" data-stellar-background-ratio="0.5" data-next="yes"  style="background-image: url(../uploads/<?php echo $row['ID'].$row['Bilder']; ?>);">
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
								<h1 class="cover-text-lead wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s"><?php echo $row['Produktion']; ?></h1>
                <!-- REVIEW: Add Info (multilang)-->
								<!--<h2 class="cover-text-sublead wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">von <?php $query2 = "SELECT * FROM Users WHERE ID=".$row['UserID'];$result2 = mysqli_query($DBconn, $query2);$row2 = mysqli_fetch_assoc($result2);echo $row2['EnsembleName'] . " aus " . $row2['StadtKanton'];?>
                  in <?php $dStart=new DateTime(date("Y-m-d"));$dEnd=new DateTime($row['PremiereDatum']);$dDiff=$dStart->diff($dEnd);echo $dDiff->days; ?> Tagen
                </h2>-->
                <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s"><a href="../" class="btn btn-primary btn-outline btn-lg"><?php gCT("Zurück zur Auswahl");?></a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

    <div class="fh5co-testimonial-style-2">
      <div class="container">
        <div class="row p-b">
          <div class="text-center">
            <h2 class="fh5co-heading wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s"><?php echo $row['Produktion']; ?></h2>
            <div class="wow fadeInUp col-md-6 gonnerverein" data-wow-duration="1s" data-wow-delay=".4s"><div class="untertitel regModTitle"><?php gCT("Beschrieb");?></div><br><?php echo $row['Beschrieb'] ?></div>
            <div class="wow fadeInUp col-md-6 gonnerverein" data-wow-duration="1s" data-wow-delay=".6s"><div class="untertitel regModTitle"><?php gCT("Gruppe");?></div><br><?php $people = explode(",",$row['Spieler']); echo $row['Spieler'];?></div>
            <?php $aD = json_decode($row['addDates']); if(count($aD)>0){?>
              <div class="wow fadeInUp col-md-12" data-wow-duration="1s" data-wow-delay=".8s"><div class="untertitel regModTitle"><?php gCT("Weitere Aufführungen");?></div><br></div>
              <div class="wow fadeInUp col-md-4 hidden-xs" data-wow-duration="1s" data-wow-delay=".8s"><?php gCT("Datum");?></div>
              <div class="wow fadeInUp col-md-4 hidden-xs" data-wow-duration="1s" data-wow-delay=".8s"><?php gCT("Ort");?></div>
              <div class="wow fadeInUp col-md-4 hidden-xs" data-wow-duration="1s" data-wow-delay=".8s"><?php gCT("Zeit");?></div>
              <?php for($i = 0; $i < count($aD)-1;$i += 2){?>
                <?php list($date,$time)=explode('T', $aD[$i]); list($year,$month,$day)=explode('-', $date);?>
                <div class="wow fadeInUp col-md-4 col-xs-12 hidden-xs" data-wow-duration="1s" data-wow-delay=".8s"><?php echo $day.".".$month.".".$year; ?></div>
                <div class="wow fadeInUp col-md-4 col-xs-12 hidden-xs" data-wow-duration="1s" data-wow-delay=".8s"><?php echo $aD[$i + 1]; ?></div>
                <div class="wow fadeInUp col-md-4 col-xs-12 hidden-xs" data-wow-duration="1s" data-wow-delay=".8s"><?php echo $time; ?></div>

                <div class="wow fadeInUp col-md-4 col-xs-12 visible-xs" data-wow-duration="1s" data-wow-delay=".8s"><?php echo $time; ?></div>
                <div class="wow fadeInUp col-md-4 col-xs-12 visible-xs" data-wow-duration="1s" data-wow-delay=".8s"><?php echo $day.".".$month.".".$year; ?></div>
                <div class="wow fadeInUp col-md-4 col-xs-12 visible-xs" data-wow-duration="1s" data-wow-delay=".8s"><?php echo $aD[$i + 1]; ?></div>
                <div class="wow fadeInUp col-md-4 col-xs-12 visible-xs"><br><br></div>
              <?php }?>
              <?php } ?>
              <div class="col-md-12 regModTitle visible-xs"></div>
            <?php if(!empty($row['Video']) && $row['Video'] != ""){ ?>
            <div class="wow fadeInUp col-md-12 regModTitle" data-wow-duration="1s" data-wow-delay="1.0s"><div class="untertitel"><?php gCT("Video");?></div><br></div>
              <div style="margin-left:15px;margin-right:15px;" class="embed-responsive embed-responsive-16by9 wow fadeInUp col-md-12 roundBorder" data-wow-duration="1s" data-wow-delay="1s">
                <?php echo convertYoutube($row['Video']); ?>
              </div>
               <?php } ?>

               <?php
               $premData = glob("uploads/".$prem."premFile_".$row2['Username']."*.*");
               if(count($premData) > 0){?>
               <div class="wow fadeInUp col-md-12" data-wow-duration="1s" data-wow-delay=".2s"><div class="untertitel regModTitle"><?php gCT("Anhänge");?></div><br></div>
               <?php foreach ($premData as $fname) { ?>
               <div class="wow fadeInUp col-md-<?php if(count($premData) == 1){echo "12";}else{echo "6";} ?>" data-wow-duration="1s" data-wow-delay=".4s">
                 <div class="dz-hide"><div class="dz-hide-sub">
                   <div class="dz-hide-img">
                     <a href="<?php echo $fname; ?>" download>
                       <img data-dz-thumbnail  src="<?php $ext = pathinfo($fname, PATHINFO_EXTENSION); if($ext == "pdf"){echo "../images/edit/pdf.png";}else{echo $fname;}?>">
                       <div class="dz-mark"><i class="fa fa-download huge-icon" aria-hidden="true"></i></div>
                     </a></div></div></div>
               </div>
               <?php } ?>
               <?php } ?>


          </div>
        </div>
  </div>
</div>

			<div class="fh5co-counter-style-2" style="background-image: url(../uploads/<?php echo $row['ID'].$row['Bilder']; ?>);" data-stellar-background-ratio="0.5">
			<div class="fh5co-overlay"></div>
			<div class="container">
				<div class="fh5co-section-content-wrap">
					<div class="fh5co-section-content">
						<div class="row">
							<div class="col-md-2 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
								<div class="icon">
									<i class="fa fa-calendar" aria-hidden="true"></i>
								</div>
                <?php list($date,$time)=explode(' ', $row['PremiereDatum']);list($year,$month,$day)=explode('-',$date); if($day  < 10){ ?>
                  <span class="fh5co-counter counter">0</span>
                <?php } ?>
								<span class="fh5co-counter js-counter counter" data-from="0" data-to="<?php echo $day;?>" data-speed="2000" data-refresh-interval="20"></span>

                <span class="fh5co-counter counter">.</span>
                <?php if($month < 10){ ?>
                <span class="fh5co-counter counter">0</span>
                <?php } ?>
                <span class="fh5co-counter js-counter counter" data-from="0" data-to="<?php echo $month;?>" data-speed="2000" data-refresh-interval="20"></span>
								<span class="fh5co-counter-label"><?php gCT("Datum");?></span>

							</div>
							<div class="col-md-8 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
								<div class="icon">
									<i class="fa fa-map-marker" aria-hidden="true"></i>
								</div>
								<span class="fh5co-counter counter" id="premOrt"><?php echo str_replace(",",",<br>",$row['Ort']); ?></span>
								<span class="fh5co-counter-label"><?php gCT("Ort");?></span>
							</div>
              <div class="col-md-2 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                <div class="icon">
                  <i class="fa fa-clock-o" aria-hidden="true"></i>
                </div>
                <?php list($hour,$min,$sec)=explode(':',$time); if($hour < 10){?>
                  <span class="fh5co-counter counter">0</span>
                <?php } ?>
                <span class="fh5co-counter js-counter counter" data-from="0" data-to="<?php echo $hour;?>" data-speed="2000" data-refresh-interval="20"></span>
                <span class="fh5co-counter counter">:</span>
                <?php if($min < 10){?>
                <span class="fh5co-counter counter">0</span>
                <?php } ?>
                <span class="fh5co-counter js-counter counter" data-from="0" data-to="<?php echo $min; ?>" data-speed="2000" data-refresh-interval="20"></span>
                <span class="fh5co-counter-label"><?php gCT("Uhrzeit");?></span>
              </div>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php }} ?>
