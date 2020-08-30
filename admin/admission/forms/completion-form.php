<!-- Head -->
<script>
window.print();
setTimeout('window.close()', 1000);  
</script>

<?php require 'layout/head-forms.php';
require '../../../config/config.php';
$sisnum = $_GET['sisnum'];
$num = explode("&", $_SERVER['QUERY_STRING']);
$count = count($num)-1;
$i = 1;
?>
<script src="../../../src/vendor/jquery/jquery-3.3.1.min.js"></script>

  <title>GRC System | Student Information Sheet</title>

</head>

 <style>
  body
  {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  }
            @page { size: auto;  margin: 8mm; }
            @media print 
            {
              table { page-break-inside:auto }
              tr    { page-break-inside:avoid; page-break-after:auto }
              
              body:before {
              content:url('../../src/img/bg-logo.png');
              position: absolute;
              z-index: -1;
              }
            }
 </style>

  <body id="page-top">

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

          <!-- Begin Page Content -->
          <div class="container">

            <div class="card my-shadow mb-4"> <!-- card start -->

              <!-- Card Header - Dropdown -->

              <div class="container-fuel text-center mb-3 p-3">
              <img class="" src="../../sample/logo-name-dark.png" height="90px" />
              <p class="text-dark">454 GRC Bldg., Rizal Ave., 9<sup>th</sup> Ave. <br/> Grace park, Caloocan City.  <br/> Telfax :361-6330 </p>
              <h3 class="text-dark font-weight-bold">OFFICE OF ADMISSION</h3>
              </div>
<?php

    //for the student details
    $query1 =  mysqli_query($conn, "SELECT * FROM student_info WHERE sisnum = '$sisnum'") or die(mysqli_error($conn));
    $rows1=mysqli_fetch_assoc($query1);
   ?>
              
            
              <div class="card mt-3 mb-4">
                <div class="card-header bg-transparent border-0">
                  <h5 class="m-0">Completion Form</h5>
                </div>
                <div class="card-body">
                
                <div class="form-inline">              
                  <div class="form-group m-0">
                    <label for="">Student Name :</label>
                    <input type="text" id="" class="form-controls resize bg-transparent rounded-0 border-top-0 border-left-0 border-right-0 border-bottom-2 mx-sm-3" value="<?php echo $rows1['lastname']; ?> <?php echo $rows1['firstname']; ?>, <?php echo $rows1['middlename']; ?> <?php echo $rows1['suffix']; ?>" disabled>
                  </div>
                </div>
               

                <div class="form-inline">              
                  <div class="form-group m-0">
                    <label for="">Course & Major :</label>
                    <input type="text" id="" class="form-controls resize bg-transparent rounded-0 border-top-0 border-left-0 border-right-0 border-bottom-2 mx-sm-3" value="<?php echo $rows1['course']; ?> - <?php echo $rows1['major']; ?>" disabled>
                  </div>
                </div>


              <div class="d-flex justify-content-between">
                  <div class="form-inline">              
                    <div class="form-group m-0">
                      <label for="">Student Number :</label>
                      <input type="text" id="" class="form-controls resize bg-transparent rounded-0 border-top-0 border-left-0 border-right-0 border-bottom-2 mx-sm-3" value="<?php echo $rows1['student_number']; ?>" disabled>
                    </div>
                  </div>    


                  <div class="form-inline">              
                    <div class="form-group m-0">
                      <label for="">Date of Completion :</label>
                      <input type="text" id="" class="form-controls resize bg-transparent rounded-0 border-top-0 border-left-0 border-right-0 border-bottom-2 mx-sm-3" value="" disabled>
                    </div>
                  </div>
              </div>               


                <table class="table table-bordered mt-5">
                  <thead>
                    <tr>
                      <th scope="col">Subject</th>
                      <th scope="col">Unit</th>
                      <th scope="col">Year&nbsp;Taken</th>
                      <th scope="col">Instructor</th>
                      <th scope="col">Grade&nbsp;Upon&nbsp;Completion</th>
                      <th scope="col">Remarks</th>
                    </tr>
                  </thead>
                  <tbody>
    <?php
      while($i <= $count)
      {
        $query = $_GET['data'.$i];
        //for the student grade
        $query2 = mysqli_query($conn, "SELECT subject.units, schedule.semester, schedule.school_year, CONCAT(user.lastname,', ',user.firstname,' ', LEFT(user.middlename, 1),'. ') AS fullname FROM grade_report 
          INNER JOIN class_record ON class_record.id = grade_report.cr_id
          INNER JOIN schedule ON schedule.sched_id = class_record.sched_id
          INNER JOIN user ON user.id = schedule.faculty_id
          INNER JOIN subject ON subject.subj_id = schedule.subj_id WHERE subject.subject_code ='$query'") or die(mysqli_error($conn));  
        $row = mysqli_fetch_assoc($query2);
      ?>
                    <tr>
                      <th scope="row"><?php echo $query; ?></th>
                      <td><?php echo $row['units']; ?></td>
                      <td><?php echo $row['semester']; ?> - <?php echo $row['school_year']; ?></td>
                      <td><?php echo $row['fullname']; ?></td>
                      <td></td>
                      <td></td>
                    </tr>
      <?php
      $i++;
      }
      ?>
                  </tbody>
                </table>


<div class="row mt-5">
  <div class="col-12">
    <input type="text" id="" class="form-controls col-4 bg-transparent rounded-0 border-top-0 border-left-0 border-right-0 border-bottom-2 m-0" disabled>
    <small id="passwordHelpBlock" class="form-text text-muted">
      Signature over Printed Name of Faculty In-Charge
    </small>    
  </div>
</div>



<div class="row mt-5">
<div class="col-12">
  <div class="d-flex justify-content-between">
      <div class="form-inline">              
        <div class="form-group m-0">
          <label for="">Noted :</label>
          <input type="text" id="" class="form-controls bg-transparent rounded-0 border-top-0 border-left-0 border-right-0 border-bottom-2 mx-sm-3" value="" disabled>
        </div>
      </div>    


      <div class="form-inline">              
        <div class="form-group m-0">
          <label for="">Received :</label>
          <input type="text" id="" class="form-controls resize bg-transparent rounded-0 border-top-0 border-left-0 border-right-0 border-bottom-2 mx-sm-3" value="" disabled>
        </div>
      </div>
  </div>   
</div>     
</div>


<div class="row mt-5">
<div class="col-12">
  <div class="d-flex justify-content-between">
      <div class="form-inline">              
        <div class="form-group m-0">
          <label for="">Program Head / Dean :</label>
          <input type="text" id="" class="form-controls resize bg-transparent rounded-0 border-top-0 border-left-0 border-right-0 border-bottom-2 mx-sm-3" value="" disabled>
        </div>
      </div>    


      <div class="form-inline">              
        <div class="form-group m-0">
          <label for="">Registrar :</label>
          <input type="text" id="" class="form-controls resize bg-transparent rounded-0 border-top-0 border-left-0 border-right-0 border-bottom-2 mx-sm-3" value="" disabled>
        </div>
      </div>
  </div>   
</div>     
</div>


                </div>
              </div>


<script type="text/javascript">

// Resize Input display depends in value

  $(document).ready(function resizeInput() {

    $(this).attr('size', $(this).val().length);

    $('.resize')
        // event handler
        .keyup(resizeInput);
        // resize on page load
        .each(resizeInput);
      
  });

</script>

               
              </div>
              <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

          </div>
          <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

    <script type="text/javascript">
      var sisnum = '<?php echo $sisnum;?>';
     $.ajax({
      url:"../admission-process.php",
      method:"POST",
      data:{"displayfullname":1,sisnum:sisnum},
      success:function(data){
        var result = $.parseJSON(data);
        $('#stu-name').val(result.fname+" "+result.mname+" "+result.lname);
        $('#cnm').val(result.course+" "+result.major);
        $('#student_number').val(result.student_number);
      }
    });

    </script>

</body>
</html>
