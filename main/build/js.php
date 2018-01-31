<!-- jQuery -->
<script src="<?php echo $DomainUrlPath;?>/js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="<?php echo $DomainUrlPath;?>/js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="<?php echo $DomainUrlPath;?>/js/bootstrap.min.js"></script>
<!-- Waypoints -->
 <script src="<?php echo $DomainUrlPath;?>/js/jquery.waypoints.min.js"></script>
<!-- Owl Carousel -->
<script src="<?php echo $DomainUrlPath;?>/js/owl.carousel.min.js"></script>
<!-- Magnific Popup -->
<script src="<?php echo $DomainUrlPath;?>/js/jquery.magnific-popup.min.js"></script>
<!-- Stellar -->
<script src="<?php echo $DomainUrlPath;?>/js/jquery.stellar.min.js"></script>
<!-- countTo -->
<script src="<?php echo $DomainUrlPath;?>/js/jquery.countTo.js"></script>
<!-- WOW -->
<script src="<?php echo $DomainUrlPath;?>/js/wow.min.js"></script>
<!-- Dropzone -->
<script src="<?php echo $DomainUrlPath;?>/js/dropzone.js"></script>
<!-- Animated Dropdown -->
<script src="<?php echo $DomainUrlPath;?>/js/bootstrap-dropdownhover.min.js"></script>
<!-- Init -->
<script>
  new WOW().init();
</script>


<script>
var UserIDforJS = <?php if($loggedIn) { echo $user->getProperty('ID'); } else { echo -1; }?>
</script>

<!-- Main -->
<script src="<?php echo $DomainUrlPath;?>/js/main.js"></script>
<!-- Custom -->
<script src="<?php echo $DomainUrlPath;?>/js/custom.js"></script>
<script src="<?php echo $DomainUrlPath;?>/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo $DomainUrlPath;?>/js/datetimepicker.js"></script>
<?php
if($loc == "profile"){
  echo '<script src="'.$DomainUrlPath.'/js/profile.js"></script>';
  echo '<script src="'.$DomainUrlPath.'/js/jgt.js"></script>';
} elseif($loc == "settings"){
  echo '<script src="'.$DomainUrlPath.'/js/settings.js"></script>';
} elseif($loc == "home"){
  echo '<script src="'.$DomainUrlPath.'/js/premiere.js"></script>';
  echo '<script src="'.$DomainUrlPath.'/js/jgt.js"></script>';
} elseif($loc == "resetPassword"){
  echo '<script src="'.$DomainUrlPath.'/js/resetPw.js"></script>';
}

if(!$loggedIn){
  echo '<script src="'.$DomainUrlPath.'/js/topbar.js"></script>';
}
?>
