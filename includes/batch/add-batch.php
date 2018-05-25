<?php
if(isset($_POST['add_batch'])){
    extract($_POST);
    $semester = new Semester();
    $semester_id = $semester->insert($semester_name);
    echo "done";
    Functions::redirect("batch.php?op=ins&p=success&page=semester");
}
?>


<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="content-page">

    <?php
    $page_title = "Add Semester";
    $breadcrumb = "
	<li class='breadcrumb-item'>Batch Management</li>
	<li class='breadcrumb-item active'>Add Batch</li>";
    include_once("includes/top-bar.php");
    ?>
    <!-- Start Page content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <form class="" method="post" action="#" name="form-add-semester" id="add_subject">
                            <h4>Batch Details</h4>
                            <div class="form-row" id="batch-panel">
                                <div class="form-group col-md-4">
                                    <label>Batch Name</label>
                                    <input type="text" class="form-control" required placeholder="Enter Batch Name" name="batch_name" id="batch_name" />
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Start Date</label>
                                    <input type="text" class="form-control" required placeholder="Enter Start Date" name="start_date" id="start_date" />
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Batch Status</label>
                                    <select class="form-control" name="batch_status" id="batch_satatus">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                                <div id="subjectList0" class="form-row col-md-12">
                                    <div class="form-group col-md-4">
                                        <label>Select Semester</label>
                                        <select name="semester_id[]" id="semester_id0" class="form-control" onchange="populatedSubjects(0);">
                                            <option value="select">Select....</option>
                                            <?php
                                                $semester = new Semester();
                                                $semester->populateSemesters();
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Select Branch</label>
                                        <select name="branch_id[]" id="branch_id0" class="form-control" onchange="populatedSubjects(0);">
                                            <option value="select">Select....</option>
                                            <?php
                                                $branch = new Branch();
                                                $branch->populateBranches();
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label>Select Subject</label>
                                        <select name="subject_id[]" id="subject_id0" class="form-control">
                                            <option value="select">Select....</option>

                                        </select>
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label>&nbsp;</label>
                                        <button type="button" class="form-control btn btn-danger" id="delete" onclick="deletePanel(0)" "><i class="fa fa-trash"></i> </button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <button type="button" class="btn btn-warning" id="add_more_subjects"><i class="fa fa-plus-circle">Add more subject</i> </button>
                                </div>
                            </div>

                            <div class="form-group clearfix">
                                <div>
                                    <button type="submit" class="btn btn-custom waves-effect waves-light pull-right" name="add_batch" id="add_batch">
                                        Create Batch
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