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
<!-- Init -->
<script>
  new WOW().init();
</script>
<!-- Main -->
<script src="../js/main.js"></script>
<!-- Custom -->
<script src="js/custom.js"></script>
<script src="<?php echo $DomainUrlPath;?>/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo $DomainUrlPath;?>/js/datetimepicker.js"></script>

<?php if($loc == "premieren"){ ?>
<script src="js/premieren.js"></script>
<?php } if($loc == "user"){?>
<script src="js/user.js"></script>
<?php } if($loc == "anmeldungen"){?>
<script src="js/anmeldungen.js"></script>
<?php } if($loc == "content"){?>
<script src="js/content.js"></script>
<?php } if($loc == "bilder"){?>
<script src="js/bilder.js"></script>
<?php } ?>
