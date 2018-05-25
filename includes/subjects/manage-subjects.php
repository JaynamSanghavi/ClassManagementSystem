<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="content-page">

    <?php
    $page_title = "Manage Subjects";
    $breadcrumb = "
	<li class='breadcrumb-item'>Subject Management</li>
	<li class='breadcrumb-item active'>Manage Subject</li>";
    include_once("includes/top-bar.php");

    $subjects = new Subjects();

    ?>
    <!-- Start Page content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <div class="pull-left form-row">
                        	<div class="form-group">
                        		<select id="num-rows-choice" class="custom-select" onchange="loadData()">
                        			<option value="0" selected>Rows Per Page</option>
                        			<option value="10" > 10</option>
                        			<option value="25" > 25 </option>
                        			<option value="50" > 50</option>
                        		</select>
                        	</div>
                        	<div class="form-group">
                        		<input type="text" class="form-control" placeholder="Search" onkeyup="search(this.value)" name="key" id="key" style="margin-left: 10px;"> 
                        	</div>
                        </div>

                           <p class="text-muted font-14 m-b-20 pull-right">
                            <a type="button" href="subjects.php?q=add"
                               class="btn btn-primary waves-effect waves-light btn-lg"> <i class="fa fa-plus m-r-5"></i>
                                <span>Add New Subject</span> </a>
                        </p>
                        
                        <div id="subjects-info">
                        	
                        </div>
                        
                    </div>

                </div>

            </div>
            <!-- end row -->

        </div>
        <!-- container -->

    </div>
    <!-- content -->

    <?php include_once("includes/footer.php"); ?>

</div>


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->
