<?php
	if(isset($_POST['update_subjects_details'])){
		$id = $_GET['id'];
		extract($_POST);
		$subjects = new Subjects();
		$subjects->update($id, $subject_name, $subject_fees);
		
		Functions::redirect("subjects.php?q=default&op=update&p=success&page=subjects");
	}
?>


<?php
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$subjects = new Subjects();
		$result_set = $subjects->getBranchDetailsByID($id);
		if($row = mysqli_fetch_assoc($result_set))
			extract($row);
?>


<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="content-page">

	<?php
	$page_title = "Manage Subject";
	$breadcrumb = "
	<li class='breadcrumb-item'>Subject Management</li>
	<li class='breadcrumb-item active'>Edit Subject</li>";
	include_once("includes/top-bar.php");
	?>
		<!-- Start Page content -->
		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="card-box">
							<form class="" action="#" name="add-student" id="add-student" method="post">
							<h4>Subject Details</h4>
								<div class="form-group">
									<label for="subject_name">Subject Name</label>
									<input type="text" class="form-control" required placeholder="Enter your First Name" value="<?php echo $subject_name; ?>" name="subject_name" id="subject_name">
								</div>
								
								<div class="form-group">
									<label for="subject_fees">Subject Fees</label>
									<input type="text" class="form-control" value="<?php echo $subject_fees; ?>" required placeholder="Type Your Last Name" name="subject_fees" id="subject_fees">
								</div>
																
								
								<div class="form-group">
									<div>
										<button type="submit" class="btn btn-custom waves-effect waves-light" name="update_subjects_details">
                                                    Submit
                                                </button>
										<button type="reset" class="btn btn-light waves-effect m-l-5">
                                                    Cancel
                                                </button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
			<!-- container -->

		</div>
		<!-- content -->

		<?php include_once("includes/footer.php");?>

</div>

<?php
	}
?>


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->
