<?php
$manage = $_POST['manage'];
if($manage == "student"){
    require_once("../classes/Student.php");
    if($_REQUEST['sid']) {
        $sid = $_REQUEST['sid'];
        $student = new Student();
        $student->deleteStudent($sid);
    }
}else if($manage == "branch"){
    require_once("../classes/Branch.php");
    if($_POST['id']) {
        $id = $_POST['id'];
        $branch = new Branch();
        $branch->delete($id);
    }
}else if($manage == "subject"){
    require_once("../classes/Subject.php");
    if($_POST['id']) {
        $id = $_POST['id'];
        $subject = new Subject();
        $subject->delete($id);
    }
}else if($manage == "semester"){
    require_once("../classes/Semester.php");
    if($_POST['id']) {
        $id = $_POST['id'];
        $semester = new Semester();
        $semester->delete($id);
    }
}
?>