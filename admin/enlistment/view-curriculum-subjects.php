<!-- Head -->
<?php require '../../src/layout/enlistment/head.php'; 
$course2 = $_SESSION['course'];
$major = $_SESSION['major'];
include('../../config/config.php');
$query2 = "SELECT curriculum.curriculum_title, course.course_name, course.course_year AS year ,course.course_abbreviation AS course,course.course_major AS major FROM course INNER JOIN curriculum ON curriculum.course_id = course.course_id where course.course_abbreviation ='$course2' AND course.course_major = '$major'";
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
    $major = "No Data";
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
  </div>
 
<!-- SPACER -->
<div class="mx-auto" style="height: 50px;"></div>



<div id="1styr">
  <?php 
      $query = "Select curriculum.curriculum_title FROM subject
        INNER JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title INNER JOIN course ON curriculum.course_id = course.course_id where course.course_abbreviation ='$course2' AND course.course_major = '$major' AND subject.yrsem_id = '1styr1stsem' AND subject.Status = 'Active'"; 
      $result = $conn-> query($query); 
      $rows=mysqli_fetch_assoc($result);?>


<div class="d-flex justify-content-center md-5"><h4>FIRST YEAR</h4></div>
<div class="d-flex justify-content-center md-5"><h6><?php echo $rows['curriculum_title']; ?></h6></div>

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
      <th scope="col" colspan="6" class="table-color">First Semester</th>
    </tr>
    <tr>
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
      $query2 = "Select subject.subject_code, subject.subject_title, subject.lecture, subject.laboratory, subject.units, subject.pre_requisite FROM subject
        INNER JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title INNER JOIN course ON curriculum.course_id = course.course_id where course.course_abbreviation ='$course2' AND course.course_major = '$major' AND subject.yrsem_id = '1styr1stsem' AND subject.Status = 'Active'"; 
      $result2 = $conn-> query($query2); 
      $total =0;
      while($rows2=mysqli_fetch_assoc($result2))
      {?>
      <tr>
      <td><?php echo $rows2['subject_code'];?></td>
      <td><?php echo $rows2['subject_title'];?></td>
      <td><?php echo $rows2['lecture'];?></td>
      <td><?php echo $rows2['laboratory'];?></td>
      <td><?php echo $rows2['units'];?></td>
      <td><?php echo $rows2['pre_requisite'];?></td>
      </tr>
      <?php $total = $total + $rows2['units'];}?>
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
      <th scope="col" colspan="6" class="table-color">Second Semester</th>
    </tr>
    <tr>
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
      $query3 = "Select subject.subject_code, subject.subject_title, subject.lecture, subject.laboratory, subject.units, subject.pre_requisite FROM subject
        INNER JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title INNER JOIN course ON curriculum.course_id = course.course_id where course.course_abbreviation ='$course2' AND course.course_major = '$major' AND subject.yrsem_id = '1styr2ndsem' AND subject.Status = 'Active'"; 
      $result3 = $conn-> query($query3); 
      $total =0;
      while($rows3=mysqli_fetch_assoc($result3))
      {?>
      <tr>
      <td><?php echo $rows3['subject_code'];?></td>
      <td><?php echo $rows3['subject_title'];?></td>
      <td><?php echo $rows3['lecture'];?></td>
      <td><?php echo $rows3['laboratory'];?></td>
      <td><?php echo $rows3['units'];?></td>
      <td><?php echo $rows3['pre_requisite'];?></td>
      </tr>
      <?php $total = $total + $rows3['units'];}?>
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
  <?php 
      $query = "Select curriculum.curriculum_title FROM subject
        INNER JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title INNER JOIN course ON curriculum.course_id = course.course_id where course.course_abbreviation ='$course2' AND course.course_major = '$major' AND subject.yrsem_id = '2ndyr1stsem' AND subject.Status = 'Active'"; 
      $result = $conn-> query($query); 
      $rows=mysqli_fetch_assoc($result);?>

<div class="d-flex justify-content-center md-5"><h4>SECOND YEAR</h4></div>
<div class="d-flex justify-content-center md-5"><h6><?php echo $rows['curriculum_title']; ?></h6></div>

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
      <th scope="col" colspan="6" class="table-color">First Semester</th>
    </tr>
    <tr>
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
      $query = "Select subject.subject_code, subject.subject_title, subject.lecture, subject.laboratory, subject.units, subject.pre_requisite FROM subject
        INNER JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title INNER JOIN course ON curriculum.course_id = course.course_id where course.course_abbreviation ='$course2' AND course.course_major = '$major' AND subject.yrsem_id = '2ndyr1stsem' AND subject.Status = 'Active'"; 
      $result = $conn-> query($query); 
      $total =0;
      while($rows=mysqli_fetch_assoc($result))
      {?>
      <tr>
      <td><?php echo $rows['subject_code'];?></td>
      <td><?php echo $rows['subject_title'];?></td>
      <td><?php echo $rows['lecture'];?></td>
      <td><?php echo $rows['laboratory'];?></td>
      <td><?php echo $rows['units'];?></td>
      <td><?php echo $rows['pre_requisite'];?></td>
      </tr>
     <?php $total = $total + $rows['units'];}?>
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
      <th scope="col" colspan="6" class="table-color">Second Semester</th>
    </tr>
    <tr>
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
      $query = "Select subject.subject_code, subject.subject_title, subject.lecture, subject.laboratory, subject.units, subject.pre_requisite FROM subject
        INNER JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title INNER JOIN course ON curriculum.course_id = course.course_id where course.course_abbreviation ='$course2' AND course.course_major = '$major' AND subject.yrsem_id = '2ndyr2ndsem' AND subject.Status = 'Active'"; 
      $result = $conn-> query($query); 
      $total =0;
      while($rows=mysqli_fetch_assoc($result))
      {?>
      <tr>
      <td><?php echo $rows['subject_code'];?></td>
      <td><?php echo $rows['subject_title'];?></td>
      <td><?php echo $rows['lecture'];?></td>
      <td><?php echo $rows['laboratory'];?></td>
      <td><?php echo $rows['units'];?></td>
      <td><?php echo $rows['pre_requisite'];?></td>
      </tr>
     <?php $total = $total + $rows['units'];}?>
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
  <?php 
      $query = "Select curriculum.curriculum_title FROM subject
        INNER JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title INNER JOIN course ON curriculum.course_id = course.course_id where course.course_abbreviation ='$course2' AND course.course_major = '$major' AND subject.yrsem_id = '3rdyr1stsem' AND subject.Status = 'Active'"; 
      $result = $conn-> query($query); 
      $rows=mysqli_fetch_assoc($result);?>

<div class="d-flex justify-content-center md-5"><h4>THIRD YEAR</h4></div>
<div class="d-flex justify-content-center md-5"><h6><?php echo $rows['curriculum_title']; ?></h6></div>

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
      <th scope="col" colspan="6" class="table-color">First Semester</th>
    </tr>
    <tr>
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
      $query = "Select subject.subject_code, subject.subject_title, subject.lecture, subject.laboratory, subject.units, subject.pre_requisite FROM subject
        INNER JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title INNER JOIN course ON curriculum.course_id = course.course_id where course.course_abbreviation ='$course2' AND course.course_major = '$major' AND subject.yrsem_id = '3rdyr1stsem' AND subject.Status = 'Active'"; 
      $result = $conn-> query($query); 
      $total =0;
      while($rows=mysqli_fetch_assoc($result))
      {?>
      <tr>
      <td><?php echo $rows['subject_code'];?></td>
      <td><?php echo $rows['subject_title'];?></td>
      <td><?php echo $rows['lecture'];?></td>
      <td><?php echo $rows['laboratory'];?></td>
      <td><?php echo $rows['units'];?></td>
      <td><?php echo $rows['pre_requisite'];?></td>
      </tr>
     <?php $total = $total + $rows['units'];}?>
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
      <th scope="col" colspan="6" class="table-color">Second Semester</th>
    </tr>
    <tr>
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
      $query = "Select subject.subject_code, subject.subject_title, subject.lecture, subject.laboratory, subject.units, subject.pre_requisite FROM subject
        INNER JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title INNER JOIN course ON curriculum.course_id = course.course_id where course.course_abbreviation ='$course2' AND course.course_major = '$major' AND subject.yrsem_id = '3rdyr2ndsem' AND subject.Status = 'Active'"; 
      $result = $conn-> query($query); 
      $total =0;
      while($rows=mysqli_fetch_assoc($result))
      {?>
      <tr>
      <td><?php echo $rows['subject_code'];?></td>
      <td><?php echo $rows['subject_title'];?></td>
      <td><?php echo $rows['lecture'];?></td>
      <td><?php echo $rows['laboratory'];?></td>
      <td><?php echo $rows['units'];?></td>
      <td><?php echo $rows['pre_requisite'];?></td>
      </tr>
     <?php $total = $total + $rows['units'];}?>
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
  <?php 
      $query = "Select curriculum.curriculum_title FROM subject
        INNER JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title INNER JOIN course ON curriculum.course_id = course.course_id where course.course_abbreviation ='$course2' AND course.course_major = '$major' AND subject.yrsem_id = '4thyr1stsem' AND subject.Status = 'Active'"; 
      $result = $conn-> query($query); 
      $rows=mysqli_fetch_assoc($result);?>

<div class="d-flex justify-content-center md-5"><h4>FOURTH YEAR</h4></div>
<div class="d-flex justify-content-center md-5"><h6><?php echo $rows['curriculum_title']; ?></h6></div>

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
      <th scope="col" colspan="6" class="table-color">First Semester</th>
    </tr>
    <tr>
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
      $query = "Select subject.subject_code, subject.subject_title, subject.lecture, subject.laboratory, subject.units, subject.pre_requisite FROM subject
        INNER JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title INNER JOIN course ON curriculum.course_id = course.course_id where course.course_abbreviation ='$course2' AND course.course_major = '$major' AND subject.yrsem_id = '4thyr1stsem' AND subject.Status = 'Active'"; 
      $result = $conn-> query($query); 
      $total =0;
      while($rows=mysqli_fetch_assoc($result))
      {?>
      <tr>
      <td><?php echo $rows['subject_code'];?></td>
      <td><?php echo $rows['subject_title'];?></td>
      <td><?php echo $rows['lecture'];?></td>
      <td><?php echo $rows['laboratory'];?></td>
      <td><?php echo $rows['units'];?></td>
      <td><?php echo $rows['pre_requisite'];?></td>
      </tr>
     <?php $total = $total + $rows['units'];}?>
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
      <th scope="col" colspan="6" class="table-color">Second Semester</th>
    </tr>
    <tr>
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
      $query = "Select subject.subject_code, subject.subject_title, subject.lecture, subject.laboratory, subject.units, subject.pre_requisite FROM subject
        INNER JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title INNER JOIN course ON curriculum.course_id = course.course_id where course.course_abbreviation ='$course2' AND course.course_major = '$major' AND subject.yrsem_id = '4thyr2ndsem' AND subject.Status = 'Active'"; 
      $result = $conn-> query($query); 
      $total =0;
      while($rows=mysqli_fetch_assoc($result))
      {?>
      <tr>
      <td><?php echo $rows['subject_code'];?></td>
      <td><?php echo $rows['subject_title'];?></td>
      <td><?php echo $rows['lecture'];?></td>
      <td><?php echo $rows['laboratory'];?></td>
      <td><?php echo $rows['units'];?></td>
      <td><?php echo $rows['pre_requisite'];?></td>
      </tr>
     <?php $total = $total + $rows['units'];}?>
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
  <?php 
      $query = "Select curriculum.curriculum_title FROM subject
        INNER JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title INNER JOIN course ON curriculum.course_id = course.course_id where course.course_abbreviation ='$course2' AND course.course_major = '$major' AND subject.yrsem_id = '5thyr1stsem' AND subject.Status = 'Active'"; 
      $result = $conn-> query($query); 
      $rows=mysqli_fetch_assoc($result);?>
<div class="d-flex justify-content-center md-5"><h4>FIFTH YEAR</h4></div>
<div class="d-flex justify-content-center md-5"><h6><?php echo $rows['curriculum_title']; ?></h6></div>

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
      <th scope="col" colspan="6" class="table-color">First Semester</th>
    </tr>
    <tr>
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
      $query = "Select subject.subject_code, subject.subject_title, subject.lecture, subject.laboratory, subject.units, subject.pre_requisite FROM subject
        INNER JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title INNER JOIN course ON curriculum.course_id = course.course_id where course.course_abbreviation ='$course2' AND course.course_major = '$major' AND subject.yrsem_id = '5thyr1stsem' AND subject.Status = 'Active'"; 
      $result = $conn-> query($query); 
      $total =0;
      while($rows=mysqli_fetch_assoc($result))
      {?>
      <tr>
      <td><?php echo $rows['subject_code'];?></td>
      <td><?php echo $rows['subject_title'];?></td>
      <td><?php echo $rows['lecture'];?></td>
      <td><?php echo $rows['laboratory'];?></td>
      <td><?php echo $rows['units'];?></td>
      <td><?php echo $rows['pre_requisite'];?></td>
      </tr>
     <?php $total = $total + $rows['units'];}?>
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
      <th scope="col" colspan="6" class="table-color">Second Semester</th>
    </tr>
    <tr>
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
      $query = "Select subject.subject_code, subject.subject_title, subject.lecture, subject.laboratory, subject.units, subject.pre_requisite FROM subject
        INNER JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title INNER JOIN course ON curriculum.course_id = course.course_id where course.course_abbreviation ='$course2' AND course.course_major = '$major' AND subject.yrsem_id = '5thyr2ndsem' AND subject.Status = 'Active'"; 
      $result = $conn-> query($query); 
      $total =0;
      while($rows=mysqli_fetch_assoc($result))
      {?>
      <tr>
      <td><?php echo $rows['subject_code'];?></td>
      <td><?php echo $rows['subject_title'];?></td>
      <td><?php echo $rows['lecture'];?></td>
      <td><?php echo $rows['laboratory'];?></td>
      <td><?php echo $rows['units'];?></td>
      <td><?php echo $rows['pre_requisite'];?></td>
      </tr>
     <?php $total = $total + $rows['units'];}?>
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
var course = "<?php echo $course2; ?>";
if(major == 'No Major')
{
  $('#major').hide();
}
if(course != 'BSA')
{
  $('#5thyr').hide();
}

});

</script>

</body>

</html>
