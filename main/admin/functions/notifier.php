<?php
function sendMsg($msg, $pos){
  $_SESSION['msg'] = $msg;
  $_SESSION['suc'] = $pos;
}

function checkMsg(){
	if(isset($_SESSION['suc'])){
		echo '<script>
		$(window).load(function(){
			$("#infoModText").html("'.$_SESSION['msg'].'");
			$("#infomodal").modal("show");
		});
		</script>';
		unset($_SESSION['msg']);
		unset($_SESSION['suc']);
	}
}

function clearMsg(){
  unset($_SESSION['msg']);
  unset($_SESSION['suc']);
}
?>
