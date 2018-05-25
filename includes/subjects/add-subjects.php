<?php
    if(isset($_POST['add_subjects'])){
        extract($_POST);
        $subjects = new Subjects();
        
        $subject_id = $subjects->insert($subject_name,$subject_fees,$semester_id,$branch_id);

        Functions::redirect("subjects.php?op=add&p=success&page=subjects");
    }
?>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="content-page">

	<?php
	$page_title = "Manage Subject";
	$breadcrumb = "
	<li class='breadcrumb-item'>Subject Management</li>
	<li class='breadcrumb-item active'>Add Subject</li>";
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
									<label for="student_first_name">Subject Name</label>
									<input type="text" class="form-control" required placeholder="Enter your First Name" name="subject_name" id="subject_name"/>
								</div>
								
								<div class="form-group">
									<label for="student_last_name">Subject Fees</label>
									<input type="text" class="form-control" required placeholder="Enter the branch code" name="subject_fees" id="subject_fees"/>
								</div>

                                <div class="form-group col-md-6">
                                    <label>Semester</label>
                                    <select class="form-control" name="semester_id" id="semester_id">
                                        <?php
                                            $semester = new Semester();
                                            $semester->populateSemesters();
                                        ?>
                                    </select>
                                </div>

                                <div class="form-control col-md-6">
                                    <label>Branch</label>
                                    <select class="form-control" name="branch_id" id="branch_id">
                                        <?php
                                            $branch = new Branch();
                                            $branch->populateBranches();
                                        ?>
                                    </select>
                                </div>
								
								<div class="form-group">
									<div>
										<button type="submit" class="btn btn-custom waves-effect waves-light" name="add_subjects" id="add_subjects">
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


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->
