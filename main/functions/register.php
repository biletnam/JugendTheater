<?php
function register(){
	global $user;
	global $DBconn;
  $hash = $user->register(array(
        'Username'  => gMS($_POST["us"]),
        'Password'  => gMS($_POST["pw"]),
        'Email'     => gMS($_POST["email"]),
				'StadtKanton' => gMS($_POST["city"]),
				'EnsembleName' => gMS($_POST["ename"])
  ),true);

	$msg = "";
	$suc = false;
	if(is_bool($hash) == true){
		foreach($user->log->getErrors() as $err){
            $msg = $msg . "{$err}. ";
    }
	} else {
		$to      = $_POST["email"];
		$subject = gCTSilent('Account aktivieren');
		$message = '<!doctype html>
		<html>
		  <head>
		    <meta name="viewport" content="width=device-width">
		    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		    <title>'.gCTSilent('Account aktivieren').'</title>
		    <style>
		    @media only screen and (max-width: 620px) {
		      table[class=body] h1 {
		        font-size: 28px !important;
		        margin-bottom: 10px !important;
		      }
		      table[class=body] p,
		            table[class=body] ul,
		            table[class=body] ol,
		            table[class=body] td,
		            table[class=body] span,
		            table[class=body] a {
		        font-size: 16px !important;
		      }
		      table[class=body] .wrapper,
		            table[class=body] .article {
		        padding: 10px !important;
		      }
		      table[class=body] .content {
		        padding: 0 !important;
		      }
		      table[class=body] .container {
		        padding: 0 !important;
		        width: 100% !important;
		      }
		      table[class=body] .main {
		        border-left-width: 0 !important;
		        border-radius: 0 !important;
		        border-right-width: 0 !important;
		      }
		      table[class=body] .btn table {
		        width: 100% !important;
		      }
		      table[class=body] .btn a {
		        width: 100% !important;
		      }
		      table[class=body] .img-responsive {
		        height: auto !important;
		        max-width: 100% !important;
		        width: auto !important;
		      }
		    }

		    /* -------------------------------------
		        PRESERVE THESE STYLES IN THE HEAD
		    ------------------------------------- */
		    @media all {
		      .ExternalClass {
		        width: 100%;
		      }
		      .ExternalClass,
		            .ExternalClass p,
		            .ExternalClass span,
		            .ExternalClass font,
		            .ExternalClass td,
		            .ExternalClass div {
		        line-height: 100%;
		      }
		      .apple-link a {
		        color: inherit !important;
		        font-family: inherit !important;
		        font-size: inherit !important;
		        font-weight: inherit !important;
		        line-height: inherit !important;
		        text-decoration: none !important;
		      }
		      .btn-primary table td:hover {
		        background-color: #1268E8 !important;
		      }
		      .btn-primary a:hover {
		        background-color: #1268E8 !important;
		        border-color: #1268E8 !important;
		      }
		    }
		    </style>
		  </head>
		  <body class="" style="background-color: #000; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">

		    <table background="https://jugend-theater.ch/images/edit/email.jpg" border="0" cellpadding="0" cellspacing="0" class="body" style="background-repeat: norepeat; background-size: cover; background-position: center;border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; height: 1024px; background-color: #f6f6f6;">
		      <tr>
		        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
		        <td class="container" style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; Margin: 0 auto; max-width: 580px; padding: 10px; width: 580px;">
		          <div class="content" style="box-sizing: border-box; display: block; Margin: 0 auto; max-width: 580px; padding: 10px;">

		            <!-- START CENTERED WHITE CONTAINER -->
		            <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">'.gCTSilent('Account aktivieren').'</span>
		            <table class="main" style="margin-top: 300px;border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: rgba(0,0,0,0.6); color:#fff; border-radius: 6px;">

		              <!-- START MAIN CONTENT AREA -->
		              <tr>
		                <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;">
		                  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
		                    <tr>
		                      <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
		                        <p style="font-family: sans-serif; font-size: 24px; font-weight: bold; margin: 0; Margin-bottom: 15px;">'.gCTSilent('Willkommen bei Jugend-Theater.ch').'</p>
		                        <p style="font-family: sans-serif; font-size: 24px; font-weight: normal; margin: 0; Margin-bottom: 15px;">'.gCTSilent('Klicke den Button unten, um deinen Account zu aktivieren.').'</p>
		                        <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; box-sizing: border-box;">
		                          <tbody>
		                            <tr>
		                              <td align="left" style="font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;">
		                                <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;">
		                                  <tbody>
		                                    <tr>
		                                      <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; background-color: #3680EE; border-radius: 5px; text-align: center;"> <a href="
		' . "https://jugend-theater.ch/functions/functions.php?func=verification&hsh=". $hash . '" target="_blank" style="display: inline-block; color: #ffffff; background-color: #3680EE; border: solid 1px #3680EE; border-radius: 5px; box-sizing: border-box; cursor: pointer; text-decoration: none; font-size: 20px; font-weight: bold; margin: 0; padding: 12px 25px; text-transform: capitalize; border-color: #3680EE;">'.gCTSilent('Aktivieren').'</a> </td>
		</tr>
		</tbody>
		</table>
		</td>
		</tr>
		</tbody>
		</table>

		</td>
		</tr>
		</table>
		</td>
		</tr>

		<!-- END MAIN CONTENT AREA -->
		</table>



		<!-- END CENTERED WHITE CONTAINER -->
		</div>
		</td>
		<td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
		</tr>
		</table>
		</body>
		</html>
';
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: <info@jugendtheaterfestival.ch>' . "\r\n";
		$suc = mail($to, $subject, $message, $headers);
		if(!$suc){
			$msg = gCTSilent("Email konnte nicht gesendet werden. Prüfen Sie die Email-Adresse");
			$sql="DELETE FROM Users WHERE Username=".$_POST['us'];
	    mysqli_query($DBconn, $sql);
		} else {
			$msg = gCTSilent("Email versendet!");
		}
	}
	echo $msg;
}
?>
