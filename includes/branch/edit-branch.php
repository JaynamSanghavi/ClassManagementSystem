<?php
	if(isset($_POST['update_branch_details'])){
		$id = $_GET['id'];
		extract($_POST);
		$branch = new Branch();
		$branch->update($id, $branch_name, $branch_code);
		
		Functions::redirect("branch.php?op=update&p=success&page=branch");
	}
?>


<?php
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$branch = new Branch();
		$result_set = $branch->getBranchDetailsByID($id);
		if($row = mysqli_fetch_assoc($result_set))
			extract($row);
?>


<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="content-page">

	<?php
	$page_title = "Manage Branch";
	$breadcrumb = "
	<li class='breadcrumb-item'>Branch Management</li>
	<li class='breadcrumb-item active'>Edit Branch</li>";
	include_once("includes/top-bar.php");
	?>
		<!-- Start Page content -->
		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="card-box">
							<form class="" action="#" name="add-student" id="add-student" method="post">
							<h4>Personal Details</h4>
								<div class="form-group">
									<label for="branch_name">Branch Name</label>
									<input type="text" class="form-control" required placeholder="Enter your First Name" value="<?php echo $branch_name; ?>" name="branch_name" id="branch_name"/>
								</div>
								
								<div class="form-group">
									<label for="branch_code">Branch Code</label>
									<input type="text" class="form-control" value="<?php echo $branch_code; ?>" required placeholder="Type Your Last Name" name="branch_code" id="branch_code"/>
								</div>
																
								
								<div class="form-group">
									<div>
										<button type="submit" class="btn btn-custom waves-effect waves-light" name="update_branch_details">
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
