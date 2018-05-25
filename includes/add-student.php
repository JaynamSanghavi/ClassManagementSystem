<?php
    if(isset($_POST['add_student_details'])){
        extract($_POST);
        $student = new Student();
        
        $student_id = $student->insertStudent($student_first_name, $student_last_name, $student_email, $student_number, $student_address, $student_branch, $student_dob, $student_college, $student_gender, $stream_id);
        
        $parent = new Parents();
        $gender = "Male";
        $father_id = $parent->insertParentDetails($father_first_name, $father_number, $father_email, $gender);
        
        $gender = "Female";
        $mother_id = $parent->insertParentDetails($mother_first_name, $mother_number, $mother_email, $gender); 
        
        $student->linkWithGuardian($student_id, $father_id);
        $student->linkWithGuardian($student_id, $mother_id);
        
        Functions::redirect("student.php?q=default&op=add&p=success&page=student");
    }
?>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="content-page">

	<?php
	$page_title = "Manage Student";
	$breadcrumb = "
	<li class='breadcrumb-item'>Student Management</li>
	<li class='breadcrumb-item active'>Add Student</li>";
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
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="student_first_name">First Name</label>
                                        <input type="text" class="form-control" required placeholder="Enter your First Name" name="student_first_name" id="student_first_name"/>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="student_last_name">Last Name</label>
                                        <input type="text" class="form-control" required placeholder="Type Your Last Name" name="student_last_name" id="student_last_name"/>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="student_email">E-Mail</label>
                                        <div>
                                            <input type="email" class="form-control" required parsley-type="email" placeholder="Enter a valid e-mail" name="student_email" id="student_email"/>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="student_number">Number</label>
                                        <div>
                                            <input data-parsley-type="number" type="text" class="form-control" required placeholder="Enter your Phone Number" name="student_number" id="student_number"/>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="student_address">Address</label>
                                        <div>
                                            <textarea required class="form-control" name="student_address" id="student_address"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="student_branch">Branch</label>
                                        <input type="text" class="form-control" required placeholder="Branch" name="student_branch" id="student_branch"/>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="student_dob">DOB</label>
                                        <input type="text" class="form-control" required placeholder="YYYY - MM - DD" name="student_dob" id="student_dob"/>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="student_college">College</label>
                                        <input type="text" class="form-control" required placeholder="College" name="student_college" id="student_college"/>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="student_gender">Gender</label>
                                        <input type="text" class="form-control" required placeholder="Gender" name="student_gender" id="student_gender"/>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="stream_id">Stream</label>
                                        <input type="text" class="form-control" required placeholder="Stream ID" name="stream_id" id="stream_id"/>
                                    </div>
                                </div>
								
							<h4>Father Details</h4>
								<div class="form-row ">
                                    <div class="form-group col-md-4">
                                        <label for="father_first_name">First Name</label>
                                        <input type="text" class="form-control" required placeholder="Enter your Father's Name" name="father_first_name" id="father_first_name"/>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="father_number">Number</label>
                                        <div>
                                            <input data-parsley-type="number" type="text" class="form-control" required placeholder="Enter Father's Number" name="father_number" id="father_number"/>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="father_email">E-Mail</label>
                                        <div>
                                            <input type="email" class="form-control" required parsley-type="email" placeholder="Enter a valid e-mail" name="father_email" id="father_email"/>
                                        </div>
                                    </div>
                                </div>
                                <h4>Mother Details</h4>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="mother_first_name">First Name</label>
                                        <input type="text" class="form-control" required placeholder="Enter your Mother's Name" name="mother_first_name" id="mother_first_name"/>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="mother_number">Number</label>
                                        <div>
                                            <input data-parsley-type="number" type="text" class="form-control" required placeholder="Enter Mother's Number" name="mother_number" id="mother_number"/>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>E-Mail</label>
                                        <div>
                                            <input type="email" class="form-control" required parsley-type="email" placeholder="Enter a valid e-mail" name="mother_email" id="mother_email"/>
                                        </div>
                                    </div>
                                </div>
								<div class="form-group">
									<div>
										<button type="submit" class="btn btn-custom waves-effect waves-light" name="add_student_details">
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


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->
