<?php

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

	function sendMsg($msg, $pos){
		$_SESSION['msg'] = $msg;
		$_SESSION['suc'] = $pos;
	}

?>


<!-- this is hidden (the dialog that shows up on pressing a button) -->
<div id="infomodal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Info <i class="fa fa-info-circle pull-right bigger-icon" aria-hidden="true"></i> </h4>
      </div>
      <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
                  <span id="infoModText"></span>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-outline btn-black pull-right" data-dismiss="modal">OK</button>
        </form>
      </div>
    </div>
  </div>
</div>
