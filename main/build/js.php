<!-- jQuery -->
<script src="../js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="../js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="../js/bootstrap.min.js"></script>
<!-- Waypoints -->
 <script src="../js/jquery.waypoints.min.js"></script>
<!-- Owl Carousel -->
<script src="../js/owl.carousel.min.js"></script>
<!-- Magnific Popup -->
<script src="../js/jquery.magnific-popup.min.js"></script>
<!-- Stellar -->
<script src="../js/jquery.stellar.min.js"></script>
<!-- countTo -->
<script src="../js/jquery.countTo.js"></script>
<!-- WOW -->
<script src="../js/wow.min.js"></script>
<!-- Dropzone -->
<script src="../js/dropzone.js"></script>
<!-- Animated Dropdown -->
<script src="../js/bootstrap-dropdownhover.min.js"></script>
<!-- Init -->
<script>
  new WOW().init();
</script>
<!-- Main -->
<script src="../js/main.js"></script>
<!-- Custom -->
<script src="../js/custom.js"></script>
<?php
if($loc == "profile"){
  echo '<script src="../js/profile.js"></script>';
  echo '<script src="../js/jgt.js"></script>';
} elseif($loc == "settings"){
  echo '<script src="../js/settings.js"></script>';
} elseif($loc == "home"){
  echo '<script src="../js/premiere.js"></script>';
  echo '<script src="../js/jgt.js"></script>';
} elseif($loc == "resetPassword"){
  echo '<script src="../js/resetPw.js"></script>';
}

if(!$loggedIn){
  echo '<script src="../js/topbar.js"></script>';
}
?>
