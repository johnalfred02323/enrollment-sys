<?php

include('../../../config/config.php');

  if(isset($_POST['get_students'])) {
  $course = json_decode($_POST['all']);
  $semester = $_POST['semester'];
  $school_year = $_POST['school_year'];
  $output = '';
  $output .= '<div class="table-responsive table-scroll"><table class="table table-striped" id="student_table">
        <thead>
          <tr class="table-bordered">
            <th scope="col">Student&nbsp;Number</th>
            <th scope="col">Name</th>
            <th scope="col" class="align-items-center">Action</th>
          </tr>
        </thead>
        <tbody>';

  if(count($course) > 0) {
    if(isset($_POST['val'])) {
      $search = $_POST['val'];
        $query = "SELECT petition_request.pet_id, petition_request.subj_id, petition_request.subject_code, petition_request.student_number, student_info.student_number, student_info.lastname, student_info.firstname, student_info.middlename, student_info.course, petition_request.school_year, petition_request.semester, petition_request.status, petition_price.amount FROM petition_request LEFT JOIN student_info ON petition_request.student_number = student_info.student_number LEFT JOIN petition_price ON petition_request.subj_id = petition_price.subj_id WHERE school_year = '".$school_year."' AND semester = '".$semester."' AND petition_request.status = 'Approved' AND (student_info.student_number LIKE '%".$search."%' OR student_info.lastname LIKE '%".$search."%' OR student_info.firstname LIKE '%".$search."%') AND (";
        for($i = 0; $i < count($course); $i++) {
        $query .= " course = '".$course[$i]."' OR";
      }
      }
      else {
        $query = "SELECT petition_request.pet_id, petition_request.subj_id, petition_request.subject_code, petition_request.student_number, student_info.student_number, student_info.lastname, student_info.firstname, student_info.middlename, student_info.course, petition_request.school_year, petition_request.semester, petition_request.status, petition_price.amount FROM petition_request LEFT JOIN student_info ON petition_request.student_number = student_info.student_number LEFT JOIN petition_price ON petition_request.subj_id = petition_price.subj_id WHERE school_year = '".$school_year."' AND semester = '".$semester."' AND petition_request.status = 'Approved' AND (";
        for($i = 0; $i < count($course); $i++) {
        $query .= " course = '".$course[$i]."' OR";
      }
      }

    $query = substr($query, 0, -3);
    $query .= ')';
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if(mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
        $output .= '<tr>
                <td>'.$row['student_number'].'</td>
                <td>'.$row['lastname'].', '.$row['firstname'].' '.substr($row['middlename'], 0,1).'.</td>';
        $output .=  '<td class="d-flex justify-content-center"><button class="view-user transact" data-toggle="modal" data-target="#transaction_modal" id="'.$row['student_number'].'">Transact</button></td>
        </tr>';
      }
    }
    else {
      $output .= "<tr><td colspan='4'><center>No Students to display here with your selection.</center></td></tr>";
    }
  }
  else {
    $output .= "<tr><td colspan='4'><center>Select Course to display Student List</center></td></tr>";
  }
  $output .= "</tbody></table></div>";
  echo $output;
  exit();
}


  if(isset($_POST['fetch_single']))  
 {  
    $sn = $_POST['sn'];
     $output = '';  
      $query = "SELECT petition_request.pet_id, petition_request.subj_id, petition_request.subject_code, petition_request.student_number, student_info.student_number, student_info.lastname, student_info.firstname, student_info.middlename, student_info.course, petition_request.school_year, petition_request.semester, petition_request.status, petition_price.amount FROM petition_request LEFT JOIN student_info ON petition_request.student_number = student_info.student_number LEFT JOIN petition_price ON petition_request.subj_id = petition_price.subj_id WHERE petition_request.student_number = '".$sn."' AND petition_request.school_year = '".$_POST['school_year']."' AND petition_request.semester = '".$_POST['semester']."' AND petition_request.status = 'Approved' ";  
      $result = mysqli_query($conn, $query);

      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  

                 $output = '<div class="container m-0" id="studdata">
                            <div class="row">
                            <div class="col-sm">
                            Student Number: <span id="sn"><b>'.$row["student_number"].'</b></span><br>
                            Name: <span id="fullname"><b>'.$row["lastname"].',&nbsp;'.$row["firstname"].'&nbsp;'.$row["middlename"].'</b></span><br>
                            Course: <b>'.$row["course"].'</b>
                            </div>

                            <div class="col-sm-4">
                            Subject Petition
                            Subject: <span id="subject"><b>'.$row['subject_code'].'</b></span><br>
                            Amount: <span id="price"><b>'.$row['amount'].'</b></span><br>
                            <span id="status" hidden><b>'.$row['status'].'</b></span>
                            <span id="subj" hidden><b>'.$row['subj_id'].'</b></span>
                            <span id="id_val" hidden><b>'.$row['pet_id'].'</b></span>
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

      
      $queryunit = mysqli_query($conn, "SELECT payment.student_number, payment.amount, payment.req_down, payment.midterm, payment.balance, petition_request.student_number FROM payment INNER JOIN petition_request ON payment.student_number = petition_request.student_number WHERE petition_request.student_number = '".$sn."' ") OR die(mysqli_error($conn));
       
       if(mysqli_num_rows($queryunit) > 0)
       {
        
       while($rowunit = mysqli_fetch_array($queryunit))  
           {
            

            $totalunits = $rowunit["amount"];
            $reqdown = $rowunit["req_down"];
            $midterm = $rowunit["midterm"];
            $bal = $rowunit["balance"];
            

            }

            $output .= '<span hidden>Tuition Fees: </strong> <strong id="total1" hidden>'.$totalunits.'</strong> </span>

                        <span id="rq" hidden>'.$reqdown.'<br></span>
                        <span id="md" hidden>'.$midterm.'</span>
                        <span id="bals" hidden>'.$bal.'</span>';

         $output .='';

       }


      echo $output; 
      exit(); 
 }  


if(isset($_POST['addpetid']))  
 {  
    $query = $_POST['query'];
    $price = $_POST['price'];
    $totalall1 = $_POST['totalall1'];
    $totalall2 = $_POST['totalall2'];
    $r1 = $_POST['r1'];
    $r2 = $_POST['r2'];
    $r3 = $_POST['r3'];
    $subj = $_POST['subj'];
    $pet = $_POST['pet'];

    $querylist = "UPDATE payment SET balance = '".$totalall1."', amount = '".$totalall2."', req_down = '".$r1."', midterm = '".$r2."', petition = '".$price."' WHERE student_number ='".$query."'";
    $resultor = mysqli_query($conn, $querylist);

    $querypet = "UPDATE petition_request SET status = 'Accepted' WHERE pet_id ='".$pet."' ";
    $resultpet = mysqli_query($conn, $querypet);


  exit();
  }



?>