<!DOCTYPE html>
<html>
	<?php
	ob_start();
    require_once ("includes/init.php");
    Session::startSession();
    User::checkActiveSession();
	$page = "Subject";
	$title ="Study Link | Manage Subject";
	include_once("includes/head.php");
    ?>
    <body>

        <!-- Begin page -->
        <div id="wrapper">
			<!--INCLUDING SIDEBAR-->
            <?php include_once("includes/sidebar.php"); ?>
            
            <!--INCLUDING MAIN CONTENTS OF THE PAGE-->
            <?php 
			if(isset($_GET['q'])){
				$q = $_GET['q'];
			}else{
				$q = "default";
			}
				switch ($q)
				{
					case 'add':
						include_once("includes/subjects/add-subjects.php"); 
						break;
						
					case 'edit':
						include_once("includes/subjects/edit-subjects.php"); 
						break;
						
					default:
						include_once("includes/subjects/manage-subjects.php"); 
						break;
				}
				
			
			
			
			
			
			
			?>
            
        </div>
        <!-- END wrapper -->
        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <!-- Parsley js USED FOR VALIDATION-->
        <script type="text/javascript" src="plugins/parsleyjs/parsley.min.js"></script>

        <!-- TOASTER JS -->
        <script src="plugins/uitoastr/toastr.js"></script>

        <!-- Dashboard Init -->
        <script src="assets/pages/jquery.subjects.init.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
        <script src="plugins/sweet-alert/sweetalert2.min.js"></script>
        <?php
            include_once("includes/script/show-notification.php");
        ?>
    </body>
</html>