<?php include('logincheck.php');?>
<!doctype html>
<html lang="en"><!-- InstanceBegin template="/Templates/RWR-Template.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="utf-8"> 
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Raspberry Wifi Router</title>
<!-- InstanceEndEditable -->
<link href="css/stylesheet.css" rel="stylesheet" type="text/css">
<link href="css/CssMenuStylesheet.css" rel="stylesheet" type="text/css">
<script src="Scripts/jquery-2.1.3.min.js" type="text/javascript"></script>
<script src="Scripts/CssMenuScript.js" type="text/javascript"></script>
<!-- InstanceBeginEditable name="head" -->
<script>
function ReturnStatus(message) {
    
	document.getElementById('status').innerHTML = message;
}
function ReturnProgress() {
    
	document.getElementById('status').innerHTML = 'Updating Applications and rebooting Raspberry Pi, please wait for the login screen...';
	document.getElementById('progress').innerHTML = '<img src="images/ProgressIndicator.GIF" width="100" height="15"  alt="">';
}


function GoToHome() {
	window.location = '/login.php';
}
</script>
<?php include 'functions.php';?>
<?php logmessage("Loading page Maintenance-UpdateApps.php");?>
<!-- InstanceEndEditable --> 
</head>
 

<body>

<div class="container"> 
  
  <header>
    <div id="titlebar">
      <span><img src="images/WiFi%20Logo.gif" width="180" height="120"  alt=""/></span>
      <span id="title"><h1>Raspberry WiFi Router</h1></span>
    </div>
  </header>

  <div class="sidebar1">
    <nav>
      <div id='cssmenu'>
      <ul>
         <li class='active' id="Home"><a href='home.php'><span>Home</span></a></li>
         <li class='has-sub' id="Configuration"><a href='#'><span>Configuration</span></a>
            <ul id="ConfigurationUl">
               <li><a href='Configuration-DateTime.php'><span>Date/Time</span></a></li>
               <li><a href='Configuration-OperationMode.php'><span>Operation Mode</span></a></li>
               <li><a href='Configuration-NetworkSettings.php'><span>Network Settings</span></a></li>
               <li><a href='Configuration-WirelessSettings.php'><span>Wireless Settings</span></a></li>
            </ul>
         </li>
         <!--<li class='has-sub' id="Advanced"><a href='#'><span>Advanced</span></a>
            <ul id="AdvancedUl">
               <li><a href='Advanced-PortForwarding.php'><span>Port Forwarding</span></a></li>
               <li><a href='Advanced-CaptivePortal.php'><span>Captive Portal</span></a></li>
               <li><a href='Advanced-NetworkFilter.php'><span>Network Filter</span></a></li>
               <li><a href='Advanced-WebFilter.php'><span>Web Filter</span></a></li>
               <li class='last'><a href='Advanced-Wireless.php'><span>Advanced Wireless</span></a></li>
            </ul>
         </li>-->
        <li class='has-sub' id="Maintenance"><a href='#'><span>Maintenance</span></a>
            <ul id="MaintenanceUl">
              <li><a href='Maintenance-ChangePassword.php'><span>Password</span></a></li>
               <li><a href='Maintenance-BackupConfig.php'><span>Backup Config</span></a></li>
               <li><a href='Maintenance-RestoreConfig.php'><span>Restore Config</span></a></li>
               <li><a href='Maintenance-FactoryReset.php'><span>Factory Reset</span></a></li>
               <li><a href='Maintenance-UpdateApps.php'><span>Update Applications</span></a></li>
               <li class='last'><a href='Maintenance-Reboot.php'><span>Reboot</span></a></li>
            </ul>
         </li>

         <li class='has-sub' id="Logs"><a href='#'><span>Logs</span></a>
            <ul id="LogsUl">
               <li><a href='Logs-Routerlog.php'><span>Routerlog</span></a></li>
               <li><a href='Logs-Dmesg.php'><span>Dmesg</span></a></li>
               <li><a href='Logs-Syslog.php'><span>Syslog</span></a></li>
               <li class='last'><a href='Logs-Messages.php'><span>Messages</span></a></li>
            </ul>
         </li>
         <li id="Logs"><a href='logout.php'><span>Log out</span></a>
         </li>
      </ul>
      </div>
    </nav>
  </div><!-- end .sidebar1 -->
  <!-- InstanceBeginEditable name="MenuExpander" -->
  <script>
	$('#Home').removeClass('active');
	$('#Maintenance').addClass('active');
	$('#MaintenanceUl').show();
  </script>
  <!-- InstanceEndEditable -->
  
  <article class="content">
    <!-- InstanceBeginEditable name="article" -->
  <div id="ContentTitle">
  <span>Update Applications</span></div>
      
  <div id="ContentArticle">
   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data" id="updateApps">
    <fieldset><legend>Upload configuration</legend>
      <table width="100%" border="0">
        <tbody>
          <tr>
            <td align="left">
              
              Select update file to upload:          <br>
              </td>
          </tr>
          <tr>
            <td height="48" align="center"><input name="fileToUpload" type="file" id="fileToUpload" form="updateApps" style="width: 100%"></td>
            </tr>
          <tr>
            <td align="left"><input name="submit" type="submit" form="updateApps" value="Upload update image" id="updateApp2"></td>
          </tr>
          <tr>
            <td align="center">&nbsp;</td>
          </tr>
          <tr>
            <td align="center"><span id="status" style="color:red">&nbsp;</span></td>
          </tr>
          <tr>
            <td align="center"><span id="progress">&nbsp;</span></td>
            </tr>
        </tbody>
      </table>
    </fieldset>

    </form>
  </div>
      
      
    <!-- InstanceEndEditable -->
  </article><!-- end .content -->


  <aside>
  <!-- InstanceBeginEditable name="aside" -->
  
  
  
  <!-- InstanceEndEditable -->
  </aside>


  <footer>
  <p>Designed by Ronny Van den Broeck </p>
  <p>Added by neinnil </p>
  <!-- InstanceBeginEditable name="footer" -->

  
  
  <!-- InstanceEndEditable -->
  </footer>
</div><!-- end .container -->

<!-- InstanceBeginEditable name="code" -->

<?php

  if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['submit'])) {

	  $target_dir = "temp/";
	  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	  $uploadOk = 1;
	  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

	  // Check if file already exists
	  if (file_exists($target_file)) {
		  echo "<script>ReturnStatus('Sorry, file already exists.');</script>";
		  logmessage("Backup not uploaded, file already exists.");
		  $uploadOk = 0;
	  }

	  // Check file size
	  if ($_FILES["fileToUpload"]["size"] > 64000000) {
		  echo "<script>ReturnStatus('Sorry, your file is too large.');</script>";
		  logmessage("Backup not uploaded, file is too large.");
		  $uploadOk = 0;
	  }

	  // Allow certain file formats
	  if($imageFileType != "tar") {
		  echo "<script>ReturnStatus('Sorry, only tar files are allowed.');</script>";
		  logmessage("Backup not uploaded, only tar files are allowed.");
		  $uploadOk = 0;
	  }

	  // Check if $uploadOk is set to 0 by an error
	  if ($uploadOk !== 0) {
		  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

			  //upload succeeded
			  echo "<script>ReturnProgress();</script>";
			  echo "<script>setTimeout(GoToHome, 60000);</script>";
			  flush();

			  //extracting file (update image)
			  logmessage("make temporary updating directory.");
		          shell_exec("sudo mkdir -p temp/updateApps");
			  logmessage("Extracting file (updating application)"); 
			  shell_exec("sudo tar -xf ". $target_file . " -C temp/updateApps 2>&1 | sudo tee --append /var/log/raspberrywap.log");

// find update.sh 
			  $updateScriptOk = 0;
		          $updateTarget = "temp/updateApps";
			  $updateScript = $updateTarget."/update.sh";
			  logmessage("updateScript: ".$updateScript);
			  if (file_exists($updateScript)){
				logmessage ("Update Script: ". $updateScript);
				$updateScriptOk = 1;
			  } 
			  if ($updateScriptOk == 0) {
				  $targetName = basename($_FILES["fileToUpload"]["name"], ".tar");
				  $updateScript = $updateTarget."/".$targetName."/update.sh";
				  logmessage("updateScript: ".$updateScript);
				  if (file_exists($updateScript)) {
					logmessage ("Update Script: ". $updateScript);
					$updateScriptOk = 1;
				  }
			  }
			  if ($updateScriptOk !== 0) {
				  // run update script.
				  logmessage("run update script(update.sh).");
				  shell_exec("sudo sh ".$updateScript." 2>&1 | sudo tee --append /var/log/raspberrywap.log");
				  //removing back-up file
				  logmessage("Removing update file.");
				  shell_exec("sudo rm -fv /home/pi/Raspberry-Wifi-Router/www/temp/" . basename($_FILES["fileToUpload"]["name"]) . " 2>&1 | sudo tee --append /var/log/raspberrywap.log");
				  logmessage("Removing update directory.");
				  shell_exec("sudo rm -rf /home/pi/Raspberry-Wifi-Router/www/temp/updateApps 2>&1 | sudo tee --append /var/log/raspberrywap.log");

				  session_start();
				  session_destroy();

				  logmessage("Reboot initiated.");
				  shell_exec("sudo reboot");
			  } else {
				  echo "<script>ReturnStatus('Sorry, file is not exists.');</script>";
				  logmessage("There is no update.sh in update image.");
				// logmessage("Removing update file.");
				// shell_exec("sudo rm -fv /home/pi/Raspberry-Wifi-Router/www/temp/" . basename($_FILES["fileToUpload"]["name"]) . " 2>&1 | sudo tee --append /var/log/raspberrywap.log");
				 // logmessage("Removing temporary updating directory.");
				  //shell_exec("sudo rm -rf /home/pi/Raspberry-Wifi-Router/www/temp/updateApps 2>&1 | sudo tee --append /var/log/raspberrywap.log");
			  }
			
		} else {
		  echo "<script>ReturnStatus('Sorry, could not upload backup file, error unspecified, giving up.');</script>";
		  print_r ($_FILES);
		}
	}
  }
?>



<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
