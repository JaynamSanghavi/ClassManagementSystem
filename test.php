<?php
	include_once("classes/Student.php");
	$student = new Student();	
	$sid = $student->linkWithGuardian(1,1);
	echo $sid;
	$sid = $student->linkWithGuardian(1,2);
	echo $sid;

?>