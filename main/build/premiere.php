<?php $query = "SELECT * FROM premieren WHERE ID=".$_GET['prem'];
$result = mysqli_query($DBconn, $query);
$row = mysqli_fetch_assoc($result);  // TODO: finish this page?>

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
								<h2 class="cover-text-sublead wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s"><?php echo $row['Beschrieb'] ?></h2>
                <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s"><a href="../" class="btn btn-primary btn-outline btn-lg">Zurück zur Auswhl</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>



			<div class="fh5co-counter-style-2" style="background-image: url(../images/full_2.jpg);" data-stellar-background-ratio="0.5">
			<div class="fh5co-overlay"></div>
			<div class="container">
				<div class="fh5co-section-content-wrap">
					<div class="fh5co-section-content">
						<div class="row">
							<div class="col-md-4 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
								<div class="icon">
									<i class="fa fa-calendar" aria-hidden="true"></i>
								</div>
								<span class="fh5co-counter js-counter" data-from="0" data-to="28" data-speed="4000" data-refresh-interval="40"></span>
								<span class="fh5co-counter-label">Tage bis zur Premiere</span>

							</div>
							<div class="col-md-4 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
								<div class="icon">
									<i class="fa fa-map-marker" aria-hidden="true"></i>
								</div>
								<span class="fh5co-counter"><?php echo $row['Ort']; ?></span>
								<span class="fh5co-counter-label">Ort</span>
							</div>
							<div class="col-md-4 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s">
								<div class="icon">
									<i class="fa fa-user" aria-hidden="true"></i>
								</div>
								<span class="fh5co-counter js-counter" data-from="0" data-to="62" data-speed="4000" data-refresh-interval="40"></span>
								<span class="fh5co-counter-label">Spieler</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
