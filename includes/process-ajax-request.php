<?php
/**
 * Created by PhpStorm.
 * User: Himanshu
 * Date: 2/25/2018
 * Time: 6:11 PM
 */
$manage = $_POST['manage'];
if($manage=="student"){
    require_once("../classes/Student.php");
    $student = new Student();

    if(isset($_POST['rows'])){
        $numRows = $_POST['rows'];
        if($numRows == 0){
            $numRows = $student->studentPerPage;
        }
    }
    $student->displayStudentsWithPagination($numRows);
}else if($manage== "branch"){
    require_once("../classes/Branch.php");
    $branch = new Branch();

    if(isset($_POST['rows'])){
        $numRows = $_POST['rows'];
        if($numRows == 0){
            $numRows = $branch->recordsPerPage;
        }
    }
    $branch->displayRecordsWithPagination($numRows);
}else if($manage== "subjects"){
    require_once("../classes/Subjects.php");
    $subject = new Subjects();

    if(isset($_POST['rows'])){
        $numRows = $_POST['rows'];
        if($numRows == 0){
            $numRows = $subject->recordsPerPage;
        }
    }
    $subject->displayRecordsWithPagination($numRows);
}else if($manage== "semester"){
    require_once("../classes/Semester.php");
    $semester = new Semester();

    if(isset($_POST['rows'])){
        $numRows = $_POST['rows'];
        if($numRows == 0){
            $numRows = $semester->recordsPerPage;
        }
    }
    $semester->displayRecordsWithPagination($numRows);
}
$data = $_POST['data'];
if($data == "branch"){
        require_once ("../classes/Branch.php");
        $branch = new Branch();
        $options = "<option value='select'>Select...</option>";
        echo $options;
        return ($branch->populateBranches());
}elseif ($data == "semester"){
    require_once ("../classes/Semester.php");
    $semester = new Semester();
    $options = "<option value='select'> Select </option>";
    echo $options;
    return ($semester->populateSemesters());
}
