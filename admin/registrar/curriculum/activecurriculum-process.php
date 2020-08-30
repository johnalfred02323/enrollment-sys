<?php
include('../../../config/config.php');

if(isset($_POST['saveactivecur'])){
$major = $_POST['major'];
$course = $_POST['course'];
$year = $_POST['year'];
$title = $_POST['title'];

	$check = mysqli_query($conn, "SELECT * FROM curriculum where curriculum_title='$title'");
	$row = mysqli_num_rows($check);
	if($row > 0)
	{
		$query = mysqli_query($conn, "UPDATE subject INNER JOIN year_and_semester  ON subject.yrsem_id = year_and_semester.yrsem_id  INNER JOIN curriculum ON subject.curriculum_title = curriculum.curriculum_title INNER JOIN course ON course.course_id = curriculum.course_id SET subject.Status='Inactive' where course.course_abbreviation = '$course' AND course.course_major = '$major' AND year_and_semester.year = '$year'");

		$query = mysqli_query($conn, "UPDATE subject INNER JOIN year_and_semester ON subject.yrsem_id = year_and_semester.yrsem_id SET subject.Status='Active' where subject.curriculum_title='$title' AND year_and_semester.year = '$year'");
		echo '1';
	}
	else
	{
		echo 'Invalid Curriculum Title';
	}
}
?>