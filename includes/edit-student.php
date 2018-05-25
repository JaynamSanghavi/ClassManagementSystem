<?php
	if(isset($_POST['update_student_details'])){
		$sid = $_GET['sid'];
		extract($_POST);
		$student = new Student();
		$student->updateStudent($sid, $student_first_name, $student_last_name, $student_email, $student_number, $student_address, $student_branch, $student_dob, $student_college, $student_gender, $stream_id);
		
		$parent = new Parents();
		$parent->updateParentDetails($father_id, $father_first_name, $father_number, $father_email );
		$parent->updateParentDetails($mother_id, $mother_first_name, $mother_number, $mother_email );
		
		Functions::redirect("student.php?q=default&op=update&p=success&page=student");
	}
?>


<?php
	if(isset($_GET['sid'])){
		$sid = $_GET['sid'];
		$student = new Student();
		$result_set = $student->getAllDetailsOfAStudent($sid);
		if($row = mysqli_fetch_assoc($result_set))
			extract($row);
		
		$parent = new Parents();
		$father_db_row = $parent->getFatherDetails($sid);
		$mother_db_row = $parent->getMotherDetails($sid);
		extract($father_db_row);
		
		// we cant extract mother's row as the variable name would clash and father detail would be
		// overriden so to avoid that overridding we would extract mother detail laterafter using father details variable
?>


<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="content-page">

	<?php
	$page_title = "Manage Student";
	$breadcrumb = "
	<li class='breadcrumb-item'>Student Management</li>
	<li class='breadcrumb-item active'>Edit Student</li>";
	include_once("top-bar.php");
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
									<label for="student_first_name">First Name</label>
									<input type="text" class="form-control" required placeholder="Enter your First Name" value="<?php echo $student_first_name; ?>" name="student_first_name" id="student_first_name"/>
								</div>
								
								<div class="form-group">
									<label for="student_last_name">Last Name</label>
									<input type="text" class="form-control" value="<?php echo $student_last_name; ?>" required placeholder="Type Your Last Name" name="student_last_name" id="student_last_name"/>
								</div>
																
								<div class="form-group">
									<label for="student_email">E-Mail</label>
									<div>
										<input type="email" class="form-control" required parsley-type="email" value="<?php echo $student_email; ?>" placeholder="Enter a valid e-mail" name="student_email" id="student_email"/>
									</div>
								</div>
								
								<div class="form-group">
									<label for="student_number">Number</label>
									<div>
										<input data-parsley-type="number" type="text" class="form-control" value="<?php echo $student_number; ?>" required placeholder="Enter your Phone Number" name="student_number" id="student_number"/>
									</div>
								</div>
								
								<div class="form-group">
									<label for="student_address">Address</label>
									<div>
										<textarea required class="form-control" name="student_address" id="student_address"><?php echo $student_address; ?></textarea>
									</div>
								</div>
                                                            
								<div class="form-group">
									<label for="student_branch">Branch</label>
									<input type="text" class="form-control" required placeholder="Branch" value="<?php echo $student_branch; ?>" name="student_branch" id="student_branch"/>
								</div>
                        
								<div class="form-group">
									<label for="student_dob">DOB</label>
									<input type="text" class="form-control" required placeholder="YYYY - MM - DD" value="<?php echo $student_dob; ?>" name="student_dob" id="student_dob"/>
								</div>
                
								<div class="form-group">
									<label for="student_college">College</label>
									<input type="text" class="form-control" required placeholder="College" name="student_college" value="<?php echo $student_college; ?>" id="student_college"/>
								</div>
								
								<div class="form-group">
									<label for="student_gender">Gender</label>
									<input type="text" class="form-control" required placeholder="Gender" name="student_gender" value="<?php echo $student_gender; ?>" id="student_gender"/>
								</div>
								    
								<div class="form-group">
									<label for="stream_id">Stream</label>
									<input type="text" class="form-control" required placeholder="Stream ID" name="stream_id" value="<?php echo $stream_id; ?>" id="stream_id"/>
								</div>
								
							<h4>Father Details</h4>
								<div class="form-group">
								<input type="hidden" value="<?php echo $pid; ?>" name="father_id">
									<label for="father_first_name">First Name</label>
									<input type="text" class="form-control" required placeholder="Enter your Father's Name" value="<?php echo $parent_first_name; ?>" name="father_first_name" id="father_first_name"/>
								</div>
								
								<div class="form-group">
									<label for="father_number">Number</label>
									<div>
										<input data-parsley-type="number" type="text" class="form-control" required placeholder="Enter Father's Number" name="father_number" value="<?php echo $parent_number; ?>" id="father_number"/>
									</div>
								</div>
								
								<div class="form-group">
									<label for="father_email">E-Mail</label>
									<div>
										<input type="email" class="form-control" required parsley-type="email" value="<?php echo $parent_email; ?>" placeholder="Enter a valid e-mail" name="father_email" id="father_email"/>
									</div>
								</div>
								
								<!-- parent detail filled-->
								<?php
									//now we will extract mother details
									extract($mother_db_row);
								?>
								
							<h4>Mother Details</h4>
							<input type="hidden" value="<?php echo $pid; ?>" name="mother_id">
								<div class="form-group">
									<label for="father_first_name">First Name</label>
									<input type="text" class="form-control" required placeholder="Enter your Father's Name" value="<?php echo $parent_first_name; ?>" name="mother_first_name" id="mother_first_name"/>
								</div>
								
								<div class="form-group">
									<label for="father_number">Number</label>
									<div>
										<input data-parsley-type="number" type="text" class="form-control" required placeholder="Enter Father's Number" name="mother_number" value="<?php echo $parent_number; ?>" id="mother_number"/>
									</div>
								</div>
								
								<div class="form-group">
									<label for="father_email">E-Mail</label>
									<div>
										<input type="email" class="form-control" required parsley-type="email" value="<?php echo $parent_email; ?>" placeholder="Enter a valid e-mail" name="mother_email" id="mother_email"/>
									</div>
								</div>
								
								<div class="form-group">
									<div>
										<button type="submit" class="btn btn-custom waves-effect waves-light" name="update_student_details">
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

		<?php include_once("footer.php");?>

</div>

<?php
	}
?>


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->
