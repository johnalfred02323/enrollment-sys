<!-- Head -->
<?php require '../../src/layout/enlistment/head.php'; 

include('../../config/config.php');
$studnum = base64_decode($_GET['data']);

$query2 = "Select curriculum.curriculum_title, course.course_name, course.course_year AS year ,course.course_abbreviation AS course,course.course_major AS major, subject.subject_code, subject.subject_title, subject.lecture, subject.laboratory, subject.units, subject.pre_requisite, subject.yrsem_id from curriculum INNER JOIN student_info ON
  student_info.curriculum_title = curriculum.curriculum_title
  INNER JOIN subject ON curriculum.curriculum_title = subject.curriculum_title
  INNER JOIN course ON curriculum.course_id = course.course_id
  where student_info.student_number ='$studnum'";
$result2 = $conn-> query($query2); 
$rows=mysqli_fetch_assoc($result2);
if($rows != "")
{
    $result = $rows['course'];
    $curtitle = $rows['curriculum_title'];
    $major = $rows['major'];
    $year = $rows['year'];
    $course = $rows['course_name'];
}
else
{
    $result = "";
    $major = "";
    $curtitle = "NO DATA";
    $year = "0";
    $course = "Course";
}
?>

<!-- jquery -->
<script src="../../src/vendor/jquery/jquery-3.3.1.min.js"></script>



  <title>GRC Curriculum | BSIT</title>


</head>
<body id="page-top">



<div class="container">


  <div class="container-fuel text-center p-4">
    <img class="" src="../../src/img/logo-name-dark.png" height="100px" />
    <h3><?php echo $course; ?></h3>     
    <h5 id="major">Major In <?php echo $major; ?></h5>      
    <p><?php echo $curtitle; ?></p> 
    <p>(<?php echo $year; ?> Year Course)</p> 
  </div>
    
<!-- SPACER -->
<div class="mx-auto" style="height: 50px;"></div>


<?php 
$query = "Select * From student_info where student_number ='$studnum'";
$result1 = $conn-> query($query); 
$rows=mysqli_fetch_assoc($result1); 
if($rows != "")
{
  $fname = $rows['firstname'];
  $mname = $rows['middlename'];
  $lname = $rows['lastname'];
  $suffix = $rows['suffix'];
}
else
{
  $fname = "";
  $mname = "";
  $lname = "";
  $suffix = "";
}

?>
<div class="container">
  <div class="row">
    <div class="col-sm">
      Name: <?php echo $lname; ?>, <?php echo $fname; ?> <?php echo $mname; ?> <?php echo $suffix; ?>  
    </div>
    <div class="col-sm">
      Student No: <?php echo $studnum; ?>
    </div>
  </div>
</div>


<!-- SPACER -->
<div class="mx-auto" style="height: 50px;"></div>



<div id="1styr">



<div class="d-flex justify-content-center md-5"><h4>FIRST YEAR</h4></div>

<form>
<input type="radio" name="test" id="test-1" class="radio-test"checked="checked"/>
<input type="radio" name="test" id="test-2" class="radio-test" />

<div class="labels">
  <label for="test-1" id="label-test-1" class="label1">1st Sem</label>
  <label for="test-2" id="label-test-2" class="label2">2nd Sem</label>
</div>



<div class="content content-test-1" id="content-test-1">

<div class="table-responsive">
<table class="table table table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col" colspan="7" class="table-color">First Semester</th>
    </tr>
    <tr>
      <th scope="col">Grade</th>
      <th scope="col">Course&nbsp;Code</th>
      <th scope="col">Course&nbsp;Title</th>
      <th scope="col">Lec</th>
      <th scope="col">Lab</th>
      <th scope="col">Units</th>
      <th scope="col">Pre&minus;Req</th>
    </tr>
  </thead>
  <tbody>
      <?php 
      $query2 = "Select * From subject where curriculum_title ='$curtitle'";
      $result2 = $conn-> query($query2); 
      $total =0;
      while($rows2=mysqli_fetch_assoc($result2)) 
      { 
      $yrsem = $rows2['yrsem_id'];
      if($yrsem == '1styr1stsem'){
        $subjcode =$rows2['subject_code'];?>
      <tr>
        <?php $getgrade = "Select subject.subject_code, grade_report.tfg from grade_report 
        INNER JOIN class_record ON class_record.id = grade_report.cr_id 
        INNER JOIN schedule ON schedule.sched_id = class_record.sched_id 
        INNER JOIN subject ON subject.subj_id = schedule.subj_id where grade_report.student_number = '$studnum' AND subject.subject_code = '$subjcode'"; 
        $convgrade = $conn-> query($getgrade); 
        $grade=mysqli_fetch_assoc($convgrade); 
        
        ?>
      <th scope="row"><?php
      if ($grade != "")
      {  

              $final_grade = $grade['tfg'];
              if($final_grade > 98) { $fg_eq = '1.00'; }
              else if($final_grade > 95 && $final_grade < 98) { $fg_eq = '1.25'; }
              else if($final_grade > 92 && $final_grade < 96) { $fg_eq = '1.50'; }
              else if($final_grade > 89 && $final_grade < 93) { $fg_eq = '1.75'; }
              else if($final_grade > 86 && $final_grade < 90) { $fg_eq = '2.00'; }
              else if($final_grade > 83 && $final_grade < 87) { $fg_eq = '2.25'; }
              else if($final_grade > 80 && $final_grade < 84) { $fg_eq = '2.50'; }
              else if($final_grade > 77 && $final_grade < 81) { $fg_eq = '2.75'; }
              else if($final_grade > 74 && $final_grade < 78) { $fg_eq = '3.00'; }
              else if($final_grade < 75) { $fg_eq = '5.00'; }
              else{$fg_eq = $final_grade;} 
      echo $fg_eq; }
      else
      {
        echo "";
      }

       ?></th>
      <td><?php echo $rows2['subject_code'];?></td>
      <td><?php echo $rows2['subject_title'];?></td>
      <td><?php echo $rows2['lecture'];?></td>
      <td><?php echo $rows2['laboratory'];?></td>
      <td><?php echo $rows2['units'];?></td>
      <td><?php echo $rows2['pre_requisite'];?></td>
      </tr>
      <?php $total = $total + $rows2['units'];}}?>
    <tfoot class="table-borderless">
    <tr>
      <th colspan="2">Gen Ave</th>
      <td></td>
      <td colspan="2">Total:</td>
      <td><?php echo $total; ?></td>
      <td></td>
    </tr>
    </tfoot>
  </tbody>
</table>
</div>


</div>




<div class="content content-test-2" id="content-test-2">            

<div class="table-responsive">
<table class="table table table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col" colspan="7" class="table-color">Second Semester</th>
    </tr>
    <tr>
      <th scope="col">Grade</th>
      <th scope="col">Course&nbsp;Code</th>
      <th scope="col">Course&nbsp;Title</th>
      <th scope="col">Lec</th>
      <th scope="col">Lab</th>
      <th scope="col">Units</th>
      <th scope="col">Pre&minus;Req</th>
    </tr>
  </thead>
  <tbody>
      <?php 
      $query3 = "Select * From subject where curriculum_title ='$curtitle'";
      $result3 = $conn-> query($query3); 
      $total =0;
      while($rows3=mysqli_fetch_assoc($result3))
      { 
      $yrsem = $rows3['yrsem_id'];
      if($yrsem == "1styr2ndsem"){
        $subjcode =$rows3['subject_code'];  ?>
      <tr>
       <?php $getgrade = "Select subject.subject_code, grade_report.tfg from grade_report 
        INNER JOIN class_record ON class_record.id = grade_report.cr_id 
        INNER JOIN schedule ON schedule.sched_id = class_record.sched_id 
        INNER JOIN subject ON subject.subj_id = schedule.subj_id where grade_report.student_number = '$studnum' AND subject.subject_code = '$subjcode'"; 
        $convgrade = $conn-> query($getgrade); 
        $grade=mysqli_fetch_assoc($convgrade); 
        ?>
      <th scope="row"><?php
     if ($grade != "")
      {  

              $final_grade = $grade['tfg'];
              if($final_grade > 98) { $fg_eq = '1.00'; }
              else if($final_grade > 95 && $final_grade < 98) { $fg_eq = '1.25'; }
              else if($final_grade > 92 && $final_grade < 96) { $fg_eq = '1.50'; }
              else if($final_grade > 89 && $final_grade < 93) { $fg_eq = '1.75'; }
              else if($final_grade > 86 && $final_grade < 90) { $fg_eq = '2.00'; }
              else if($final_grade > 83 && $final_grade < 87) { $fg_eq = '2.25'; }
              else if($final_grade > 80 && $final_grade < 84) { $fg_eq = '2.50'; }
              else if($final_grade > 77 && $final_grade < 81) { $fg_eq = '2.75'; }
              else if($final_grade > 74 && $final_grade < 78) { $fg_eq = '3.00'; }
              else if($final_grade < 75) { $fg_eq = '5.00'; }
              else{$fg_eq = $final_grade;} 
      echo $fg_eq; }
      else
      {
        echo "";
      }

       ?></th>
      <td><?php echo $rows3['subject_code'];?></td>
      <td><?php echo $rows3['subject_title'];?></td>
      <td><?php echo $rows3['lecture'];?></td>
      <td><?php echo $rows3['laboratory'];?></td>
      <td><?php echo $rows3['units'];?></td>
      <td><?php echo $rows3['pre_requisite'];?></td>
      </tr>
      <?php $total = $total + $rows3['units'];}}?>
    <tfoot class="table-borderless">
    <tr>
      <th colspan="2">Gen Ave</th>
      <td></td>
      <td colspan="2">Total:</td>
      <td><?php echo $total; ?></td>
      <td></td>
    </tr>
    </tfoot>
  </tbody>
</table>
</div>


</div>
</form>
</div>

<!-- SPACER -->
<div class="mx-auto" style="height: 100px;"></div>





<div id="2ndyr">

<div class="d-flex justify-content-center md-5"><h4>SECOND YEAR</h4></div>

<form>
<input type="radio" name="test" id="test-3" class="radio-test" checked="checked"/>
<input type="radio" name="test" id="test-4" class="radio-test" />

<div class="labels">
  <label for="test-3" id="label-test-3" class="label1">1st Sem</label>
  <label for="test-4" id="label-test-4" class="label2">2nd Sem</label>
</div>



<div class="content content-test-3" id="content-test-3">

<div class="table-responsive">
<table class="table table table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col" colspan="7" class="table-color">First Semester</th>
    </tr>
    <tr>
      <th scope="col">Grade</th>
      <th scope="col">Course&nbsp;Code</th>
      <th scope="col">Course&nbsp;Title</th>
      <th scope="col">Lec</th>
      <th scope="col">Lab</th>
      <th scope="col">Units</th>
      <th scope="col">Pre&minus;Req</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $query = "Select * From subject where curriculum_title ='$curtitle'";
      $result = $conn-> query($query); 
      $total = 0;
      while($rows=mysqli_fetch_assoc($result))
      { 
      $yrsem = $rows['yrsem_id'];
      if($yrsem == "2ndyr1stsem"){
        $subjcode =$rows['subject_code'];?>
      <tr>
       <?php $getgrade = "Select subject.subject_code, grade_report.tfg from grade_report 
        INNER JOIN class_record ON class_record.id = grade_report.cr_id 
        INNER JOIN schedule ON schedule.sched_id = class_record.sched_id 
        INNER JOIN subject ON subject.subj_id = schedule.subj_id where grade_report.student_number = '$studnum' AND subject.subject_code = '$subjcode'"; 
        $convgrade = $conn-> query($getgrade); 
        $grade=mysqli_fetch_assoc($convgrade); 
        ?>
      <th scope="row"><?php
      if ($grade != "")
      {  

              $final_grade = $grade['tfg'];
              if($final_grade > 98) { $fg_eq = '1.00'; }
              else if($final_grade > 95 && $final_grade < 98) { $fg_eq = '1.25'; }
              else if($final_grade > 92 && $final_grade < 96) { $fg_eq = '1.50'; }
              else if($final_grade > 89 && $final_grade < 93) { $fg_eq = '1.75'; }
              else if($final_grade > 86 && $final_grade < 90) { $fg_eq = '2.00'; }
              else if($final_grade > 83 && $final_grade < 87) { $fg_eq = '2.25'; }
              else if($final_grade > 80 && $final_grade < 84) { $fg_eq = '2.50'; }
              else if($final_grade > 77 && $final_grade < 81) { $fg_eq = '2.75'; }
              else if($final_grade > 74 && $final_grade < 78) { $fg_eq = '3.00'; }
              else if($final_grade < 75) { $fg_eq = '5.00'; }
              else{$fg_eq = $final_grade;} 
      echo $fg_eq; }
      else
      {
        echo "";
      }

       ?></th>
      <td><?php echo $rows['subject_code'];?></td>
      <td><?php echo $rows['subject_title'];?></td>
      <td><?php echo $rows['lecture'];?></td>
      <td><?php echo $rows['laboratory'];?></td>
      <td><?php echo $rows['units'];?></td>
      <td><?php echo $rows['pre_requisite'];?></td>
      </tr>
     <?php $total = $total + $rows['units'];}}?>
    <tfoot class="table-borderless">
    <tr>
      <th colspan="2">Gen Ave</th>
      <td></td>
      <td colspan="2">Total:</td>
      <td><?php echo $total; ?></td>
      <td></td>
    </tr>
    </tfoot>
  </tbody>
</table>
</div>


</div>




<div class="content content-test-4" id="content-test-4">            

<div class="table-responsive">
<table class="table table table-bordered table-hover">
  <thead>
    <tr class="fixed">
      <th scope="col" colspan="7" class="table-color">Second Semester</th>
    </tr>
    <tr>
      <th scope="col">Grade</th>
      <th scope="col">Course&nbsp;Code</th>
      <th scope="col">Course&nbsp;Title</th>
      <th scope="col">Lec</th>
      <th scope="col">Lab</th>
      <th scope="col">Units</th>
      <th scope="col">Pre&minus;Req</th>
    </tr>
  </thead>
  <tbody>
   <?php 
      $query = "Select * From subject where curriculum_title ='$curtitle'";
      $result = $conn-> query($query); 
      $total = 0;
      while($rows=mysqli_fetch_assoc($result))
      { 
      $yrsem = $rows['yrsem_id'];
      if($yrsem == "2ndyr2ndsem"){
        $subjcode =$rows['subject_code'];?>
      <tr>
       <?php $getgrade = "Select subject.subject_code, grade_report.tfg from grade_report 
        INNER JOIN class_record ON class_record.id = grade_report.cr_id 
        INNER JOIN schedule ON schedule.sched_id = class_record.sched_id 
        INNER JOIN subject ON subject.subj_id = schedule.subj_id where grade_report.student_number = '$studnum' AND subject.subject_code = '$subjcode'"; 
        $convgrade = $conn-> query($getgrade); 
        $grade=mysqli_fetch_assoc($convgrade); 
        ?>
      <th scope="row"><?php
      if ($grade != "")
      {  

              $final_grade = $grade['tfg'];
              if($final_grade > 98) { $fg_eq = '1.00'; }
              else if($final_grade > 95 && $final_grade < 98) { $fg_eq = '1.25'; }
              else if($final_grade > 92 && $final_grade < 96) { $fg_eq = '1.50'; }
              else if($final_grade > 89 && $final_grade < 93) { $fg_eq = '1.75'; }
              else if($final_grade > 86 && $final_grade < 90) { $fg_eq = '2.00'; }
              else if($final_grade > 83 && $final_grade < 87) { $fg_eq = '2.25'; }
              else if($final_grade > 80 && $final_grade < 84) { $fg_eq = '2.50'; }
              else if($final_grade > 77 && $final_grade < 81) { $fg_eq = '2.75'; }
              else if($final_grade > 74 && $final_grade < 78) { $fg_eq = '3.00'; }
              else if($final_grade < 75) { $fg_eq = '5.00'; }
              else{$fg_eq = $final_grade;} 
      echo $fg_eq; }
      else
      {
        echo "";
      }

       ?></th>
      <td><?php echo $rows['subject_code'];?></td>
      <td><?php echo $rows['subject_title'];?></td>
      <td><?php echo $rows['lecture'];?></td>
      <td><?php echo $rows['laboratory'];?></td>
      <td><?php echo $rows['units'];?></td>
      <td><?php echo $rows['pre_requisite'];?></td>
      </tr>
     <?php $total = $total + $rows['units'];}}?>
    <tfoot class="table-borderless">
    <tr>
      <th colspan="2">Gen Ave</th>
      <td></td>
      <td colspan="2">Total:</td>
      <td><?php echo $total; ?></td>
      <td></td>
    </tr>
    </tfoot>
  </tbody>
</table>
</div>


</div>
</form>
</div>


<!-- SPACER -->
<div class="mx-auto" style="height: 100px;"></div>



<div id="3rdyr">

<div class="d-flex justify-content-center md-5"><h4>THIRD YEAR</h4></div>

<form>
<input type="radio" name="test" id="test-5" class="radio-test"checked="checked"/>
<input type="radio" name="test" id="test-6" class="radio-test" />

<div class="labels">
  <label for="test-5" id="label-test-5" class="label1">1st Sem</label>
  <label for="test-6" id="label-test-6" class="label2">2nd Sem</label>
</div>



<div class="content content-test-5" id="content-test-5">

<div class="table-responsive">
<table class="table table table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col" colspan="7" class="table-color">First Semester</th>
    </tr>
    <tr>
      <th scope="col">Grade</th>
      <th scope="col">Course&nbsp;Code</th>
      <th scope="col">Course&nbsp;Title</th>
      <th scope="col">Lec</th>
      <th scope="col">Lab</th>
      <th scope="col">Units</th>
      <th scope="col">Pre&minus;Req</th>
    </tr>
  </thead>
  <tbody>
   <?php 
      $query = "Select * From subject where curriculum_title ='$curtitle'";
      $result = $conn-> query($query); 
      $total = 0;
      while($rows=mysqli_fetch_assoc($result))
      { 
      $yrsem = $rows['yrsem_id'];
      if($yrsem == "3rdyr1stsem"){
        $subjcode =$rows['subject_code'];?>
      <tr>
       <?php $getgrade = "Select subject.subject_code, grade_report.tfg from grade_report 
        INNER JOIN class_record ON class_record.id = grade_report.cr_id 
        INNER JOIN schedule ON schedule.sched_id = class_record.sched_id 
        INNER JOIN subject ON subject.subj_id = schedule.subj_id where grade_report.student_number = '$studnum' AND subject.subject_code = '$subjcode'"; 
        $convgrade = $conn-> query($getgrade); 
        $grade=mysqli_fetch_assoc($convgrade); 
        ?>
      <th scope="row"><?php
      if ($grade != "")
      {  

              $final_grade = $grade['tfg'];
              if($final_grade > 98) { $fg_eq = '1.00'; }
              else if($final_grade > 95 && $final_grade < 98) { $fg_eq = '1.25'; }
              else if($final_grade > 92 && $final_grade < 96) { $fg_eq = '1.50'; }
              else if($final_grade > 89 && $final_grade < 93) { $fg_eq = '1.75'; }
              else if($final_grade > 86 && $final_grade < 90) { $fg_eq = '2.00'; }
              else if($final_grade > 83 && $final_grade < 87) { $fg_eq = '2.25'; }
              else if($final_grade > 80 && $final_grade < 84) { $fg_eq = '2.50'; }
              else if($final_grade > 77 && $final_grade < 81) { $fg_eq = '2.75'; }
              else if($final_grade > 74 && $final_grade < 78) { $fg_eq = '3.00'; }
              else if($final_grade < 75) { $fg_eq = '5.00'; }
              else{$fg_eq = $final_grade;} 
      echo $fg_eq; }
      else
      {
        echo "";
      }

       ?></th>
      <td><?php echo $rows['subject_code'];?></td>
      <td><?php echo $rows['subject_title'];?></td>
      <td><?php echo $rows['lecture'];?></td>
      <td><?php echo $rows['laboratory'];?></td>
      <td><?php echo $rows['units'];?></td>
      <td><?php echo $rows['pre_requisite'];?></td>
      </tr>
     <?php $total = $total + $rows['units'];}}?>
    <tfoot class="table-borderless">
    <tr>
      <th colspan="2">Gen Ave</th>
      <td></td>
      <td colspan="2">Total:</td>
      <td><?php echo $total; ?></td>
      <td></td>
    </tr>
    </tfoot>
  </tbody>
</table>
</div>


</div>




<div class="content content-test-6" id="content-test-6">            

<div class="table-responsive">
<table class="table table table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col" colspan="7" class="table-color">Second Semester</th>
    </tr>
    <tr>
      <th scope="col">Grade</th>
      <th scope="col">Course&nbsp;Code</th>
      <th scope="col">Course&nbsp;Title</th>
      <th scope="col">Lec</th>
      <th scope="col">Lab</th>
      <th scope="col">Units</th>
      <th scope="col">Pre&minus;Req</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $query = "Select * From subject where curriculum_title ='$curtitle'";
      $result = $conn-> query($query); 
      $total = 0;
      while($rows=mysqli_fetch_assoc($result))
      { 
      $yrsem = $rows['yrsem_id'];
      if($yrsem == "3rdyr2ndsem"){
        $subjcode =$rows['subject_code'];?>
      <tr>
       <?php $getgrade = "Select subject.subject_code, grade_report.tfg from grade_report 
        INNER JOIN class_record ON class_record.id = grade_report.cr_id 
        INNER JOIN schedule ON schedule.sched_id = class_record.sched_id 
        INNER JOIN subject ON subject.subj_id = schedule.subj_id where grade_report.student_number = '$studnum' AND subject.subject_code = '$subjcode'"; 
        $convgrade = $conn-> query($getgrade); 
        $grade=mysqli_fetch_assoc($convgrade); 
        ?>
      <th scope="row"><?php
      if ($grade != "")
      {  

              $final_grade = $grade['tfg'];
              if($final_grade > 98) { $fg_eq = '1.00'; }
              else if($final_grade > 95 && $final_grade < 98) { $fg_eq = '1.25'; }
              else if($final_grade > 92 && $final_grade < 96) { $fg_eq = '1.50'; }
              else if($final_grade > 89 && $final_grade < 93) { $fg_eq = '1.75'; }
              else if($final_grade > 86 && $final_grade < 90) { $fg_eq = '2.00'; }
              else if($final_grade > 83 && $final_grade < 87) { $fg_eq = '2.25'; }
              else if($final_grade > 80 && $final_grade < 84) { $fg_eq = '2.50'; }
              else if($final_grade > 77 && $final_grade < 81) { $fg_eq = '2.75'; }
              else if($final_grade > 74 && $final_grade < 78) { $fg_eq = '3.00'; }
              else if($final_grade < 75) { $fg_eq = '5.00'; }
              else{$fg_eq = $final_grade;} 
      echo $fg_eq; }
      else
      {
        echo "";
      }

       ?></th>
      <td><?php echo $rows['subject_code'];?></td>
      <td><?php echo $rows['subject_title'];?></td>
      <td><?php echo $rows['lecture'];?></td>
      <td><?php echo $rows['laboratory'];?></td>
      <td><?php echo $rows['units'];?></td>
      <td><?php echo $rows['pre_requisite'];?></td>
      </tr>
     <?php $total = $total + $rows['units'];}}?>
    <tfoot class="table-borderless">
    <tr>
      <th colspan="2">Gen Ave</th>
      <td></td>
      <td colspan="2">Total:</td>
      <td><?php echo $total; ?></td>
      <td></td>
    </tr>
    </tfoot>
  </tbody>
</table>
</div>


</div>
</form>
</div>

<!-- SPACER -->
<div class="mx-auto" style="height: 100px;"></div>





<div id="4thyr">

<div class="d-flex justify-content-center md-5"><h4>FOURTH YEAR</h4></div>

<form>
<input type="radio" name="test" id="test-7" class="radio-test"checked="checked"/>
<input type="radio" name="test" id="test-8" class="radio-test" />

<div class="labels">
  <label for="test-7" id="label-test-7" class="label1">1st Sem</label>
  <label for="test-8" id="label-test-8" class="label2">2nd Sem</label>
</div>



<div class="content content-test-7" id="content-test-7">

<div class="table-responsive">
<table class="table table table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col" colspan="7" class="table-color">First Semester</th>
    </tr>
    <tr>
      <th scope="col">Grade</th>
      <th scope="col">Course&nbsp;Code</th>
      <th scope="col">Course&nbsp;Title</th>
      <th scope="col">Lec</th>
      <th scope="col">Lab</th>
      <th scope="col">Units</th>
      <th scope="col">Pre&minus;Req</th>
    </tr>
  </thead>
  <tbody>
   <?php 
      $query = "Select * From subject where curriculum_title ='$curtitle'";
      $result = $conn-> query($query); 
      $total = 0;
      while($rows=mysqli_fetch_assoc($result))
      { 
      $yrsem = $rows['yrsem_id'];
      if($yrsem == "4thyr1stsem"){
        $subjcode =$rows['subject_code'];?>
      <tr>
       <?php $getgrade = "Select subject.subject_code, grade_report.tfg from grade_report 
        INNER JOIN class_record ON class_record.id = grade_report.cr_id 
        INNER JOIN schedule ON schedule.sched_id = class_record.sched_id 
        INNER JOIN subject ON subject.subj_id = schedule.subj_id where grade_report.student_number = '$studnum' AND subject.subject_code = '$subjcode'"; 
        $convgrade = $conn-> query($getgrade); 
        $grade=mysqli_fetch_assoc($convgrade); 
        ?>
      <th scope="row"><?php
      if ($grade != "")
      {  

              $final_grade = $grade['tfg'];
              if($final_grade > 98) { $fg_eq = '1.00'; }
              else if($final_grade > 95 && $final_grade < 98) { $fg_eq = '1.25'; }
              else if($final_grade > 92 && $final_grade < 96) { $fg_eq = '1.50'; }
              else if($final_grade > 89 && $final_grade < 93) { $fg_eq = '1.75'; }
              else if($final_grade > 86 && $final_grade < 90) { $fg_eq = '2.00'; }
              else if($final_grade > 83 && $final_grade < 87) { $fg_eq = '2.25'; }
              else if($final_grade > 80 && $final_grade < 84) { $fg_eq = '2.50'; }
              else if($final_grade > 77 && $final_grade < 81) { $fg_eq = '2.75'; }
              else if($final_grade > 74 && $final_grade < 78) { $fg_eq = '3.00'; }
              else if($final_grade < 75) { $fg_eq = '5.00'; }
              else{$fg_eq = $final_grade;} 
      echo $fg_eq; }
      else
      {
        echo "";
      }

       ?></th>
      <td><?php echo $rows['subject_code'];?></td>
      <td><?php echo $rows['subject_title'];?></td>
      <td><?php echo $rows['lecture'];?></td>
      <td><?php echo $rows['laboratory'];?></td>
      <td><?php echo $rows['units'];?></td>
      <td><?php echo $rows['pre_requisite'];?></td>
      </tr>
     <?php $total = $total + $rows['units'];}}?>
    <tfoot class="table-borderless">
    <tr>
      <th colspan="2">Gen Ave</th>
      <td></td>
      <td colspan="2">Total:</td>
      <td><?php echo $total; ?></td>
      <td></td>
    </tr>
    </tfoot>
  </tbody>
</table>
</div>


</div>




<div class="content content-test-8" id="content-test-8">            

<div class="table-responsive">
<table class="table table table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col" colspan="7" class="table-color">Second Semester</th>
    </tr>
    <tr>
      <th scope="col">Grade</th>
      <th scope="col">Course&nbsp;Code</th>
      <th scope="col">Course&nbsp;Title</th>
      <th scope="col">Lec</th>
      <th scope="col">Lab</th>
      <th scope="col">Units</th>
      <th scope="col">Pre&minus;Req</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $query = "Select * From subject where curriculum_title ='$curtitle'";
      $result = $conn-> query($query); 
      $total =0;
      while($rows=mysqli_fetch_assoc($result))
      { 
      $yrsem = $rows['yrsem_id'];
      if($yrsem == "4thyr2ndsem"){
        $subjcode =$rows['subject_code'];?>
      <tr>
       <?php $getgrade = "Select subject.subject_code, grade_report.tfg from grade_report 
        INNER JOIN class_record ON class_record.id = grade_report.cr_id 
        INNER JOIN schedule ON schedule.sched_id = class_record.sched_id 
        INNER JOIN subject ON subject.subj_id = schedule.subj_id where grade_report.student_number = '$studnum' AND subject.subject_code = '$subjcode'"; 
        $convgrade = $conn-> query($getgrade); 
        $grade=mysqli_fetch_assoc($convgrade); 
        ?>
      <th scope="row"><?php
      if ($grade != "")
      {  

              $final_grade = $grade['tfg'];
              if($final_grade > 98) { $fg_eq = '1.00'; }
              else if($final_grade > 95 && $final_grade < 98) { $fg_eq = '1.25'; }
              else if($final_grade > 92 && $final_grade < 96) { $fg_eq = '1.50'; }
              else if($final_grade > 89 && $final_grade < 93) { $fg_eq = '1.75'; }
              else if($final_grade > 86 && $final_grade < 90) { $fg_eq = '2.00'; }
              else if($final_grade > 83 && $final_grade < 87) { $fg_eq = '2.25'; }
              else if($final_grade > 80 && $final_grade < 84) { $fg_eq = '2.50'; }
              else if($final_grade > 77 && $final_grade < 81) { $fg_eq = '2.75'; }
              else if($final_grade > 74 && $final_grade < 78) { $fg_eq = '3.00'; }
              else if($final_grade < 75) { $fg_eq = '5.00'; }
              else{$fg_eq = $final_grade;} 
      echo $fg_eq; }
      else
      {
        echo "";
      }

       ?></th>
      <td><?php echo $rows['subject_code'];?></td>
      <td><?php echo $rows['subject_title'];?></td>
      <td><?php echo $rows['lecture'];?></td>
      <td><?php echo $rows['laboratory'];?></td>
      <td><?php echo $rows['units'];?></td>
      <td><?php echo $rows['pre_requisite'];?></td>
      </tr>
     <?php $total = $total + $rows['units'];}}?>
    <tfoot class="table-borderless">
    <tr>
      <th colspan="2">Gen Ave</th>
      <td></td>
      <td colspan="2">Total:</td>
      <td><?php echo $total; ?></td>
      <td></td>
    </tr>
    </tfoot>
  </tbody>
</table>
</div>


</div>
</form>
</div>
<!-- SPACER -->
<div class="mx-auto" style="height: 100px;"></div>

<div id="5thyr">
<div class="d-flex justify-content-center md-5"><h4>FIFTH YEAR</h4></div>

<form>
<input type="radio" name="test" id="test-9" class="radio-test"checked="checked"/>
<input type="radio" name="test" id="test-10" class="radio-test" />

<div class="labels">
  <label for="test-9" id="label-test-9" class="label1">1st Sem</label>
  <label for="test-10" id="label-test-10" class="label2">2nd Sem</label>
</div>



<div class="content content-test-9" id="content-test-9">

<div class="table-responsive">
<table class="table table table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col" colspan="9" class="table-color">First Semester</th>
    </tr>
    <tr>
      <th scope="col">Grade</th>
      <th scope="col">Course&nbsp;Code</th>
      <th scope="col">Course&nbsp;Title</th>
      <th scope="col">Lec</th>
      <th scope="col">Lab</th>
      <th scope="col">Units</th>
      <th scope="col">Pre&minus;Req</th>
    </tr>
  </thead>
  <tbody>
   <?php 
      $query = "Select * From subject where curriculum_title ='$curtitle'";
      $result = $conn-> query($query); 
      $total = 0;
      while($rows=mysqli_fetch_assoc($result))
      { 
      $yrsem = $rows['yrsem_id'];
      if($yrsem == "5thyr1stsem"){
        $subjcode =$rows['subject_code'];?>
      <tr>
       <?php $getgrade = "Select subject.subject_code, grade_report.tfg from grade_report 
        INNER JOIN class_record ON class_record.id = grade_report.cr_id 
        INNER JOIN schedule ON schedule.sched_id = class_record.sched_id 
        INNER JOIN subject ON subject.subj_id = schedule.subj_id where grade_report.student_number = '$studnum' AND subject.subject_code = '$subjcode'"; 
        $convgrade = $conn-> query($getgrade); 
        $grade=mysqli_fetch_assoc($convgrade); 
        ?>
      <th scope="row"><?php
      if ($grade != "")
      {  

              $final_grade = $grade['tfg'];
              if($final_grade > 98) { $fg_eq = '1.00'; }
              else if($final_grade > 95 && $final_grade < 98) { $fg_eq = '1.25'; }
              else if($final_grade > 92 && $final_grade < 96) { $fg_eq = '1.50'; }
              else if($final_grade > 89 && $final_grade < 93) { $fg_eq = '1.75'; }
              else if($final_grade > 86 && $final_grade < 90) { $fg_eq = '2.00'; }
              else if($final_grade > 83 && $final_grade < 87) { $fg_eq = '2.25'; }
              else if($final_grade > 80 && $final_grade < 84) { $fg_eq = '2.50'; }
              else if($final_grade > 77 && $final_grade < 81) { $fg_eq = '2.75'; }
              else if($final_grade > 74 && $final_grade < 78) { $fg_eq = '3.00'; }
              else if($final_grade < 75) { $fg_eq = '5.00'; }
              else{$fg_eq = $final_grade;} 
      echo $fg_eq; }
      else
      {
        echo "";
      }

       ?></th>
      <td><?php echo $rows['subject_code'];?></td>
      <td><?php echo $rows['subject_title'];?></td>
      <td><?php echo $rows['lecture'];?></td>
      <td><?php echo $rows['laboratory'];?></td>
      <td><?php echo $rows['units'];?></td>
      <td><?php echo $rows['pre_requisite'];?></td>
      </tr>
     <?php $total = $total + $rows['units'];}}?>
    <tfoot class="table-borderless">
    <tr>
      <th colspan="2">Gen Ave</th>
      <td></td>
      <td colspan="2">Total:</td>
      <td><?php echo $total; ?></td>
      <td></td>
    </tr>
    </tfoot>
  </tbody>
</table>
</div>


</div>




<div class="content content-test-10" id="content-test-10">            

<div class="table-responsive">
<table class="table table table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col" colspan="7" class="table-color">Second Semester</th>
    </tr>
    <tr>
      <th scope="col">Grade</th>
      <th scope="col">Course&nbsp;Code</th>
      <th scope="col">Course&nbsp;Title</th>
      <th scope="col">Lec</th>
      <th scope="col">Lab</th>
      <th scope="col">Units</th>
      <th scope="col">Pre&minus;Req</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $query = "Select * From subject where curriculum_title ='$curtitle'";
      $result = $conn-> query($query); 
      $total =0;
      while($rows=mysqli_fetch_assoc($result))
      { 
      $yrsem = $rows['yrsem_id'];
      if($yrsem == "5thyr2ndsem"){
        $subjcode =$rows['subject_code'];?>
      <tr>
       <?php $getgrade = "Select subject.subject_code, grade_report.tfg from grade_report 
        INNER JOIN class_record ON class_record.id = grade_report.cr_id 
        INNER JOIN schedule ON schedule.sched_id = class_record.sched_id 
        INNER JOIN subject ON subject.subj_id = schedule.subj_id where grade_report.student_number = '$studnum' AND subject.subject_code = '$subjcode'"; 
        $convgrade = $conn-> query($getgrade); 
        $grade=mysqli_fetch_assoc($convgrade); 
        ?>
      <th scope="row"><?php
      if ($grade != "")
      {  

              $final_grade = $grade['tfg'];
              if($final_grade > 98) { $fg_eq = '1.00'; }
              else if($final_grade > 95 && $final_grade < 98) { $fg_eq = '1.25'; }
              else if($final_grade > 92 && $final_grade < 96) { $fg_eq = '1.50'; }
              else if($final_grade > 89 && $final_grade < 93) { $fg_eq = '1.75'; }
              else if($final_grade > 86 && $final_grade < 90) { $fg_eq = '2.00'; }
              else if($final_grade > 83 && $final_grade < 87) { $fg_eq = '2.25'; }
              else if($final_grade > 80 && $final_grade < 84) { $fg_eq = '2.50'; }
              else if($final_grade > 77 && $final_grade < 81) { $fg_eq = '2.75'; }
              else if($final_grade > 74 && $final_grade < 78) { $fg_eq = '3.00'; }
              else if($final_grade < 75) { $fg_eq = '5.00'; }
              else{$fg_eq = $final_grade;} 
      echo $fg_eq; }
      else
      {
        echo "";
      }

       ?></th>
      <td><?php echo $rows['subject_code'];?></td>
      <td><?php echo $rows['subject_title'];?></td>
      <td><?php echo $rows['lecture'];?></td>
      <td><?php echo $rows['laboratory'];?></td>
      <td><?php echo $rows['units'];?></td>
      <td><?php echo $rows['pre_requisite'];?></td>
      </tr>
     <?php $total = $total + $rows['units'];}}?>
    <tfoot class="table-borderless">
    <tr>
      <th colspan="2">Gen Ave</th>
      <td></td>
      <td colspan="2">Total:</td>
      <td><?php echo $total; ?></td>
      <td></td>
    </tr>
    </tfoot>
  </tbody>
</table>
</div>


</div>
</form>
</div>

<!-- SPACER -->
<div class="mx-auto" style="height: 100px;"></div>


</div>



  <!-- Scroll to Top Button -->
  <?php require '../../src/layout/go-to-top.php'; ?>
<script type="text/javascript">

$(document).ready(function() { 
var major = "<?php echo $major; ?>";
if(major == 'No Major')
{
  $('#major').hide();
}


var yeartaken = <?php echo $year; ?>;
if(yeartaken == "1")
{
  $('#2ndyr').hide(); $('#3rdyr').hide(); $('#4thyr').hide(); $('#5thyr').hide();
}
else if(yeartaken == "2")
{
  $('#3rdyr').hide(); $('#4thyr').hide(); $('#5thyr').hide();
}
else if(yeartaken == "3")
{
  $('#4thyr').hide(); $('#5thyr').hide();
}
else if(yeartaken == "4")
{ 
  $('#5thyr').hide();
}
else
{
}
});  

</script>

</body>

</html>
