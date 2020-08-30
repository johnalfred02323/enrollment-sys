<?php
include('../../../config/config.php');
error_reporting(0);

 if(isset($_POST['autosearch']))  
 {  
      $output = '';
      $schoolyr = $_POST['schoolyr'];
      $semester = $_POST['semester'];

      $query = "SELECT DISTINCT student_info.student_number
      FROM student_enrollment_record 
      Inner join schedule on schedule.sched_id = student_enrollment_record.sched_id
      Inner join student_info on student_info.student_number = student_enrollment_record.student_number
      
      WHERE (school_year='$schoolyr' AND semester='$semester') OR student_info.student_number LIKE '%".$_POST["query"]."%'";  
      $result = mysqli_query($conn, $query) or die(mysqli_error($conn));  
      $output = '<ul class="list-unstyled" >';

      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '<li>'.$row["student_number"].'</li>';

           }  
      }  
      else  
      {  
           $output .= '<li>Student Number Not Found</li>';  
      }  
      $output .= '</ul>'; 
      echo $output;    
 }  

  if(isset($_POST['getstuddata']))  
 {  
     $output = '';  
      $query = "SELECT student_info.student_number, student_info.lastname, student_info.firstname, student_info.middlename, student_info.suffix,
      student_info.course, student_info.major, student_enrollment_record.enlisted_date, schedule.semester, schedule.school_year
      FROM student_enrollment_record 
      Inner join student_info on student_info.student_number = student_enrollment_record.student_number
      Inner join schedule on schedule.sched_id = student_enrollment_record.sched_id
      WHERE student_info.student_number = '".$_POST["query"]."'"; 
      $result = mysqli_query($conn, $query);

      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  

                 $output = '<br><div class="container m-0" id="studdata">
                      
                        <div class="row"> 

                          <div class="col-sm-4"> 

                            Student Number: <span id="sn">'.$row["student_number"].'</span><br>
                            Name: '.$row["lastname"].',&nbsp;'.$row["firstname"].'&nbsp;'.$row["middlename"].'
                            <br>
                            Suffix: '.$row["suffix"].'
                            <br>
                            Course: '.$row["course"].'&nbsp;&nbsp;&nbsp; Major: '.$row["major"].'

                            <br>
                            <br>
                            
                            <button type="button" id="miscs" class="view-user pull-xs-right edit" data-toggle="modal" data-target="#en_modal" ripple > Tuition Fees</button>
                          </div> 

                          <div class="col-sm-3">

                            <div class="box1">
                                <select name="scholar1" id="scholar" required>
                                    <option hidden>Type of Scholar</option>
                                    <option>Partial Scholar</option>
                                </select>
                            </div>
                            <br>
                            Date: '.$row["enlisted_date"].'

                            <br>
                            Semester: '.$row["semester"].'
                            <br>
                            School Year: '.$row["school_year"].'

                          </div>

                          <div class="col-sm-4"> 

                            <input type="text" class="form-controls" id="or_id" aria-label="Default" placeholder="Official Receipt Number" aria-describedby="inputGroup-sizing-default">
                            <br>

                            <div class="box1">
                            <select name="prome2" id="promi1" required>
                                <option hidden>Remarks</option>
                                <option>None</option>
                                <option>Promissory Note</option>
                            </select>
                            </div>

                            <div class="box1">

                            <select name="samp2" id="samp1" required>
                                <option hidden>Tuition Fees Per Unit</option>
                                <div id="fetchtuitionfees"> </div>
                            </select>
                            </div>

                            </div>

                            <input type="text" class="form-controls" id="lname" aria-label="Default" placeholder="lname" aria-describedby="inputGroup-sizing-default" value="'.$row["lastname"].'" hidden="" >
                            </div>

                            <input type="text" class="form-controls" id="fname" aria-label="Default" placeholder="fname" aria-describedby="inputGroup-sizing-default" value='.$row["firstname"].' hidden="">
                            </div>

                            <input type="text" class="form-controls" id="mname" aria-label="Default" placeholder="mname" aria-describedby="inputGroup-sizing-default" value='.$row["middlename"].' hidden="">
                            </div>

                        </div>

                      </div> 
        
                            </div>';



           }  
      }  
      else  
      {  
        if($row ="")
                 {
                  $output = '<div class="row"><div class="col-sm">Name: No Record </div>  </div>';
                 }
        else
        {
           $output = '<div class="row"><div class="col-sm">Name: No Record </div>  </div>';
        }
 
      }  

      echo $output;  
 }  

  if(isset($_POST['getsubject']))  
 {  
     $output = '';  
      $query = "SELECT DISTINCT subject.subject_code,  subject.units, schedule.sched_id, schedule.section, schedule.lecturehr_from, schedule.lecturehr_to, schedule.laboratoryhr_from, schedule.laboratoryhr_to, schedule.lecture_day, schedule.laboratory_day, schedule.room, subject.subject_title
      FROM student_enrollment_record 
      Inner join student_info on student_info.student_number = student_enrollment_record.student_number
      Inner join subject on subject.subject_code = student_enrollment_record.subject_code
      Inner Join schedule on schedule.sched_id = student_enrollment_record.sched_id
      WHERE student_info.student_number = '".$_POST["query"]."'";
      $result = mysqli_query($conn, $query);

      if(mysqli_num_rows($result) > 0)  
      {   $output = '<br><div class="container m-0" id="subject">
                      
                        <div class="row"> 

                          <div class="col-sm-12"> 

                          <div class="table-responsive p-5">    
                                <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <th scope="col">Subject Code</th>
                                      <th scope="col">Unit/s</th>
                                      <th scope="col">Section</th>
                                      <th scope="col">Time</th>
                                      <th scope="col">Day/s</th>
                                      <th scope="col">Room</th>
                                      <th scope="col">Faculty</th>
                                    </tr>
                                  </thead>
                            </div>
                           ';
           while($row = mysqli_fetch_array($result))  
           {  
                
                          $output .= '<tr><td>'.$row["subject_code"].'</td>
                                        <td class="un1">'.$row["units"].'</td>
                                        <td>'.$row["section"].'</td>
                                        <td>'.$row["lecturehr_from"].' - '.$row["lecturehr_to"].'<br>
                                            '.$row["laboratoryhr_from"].' - '.$row["laboratoryhr_to"].'
                                        </td>
                                        <td>'.$row["lecture_day"].'<br>'.$row["laboratory_day"].'</td>
                                        <td>'.$row["room"].'</td>
                                        <td></td>
                                      </tr>

                          </div> 
                                
                        </div>';
          }  
            $output .= '<tr>
                            
                            <th><center>Total</center></th>
                            <th  colspan="6" id="totalunits"><center></center></th>
                        </tr></div></table>';


            $output .='<br>&nbsp;&nbsp;&nbsp;&nbsp;
                 <div class="row"> 
                          <div class="col-lg-8">

                        <strong>Miscellaneous: <label id="mis1"></label></strong><br>
                        
                        &nbsp;&nbsp;&nbsp;&nbsp;<strong>Tuition Fees: <label id="fees"></label> * <label id="uni1"></label></strong><br>
                        
                        &nbsp;&nbsp;&nbsp;&nbsp;<strong>Amount: <label id="totalamount"></label></strong><br><br>
                        
                        <div class="input-group col-sm-5">
                                <input type="text" class="form-controls" id="cash1" aria-label="Default" placeholder="Cash Rendered" aria-describedby="inputGroup-sizing-default" autocomplete="off">
                        </div>
                        
                        <div class="col-sm-5">BALANCE
                                <input type="text" class="form-controls" id="bal" aria-label="Default" aria-describedby="inputGroup-sizing-default" disabled="">
                        </div>

                          </div>

                          <div class="col-lg-4">
                                
                          
                              <button type="button" id="com" class="view-user pull-xs-right com" ripple > Generate COM</button>



                          </div>
                </div>
            <br>';

      echo $output;  
      }  
      else  
      {  
        if($row ="")
                 {
                  $output = '<div class="row"><div class="col-sm">Name: No Record </div>  </div>';
                 }
        else
        {
           $output = '<div class="row"><div class="col-sm">Name: No Record </div>  </div>';
        }

      echo $output;  
 
      }  

 }  


if(isset($_POST['retrieve']))
{
  $output='';
  $query = "SELECT * FROM tuition_fees";

  $result = mysqli_query($conn, $query);

  while($row = mysqli_fetch_array($result)){
    $output .='<option value="'.$row["tuition_fees"].'">'.$row["tuition_fees"].'</option>';
  }
   echo $output;
   exit();
}




?>
<script>


$(document).ready(function(){  

  // $('#fetchtuitionfees').html("<?php ?>");

  var totmarks=0;
  $(this).find('#totalunits').val();

  $('tr').each(function(){
    
    $(this).find('.un1').each(function(){
      var marks=$(this).text();
      if(marks.length!==0)
      {
        totmarks+=parseFloat(marks);
      }
    });
      $(this).find('#totalunits').html(totmarks);
      
  });

  });


$('#cash1').keyup(function(){

 var numb1 = $('#totalamount').text();
 var numb2 = document.getElementById('cash1').value;
if($(this).val() == '')
{
  $('#bal').val('');
} 
else{
if (numb2 == '' || numb1 == ''){
  
}
else {
   
    var result1 = parseInt(numb2) - parseInt(numb1);
    
  if (result1 >= 0)
   {
   

   $('#bal').val('0');
   
   }

  if (result1 <= 0)
   {
   
   $('#bal').val(Math.abs(result1));
   }
  }  
}
});
</script>