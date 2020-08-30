<?php

include('../../config/config.php');

if(isset($_POST['admissionaddstudentmodal'])){
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
  $mname = $_POST['mname'];
  $suffix = $_POST['suffix'];
	$stutype = $_POST['stutype'];
  $stu_orientation = $_POST['stu_orientation'];
	$con_num = $_POST['con_num'];
	$email = $_POST['email'];
  $bday = $_POST['bday'];
  $bplace = $_POST['bplace'];
  $gender = $_POST['gender'];
  $houseadd = $_POST['houseadd'];
  $city = $_POST['city'];
  $prov = $_POST['prov'];
  $nat = $_POST['nat'];
  $fat_name = $_POST['fat_name'];
  $fat_occ = $_POST['fat_occ'];
  $fat_con_num = $_POST['fat_con_num'];
  $mat_name = $_POST['mat_name'];
  $mat_occ = $_POST['mat_occ'];
  $mat_con_num = $_POST['mat_con_num'];
  $p_school_name = $_POST['p_school_name'];
  $p_school_year = $_POST['p_school_year'];
  $s_school_name = $_POST['s_school_name'];
  $s_school_year = $_POST['s_school_year'];
  $s_school_strand = $_POST['s_school_strand'];
  $t_school_name = $_POST['t_school_name'];
  $t_school_year = $_POST['t_school_year'];
  $t_school_course = $_POST['t_school_course'];

		$stmt = $pdo_conn->prepare("INSERT INTO student_info (firstname, middlename, lastname, suffix, stu_type, stu_orientation, con_num, email, bday, bplace, gender, houseAddress, city, province, nat, fat_name, fat_occ, fat_con_num, mat_name, mat_occ, mat_con_num, p_school_name, p_school_grad, s_school_name, s_school_grad, s_school_strand, t_school_name, t_school_grad, t_school_course) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bindParam(1, $fname);
		$stmt->bindParam(2, $mname);
		$stmt->bindParam(3, $lname);
    $stmt->bindParam(4, $suffix);
		$stmt->bindParam(5, $stutype);
    $stmt->bindParam(6, $stu_orientation);
		$stmt->bindParam(7, $con_num);
		$stmt->bindParam(8, $email);
		$stmt->bindParam(9, $bday);
    $stmt->bindParam(10, $bplace);
    $stmt->bindParam(11, $gender);
    $stmt->bindParam(12, $houseadd);
    $stmt->bindParam(13, $city);
    $stmt->bindParam(14, $prov);
    $stmt->bindParam(15, $nat);
    $stmt->bindParam(16, $fat_name);
    $stmt->bindParam(17, $fat_occ);
    $stmt->bindParam(18, $fat_con_num);
    $stmt->bindParam(19, $mat_name);
    $stmt->bindParam(20, $mat_occ);
    $stmt->bindParam(21, $mat_con_num);
    $stmt->bindParam(22, $p_school_name);
    $stmt->bindParam(23, $p_school_year);
    $stmt->bindParam(24, $s_school_name);
    $stmt->bindParam(25, $s_school_year);
    $stmt->bindParam(26, $s_school_strand);
    $stmt->bindParam(27, $t_school_name);
    $stmt->bindParam(28, $t_school_year);
    $stmt->bindParam(29, $t_school_course);

    if($stmt->execute())
    {
      echo "1";
    }
    else
    {
      echo '0';
    }
    exit();
}    

//update student details

if(isset($_POST['updatestudentdetails'])){
  $sisnum = $_POST['sisnum'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $mname = $_POST['mname'];
  $suffix = $_POST['suffix'];
  $stutype = $_POST['stutype'];
  $stu_orientation = $_POST['stu_orientation'];
  $con_num = $_POST['con_num'];
  $email = $_POST['email'];
  $bday = $_POST['bday'];
  $bplace = $_POST['bplace'];
  $gender = $_POST['gender'];
  $houseadd = $_POST['houseadd'];
  $city = $_POST['city'];
  $prov = $_POST['prov'];
  $nat = $_POST['nat'];
  $fat_name = $_POST['fat_name'];
  $fat_occ = $_POST['fat_occ'];
  $fat_con_num = $_POST['fat_con_num'];
  $mat_name = $_POST['mat_name'];
  $mat_occ = $_POST['mat_occ'];
  $mat_con_num = $_POST['mat_con_num'];
  $p_school_name = $_POST['p_school_name'];
  $p_school_year = $_POST['p_school_year'];
  $s_school_name = $_POST['s_school_name'];
  $s_school_year = $_POST['s_school_year'];
  $s_school_strand = $_POST['s_school_strand'];
  $t_school_name = $_POST['t_school_name'];
  $t_school_year = $_POST['t_school_year'];
  $t_school_course = $_POST['t_school_course'];

    $stmt = $pdo_conn->prepare("UPDATE student_info SET firstname=?, middlename=?, lastname=?, stu_type=?, stu_orientation=?, con_num=?, email=?, bday=?, bplace=?, gender=?, nat=?, fat_name=?, fat_occ=?, fat_con_num=?, mat_name=?, mat_occ=?, mat_con_num=?, p_school_name=?, p_school_grad=?, s_school_name=?, s_school_grad=?, s_school_strand=?, t_school_name=?, t_school_grad=?, t_school_course=?, suffix=?, houseAddress=?, city=?, province=? WHERE sisnum = ?");
    $stmt->bindParam(1, $fname);
    $stmt->bindParam(2, $mname);
    $stmt->bindParam(3, $lname);
    $stmt->bindParam(4, $stutype);
    $stmt->bindParam(5, $stu_orientation);
    $stmt->bindParam(6, $con_num);
    $stmt->bindParam(7, $email);
    $stmt->bindParam(8, $bday);
    $stmt->bindParam(9, $bplace);
    $stmt->bindParam(10, $gender);
    $stmt->bindParam(11, $nat);
    $stmt->bindParam(12, $fat_name);
    $stmt->bindParam(13, $fat_occ);
    $stmt->bindParam(14, $fat_con_num);
    $stmt->bindParam(15, $mat_name);
    $stmt->bindParam(16, $mat_occ);
    $stmt->bindParam(17, $mat_con_num);
    $stmt->bindParam(18, $p_school_name);
    $stmt->bindParam(19, $p_school_year);
    $stmt->bindParam(20, $s_school_name);
    $stmt->bindParam(21, $s_school_year);
    $stmt->bindParam(22, $s_school_strand);
    $stmt->bindParam(23, $t_school_name);
    $stmt->bindParam(24, $t_school_year);
    $stmt->bindParam(25, $t_school_course);
    $stmt->bindParam(26, $suffix);
    $stmt->bindParam(27, $houseadd);
    $stmt->bindParam(28, $city);
    $stmt->bindParam(29, $prov);
    $stmt->bindParam(30, $sisnum);

    if($stmt->execute())
    {
      echo "1";
    }
    else
    {
      echo '0';
    }
    exit();
}    

if(isset($_POST['displayfullname'])){
  $sisnum = $_POST['sisnum'];
  $query = mysqli_query($conn, "SELECT * FROM student_info WHERE sisnum = $sisnum");
  $row = mysqli_fetch_assoc($query);


  $query1 = mysqli_query($conn, "SELECT * FROM admission_student_score WHERE sisnum = $sisnum");
  if(mysqli_num_rows($query1) > 0)
  {
      $row1 = mysqli_fetch_assoc($query1);
      $engave =($row1['english'] * 100) / 20;
      $filave =($row1['filipino'] * 100) / 20;
      $mathave =($row1['math'] * 100) / 20;
      $sciave =($row1['science'] * 100) / 20;
      $engscore =$row1['english'];
      $filscore =$row1['filipino'];
      $mathscore =$row1['math'];
      $sciscore =$row1['science'];
      $totscore =$row1['total_score'];
  }
  else
  {
      $engscore ='';
      $filscore ='';
      $mathscore ='';
      $sciscore ='';
      $engave ='';
      $filave ='';
      $mathave ='';
      $sciave ='';
      $totscore ='';
  }

  $fname= $row['firstname'];
  $mname= $row['middlename']; 
  $lname= $row['lastname'];
  $courseid= $row['course_id']; 
  $student_number= $row['sisnum'];

  $query2 = mysqli_query($conn, "SELECT * FROM course WHERE course_id = '$courseid'") or die(mysqli_error($conn));
  $row2 = mysqli_fetch_assoc($query2);
  if(mysqli_num_rows($query2) > 0)
  {
    $course= $row2['course_abbreviation']; 
    $major= $row2['course_major']; 
  }
  else
  {
    $course='';
    $major='';
  }

  echo json_encode(array('fname' => $fname ,'mname' => $mname ,'lname' => $lname , 'course' => $course , 'major' => $major, 'engscore' => $engscore, 'filscore' => $filscore, 'mathscore' => $mathscore, 'sciscore' => $sciscore, 'engave' => $engave, 'filave' => $filave, 'mathave' => $mathave, 'sciave' => $sciave, 'totscore' => $totscore));
  exit();
  }

  if(isset($_POST['displayfullname3'])){
  $id = $_POST['id'];
  $query = mysqli_query($conn, "SELECT * FROM user WHERE id = $id");
  $row = mysqli_fetch_assoc($query);
  $firstname= $row['firstname'];
  $middlename= $row['middlename']; 
  $lastname= $row['lastname'];
  

  echo json_encode(array('firstname' => $firstname ,'middlename' => $middlename ,'lastname' => $lastname ));
  exit();
  }



  if(isset($_POST['scores'])){
  $sisnum = $_POST['sisnum'];
  $english= $_POST['english'];
  $filipino= $_POST['filipino']; 
  $math= $_POST['math']; 
  $science= $_POST['science']; 
  $total= $_POST['total']; 
  $course= $_POST['course']; 
  $major= $_POST['major']; 



  $check = mysqli_query($conn, "SELECT * FROM admission_student_score WHERE sisnum  = '$sisnum'");
  if(mysqli_num_rows($check) > 0){
    $stmt2 = $pdo_conn->prepare ("UPDATE admission_student_score SET english = ?, filipino = ?, math = ?, science = ?, total_score = ? WHERE sisnum = ?");

    $stmt2->bindParam(1, $english);
    $stmt2->bindParam(2, $filipino);
    $stmt2->bindParam(3, $math);
    $stmt2->bindParam(4, $science);
    $stmt2->bindParam(5, $total);
    $stmt2->bindParam(6, $sisnum);

    if($stmt2->execute())
      {
      }
  }
  else{

  $stmt = $pdo_conn->prepare ("INSERT INTO admission_student_score (sisnum, english, filipino, math, science, total_score)Values (?,?,?,?,?,?)");
  
  $stmt->bindParam(1, $sisnum);
  $stmt->bindParam(2, $english);
  $stmt->bindParam(3, $filipino);
  $stmt->bindParam(4, $math);
  $stmt->bindParam(5, $science);
  $stmt->bindParam(6, $total);

  if($stmt->execute())
    {
    }

  $courseid = '';
  $coursecheck = mysqli_query($conn, "SELECT * FROM course WHERE course_abbreviation ='$course' AND course_major = '$major'");
  if(mysqli_num_rows($coursecheck) > 0)
  {
    $rowcheck = mysqli_fetch_assoc($coursecheck);
    $courseid = $rowcheck['course_id'];
  }
  $stmt1 = $pdo_conn->prepare ("UPDATE student_info SET course_id = ? WHERE sisnum = ?");

  $stmt1->bindParam(1, $courseid);
  $stmt1->bindParam(2, $sisnum);

  if($stmt1->execute())
    {
    }

  }

  $check2 = mysqli_query($conn, "SELECT * FROM student_info WHERE sisnum  = '$sisnum'");
  if(mysqli_num_rows($check2) > 0){
  $row = mysqli_fetch_assoc($check2);
  $studnum = $row['student_number'];
  }
  else
  {
    $studnum = '';
  }
    $query1 = mysqli_query($conn, "SELECT * FROM admission_student_musthave WHERE sisnum = '$sisnum'");
    if(mysqli_num_rows($query1) > 0)
    {
        if($studnum == '')
        {
            $query1 = mysqli_query($conn, "SELECT * FROM student_enrollment_record WHERE student_number = '$sisnum' OR student_number = '$studnum'");
            if(mysqli_num_rows($query1) > 0)
            {
              echo 'admission-final-process';
            } 
            else
            {
              echo 'admission-crediting';
            }
        }
        else
        {
              echo 'admission-final-process';
        }
    } 
    else
    {
      echo 'admission-credentials';
    }

  exit();
}

if(isset($_POST['displayfullname2'])){
  $sisnum = $_POST['sisnum'];
  $query = mysqli_query($conn, "SELECT * FROM student_info WHERE sisnum = $sisnum");
  $row = mysqli_fetch_assoc($query);
  $fname= $row['firstname'];
  $mname= $row['middlename']; 
  $lname= $row['lastname']; 
  $status= $row['stu_orientation'];

  $query2 = mysqli_query($conn, "SELECT * FROM admission_student_musthave WHERE sisnum = $sisnum");
  if(mysqli_num_rows($query2) > 0)
  {
      $row2 = mysqli_fetch_assoc($query2);
      $txt = $row2['txt'];
      $oxo = $row2['oxo'];
      $bc = $row2['barangay_clearance'];
      $pbc = $row2['PBC'];
      $test = $row2['admission_test'];
      $pmc = $row2['PMC'];
      $lbe = $row2['LBE'];
      if($status == 'Transferee')
      {
            //For Transferee
            $query3 = mysqli_query($conn, "SELECT * FROM admission_transfereestudent_credentials WHERE sisnum = $sisnum");
            $row3 = mysqli_fetch_assoc($query3);
            $data1 = $row3['certificate_of_grades'];
            $data2 = $row3['tor'];
            $data3 = $row3['hd'];
            $data4 = $row3['tgmc'];
      }
      else
      {
            //for Freshmen
                $query4 = mysqli_query($conn, "SELECT * FROM admission_freshmenstudent_credentials WHERE sisnum = $sisnum");
                $row4 = mysqli_fetch_assoc($query4);
                $data1 = $row4['form_137A'];
                $data2 = $row4['form_138A'];
                $data3 = $row4['GMC'];
                $data4 = $row4['TRF'];
      }

  }
  else
  {
      $txt = '';
      $oxo = '';
      $bc = '';
      $pbc = '';
      $test = '';
      $pmc = '';
      $lbe = '';
      $data1 = '';
      $data2 = '';
      $data3 = '';
      $data4 = '';
  }

  echo json_encode(array('fname' => $fname ,'mname' => $mname ,'lname' => $lname,'status' => $status, 'data1' => $data1, 'data2' => $data2, 'data3' => $data3, 'data4' => $data4, 'txt' => $txt, 'oxo' => $oxo, 'bc' => $bc, 'pbc' => $pbc, 'test' => $test, 'pmc' => $pmc, 'lbe' => $lbe ));


  exit();
  }

  if(isset($_POST['displayfullname4'])){
  $sisnum = $_POST['sisnum'];
  $query = mysqli_query($conn, "SELECT * FROM student_info WHERE sisnum = $sisnum");
  $row = mysqli_fetch_assoc($query);
  $fname= $row['firstname'];
  $mname= $row['middlename']; 
  $lname= $row['lastname']; 
  $suffix= $row['suffix'];  
  $gender= $row['gender'];   
  $courseid= $row['course_id'];  
  $status= $row['stu_orientation'];
  $count = 0;

  $query3 = mysqli_query($conn, "SELECT * FROM course WHERE course_id = '$courseid'") or die(mysqli_error($conn));
  $row3 = mysqli_fetch_assoc($query3);
  if(mysqli_num_rows($query3) > 0)
  {
    $course= $row3['course_abbreviation']; 
    $major= $row3['course_major']; 
  }
  else
  {
    $course='';
    $major='';
  }

   //timeframe for checking of school year and semester
    $sy = "SELECT * FROM timeframe ORDER BY id DESC";
    $sysem = mysqli_query($conn, $sy); 
    $syrow = mysqli_fetch_assoc($sysem); 
    $schoolyear = $syrow['school_year'];
    $semester = $syrow['semester'];
    $subject = '';

  $query2 = mysqli_query($conn, "SELECT subject.subject_code, subject.subj_id, subject.subject_title,subject.lecture, subject.laboratory, subject.units, subject.pre_requisite, year_and_semester.year, year_and_semester.sem FROM subject 
    INNER JOIN year_and_semester ON subject.yrsem_id = year_and_semester.yrsem_id
    INNER JOIN curriculum ON subject.curriculum_title = curriculum.curriculum_title
    INNER JOIN course ON course.course_id = curriculum.course_id    
    where year_and_semester.year = 'First Year' AND course.course_abbreviation = '$course' AND course.course_major='$major' AND year_and_semester.sem = '$semester' AND subject.status = 'Active'")or die (mysqli_error($conn));
  if(mysqli_num_rows($query2) > 0)
  {
            while($row = mysqli_fetch_array($query2))  
            {
              $count++;
              $subject .= '
                      <tr id="tr'.$count.'">
                        <td style="display:none" class="selectdata">
                          <label class="container-check">
                            <input type="checkbox" class="checkdata" name="subcheck[]">
                            <span class="checkmark-check"></span>
                          </label>
                        </td>
                        <th name="sc[]" scope="row" id="subcode'.$count.'">'.$row['subject_code'].'</th>
                        <td id="title'.$count.'">'.$row['subject_title'].'</td>
                        <td>'.$row['lecture'].'</td>
                        <td>'.$row['laboratory'].'</td>
                        <td id="subunit'.$count.'">'.$row['units'].'</td>
                        <td>'.$row['pre_requisite'].'</td>
                        <td class="actiondata">
                          <button id="'.$count.'" class="view-user pull-xs-right viewsched" data-toggle="modal" data-target="#viewsched" ripple><i class="fas fa-eye"></i> Schedule</button>                          
                        </td>
                      </tr>';
            }
  }
  else
  {

  }


  echo json_encode(array('fname' => $fname ,'mname' => $mname ,'lname' => $lname, 'suffix' => $suffix ,'course' => $course ,'major' => $major ,'gender' => $gender, 'status' => $status, 'subject' => $subject));
  exit();
  }

  //displaying of all result
  if(isset($_POST['displayresult'])){
  $sisnum = $_POST['sisnum'];
  $status = $_POST['status'];

  //for students score
  $query = mysqli_query($conn, "SELECT * FROM admission_student_score WHERE sisnum = $sisnum");
  $row = mysqli_fetch_assoc($query);
  $engscore =($row['english'] / 20) * 100;
  $filscore =($row['filipino'] / 20) * 100;
  $mathscore =($row['math'] / 20) * 100;
  $sciscore =($row['science'] / 20) * 100;
  $tablescore = '
    <tr><th>English</th><td>'.$row['english'].'</td><td>'.$engscore.'</td></tr>
    <tr><th>Filipino</th><td>'.$row['filipino'].'</td><td>'.$filscore.'</td></tr>
    <tr><th>Mathematics</th><td>'.$row['math'].'</td><td>'.$mathscore.'</td></tr>
    <tr><th>Science</th><td>'.$row['science'].'</td><td>'.$sciscore.'</td></tr>';
    $totalave = $row['total_score'];

  //for student requirements

  if($status == 'Transferee')
  {
      //for Transferees
      $query2 = mysqli_query($conn, "SELECT * FROM admission_transfereestudent_credentials WHERE sisnum = $sisnum");
      $row2 = mysqli_fetch_assoc($query2);
      $cog = $row2['certificate_of_grades'];
      $tor = $row2['tor'];
      $hd = $row2['hd'];
      $tgmc = $row2['tgmc'];

    if($cog == '1') 
    {
      $cogdisp = '<label class="container-check">
      <input  type="checkbox" checked disabled><span class="checkmark-check"></span></label>';
    }
    else
    {
      $cogdisp = '<label class="container-check">
      <input  type="checkbox" disabled><span class="checkmark-check"></span></label>';
    }
    if($tor == '1') 
    {
      $tordisp = '<label class="container-check">
      <input  type="checkbox" checked disabled><span class="checkmark-check"></span></label>';
    }
    else
    {
      $tordisp = '<label class="container-check">
      <input  type="checkbox" disabled><span class="checkmark-check"></span></label>';
    }
    if($hd == '1') 
    {
      $hddisp = '<label class="container-check">
      <input  type="checkbox" checked disabled><span class="checkmark-check"></span></label>';
    }
    else
    {
      $hddisp = '<label class="container-check">
      <input  type="checkbox" disabled><span class="checkmark-check"></span></label>';
    }
    if($tgmc == '1') 
    {
      $tgmcdisp = '<label class="container-check">
      <input  type="checkbox" checked disabled><span class="checkmark-check"></span></label>';
    }
    else
    {
      $tgmcdisp = '<label class="container-check">
      <input  type="checkbox" disabled><span class="checkmark-check"></span></label>';
    }
  $tablereq = '
      <tr>
      <th> Certificates of Grade - For Evaluation</th><th>'.$cogdisp.'</th></tr>
      <tr><th>TOR - Copy Of GRC</th><th>'.$tordisp.'</th></tr>
      <tr><th>Honorable Dismissal</th><th>'.$hddisp.'</th></tr>
      <tr><th>Good Moral Character</th><th>'.$tgmcdisp.'</th></tr>';
  }
  else
  {
    //for Freshmen
    $query1 = mysqli_query($conn, "SELECT * FROM admission_freshmenstudent_credentials WHERE sisnum = $sisnum");
    $row1 = mysqli_fetch_assoc($query1);
    $form137 = $row1['form_137A'];
    $form138 = $row1['form_138A'];
    $gmc = $row1['GMC'];
    $trf = $row1['TRF'];
    if($form137 == '1') 
    {
      $form_137disp = '<label class="container-check">
      <input  type="checkbox" checked disabled><span class="checkmark-check"></span></label>';
    }
    else
    {
      $form_137disp = '<label class="container-check">
      <input  type="checkbox" disabled><span class="checkmark-check"></span></label>';
    }
    if($form138 == '1') 
    {
      $form_138disp = '<label class="container-check">
      <input  type="checkbox" checked disabled><span class="checkmark-check"></span></label>';
    }
    else
    {
      $form_138disp = '<label class="container-check">
      <input  type="checkbox" disabled><span class="checkmark-check"></span></label>';
    }
    if($gmc == '1') 
    {
      $gmcdisp = '<label class="container-check">
      <input  type="checkbox" checked disabled><span class="checkmark-check"></span></label>';
    }
    else
    {
      $gmcdisp = '<label class="container-check">
      <input  type="checkbox" disabled><span class="checkmark-check"></span></label>';
    }
    if($trf == '1') 
    {
      $trfdisp = '<label class="container-check">
      <input  type="checkbox" checked disabled><span class="checkmark-check"></span></label>';
    }
    else
    {
      $trfdisp = '<label class="container-check">
      <input  type="checkbox" disabled><span class="checkmark-check"></span></label>';
    }

    $tablereq = '
      <tr>
      <th>Form 137A</th><th>'.$form_137disp.'</th></tr>
      <tr><th>Form 138A</th><th>'.$form_138disp.'</th></tr>
      <tr><th>Good Moral Character</th><th>'.$gmcdisp.'</th></tr>
      <tr><th>TRF/Examinee Report if ALS Graduate</th><th>'.$trfdisp.'</th></tr>';
  }


  //for Must Have Requirements
  $query3 = mysqli_query($conn, "SELECT * FROM admission_student_musthave WHERE sisnum = $sisnum");
  $row3 = mysqli_fetch_assoc($query3);
  $txt = $row3['txt'];
  $oxo = $row3['oxo'];
  $bc = $row3['barangay_clearance'];
  $pbc = $row3['PBC'];
  $test = $row3['admission_test'];
  $pmc = $row3['PMC'];
  $lbe = $row3['LBE'];

    if($txt == '1') 
    {
      $txtdisp = '<label class="container-check">
      <input  type="checkbox" checked disabled><span class="checkmark-check"></span></label>';
    }
    else
    {
      $txtdisp = '<label class="container-check">
      <input  type="checkbox" disabled><span class="checkmark-check"></span></label>';
    }
    if($oxo == '1') 
    {
      $oxodisp = '<label class="container-check">
      <input  type="checkbox" checked disabled><span class="checkmark-check"></span></label>';
    }
    else
    {
      $oxodisp = '<label class="container-check">
      <input  type="checkbox" disabled><span class="checkmark-check"></span></label>';
    }
    if($bc == '1') 
    {
      $bcdisp = '<label class="container-check">
      <input  type="checkbox" checked disabled><span class="checkmark-check"></span></label>';
    }
    else
    {
      $bcdisp = '<label class="container-check">
      <input  type="checkbox" disabled><span class="checkmark-check"></span></label>';
    }
    if($pbc == '1') 
    {
      $pbcdisp = '<label class="container-check">
      <input  type="checkbox" checked disabled><span class="checkmark-check"></span></label>';
    }
    else
    {
      $pbcdisp = '<label class="container-check">
      <input  type="checkbox" disabled><span class="checkmark-check"></span></label>';
    }
    if($test == '1') 
    {
      $testdisp = '<label class="container-check">
      <input  type="checkbox" checked disabled><span class="checkmark-check"></span></label>';
    }
    else
    {
      $testdisp = '<label class="container-check">
      <input  type="checkbox" disabled><span class="checkmark-check"></span></label>';
    }
    if($pmc == '1') 
    {
      $pmcdisp = '<label class="container-check">
      <input  type="checkbox" checked disabled><span class="checkmark-check"></span></label>';
    }
    else
    {
      $pmcdisp = '<label class="container-check">
      <input  type="checkbox" disabled><span class="checkmark-check"></span></label>';
    }
    if($lbe == '1') 
    {
      $lbedisp = '<label class="container-check">
      <input  type="checkbox" checked disabled><span class="checkmark-check"></span></label>';
    }
    else
    {
      $lbedisp = '<label class="container-check">
      <input  type="checkbox" disabled><span class="checkmark-check"></span></label>';
    }

  $musthavetbl = '
    <tr><th>2 pcs. - 2x2 picture (white background w/ nametag)</th><th>'.$txtdisp.'</th></tr>
    <tr><th>2 pcs. - 1x1 picture (white background w/ nametag)</th><th>'.$oxodisp.'</th></tr>
    <tr><th>Barangay Clearance</th><th>'.$bcdisp.'</th></tr>
    <tr><th>Photocopy of Birth Certificate (PSA/NSO)</th><th>'.$pbcdisp.'</th></tr>
    <tr><th>GRC College Admission Test</th><th>'.$testdisp.'</th></tr>
    <tr><th>Photocopy of Marriage Certificate (PSA/NSO)</th><th>'.$pmcdisp.'</th></tr>
    <tr><th>Long Brown Envelope</th><th>'.$lbedisp.'</th></tr>';

  echo json_encode(array('tablescore' => $tablescore ,'totalave' => $totalave ,'tablereq' => $tablereq ,'musthavetbl' => $musthavetbl));



  }


  if(isset($_POST['showscore'])){
  $student_number = $_POST['student_number'];
  $query = mysqli_query($conn, "SELECT * FROM admission_student_score WHERE student_number = $student_number");
  $row = mysqli_fetch_assoc($query);
  $english= $row['english'];
  $math= $row['math']; 


  echo json_encode(array('fname' => $fname ,'mname' => $mname ,'lname' => $lname,'course' => $course ));
  exit();
  }

if(isset($_POST['credentials'])){
  $f137a = $_POST['f137a'];
  $f138a = $_POST['f138a'];
  $fgmc = $_POST['fgmc'];
  $trf = $_POST['trf'];
  $cog = $_POST['cog'];
  $tor = $_POST['tor'];
  $hd = $_POST['hd'];
  $tgmc= $_POST['tgmc'];
  $txt = $_POST['txt'];
  $oxo = $_POST['oxo'];
  $brgyclearance = $_POST['brgyclearance'];
  $psanso = $_POST['psanso'];
  $grcadtest = $_POST['grcadtest'];
  $marrcert = $_POST['marrcert'];
  $lbe = $_POST['lbe'];
  $sisnum = $_POST['sisnum'];

  $check = mysqli_query($conn, "SELECT * FROM student_info where sisnum = '$sisnum'") OR die(mysqli_error($conn));
  if(mysqli_num_rows($check) <= 0)
  {
    echo "0";
  }
  else
  {
    //for student status
    $row = mysqli_fetch_assoc($check);
    $status = $row['stu_orientation'];
    $studnum = $row['student_number'];

    //for checking if student is already done this process
    $check2 = mysqli_query($conn, "SELECT * FROM admission_student_musthave where sisnum = '$sisnum'") OR die(mysqli_error($conn));
    if(mysqli_num_rows($check2) > 0)
    {
                  $stmt = $pdo_conn->prepare ("UPDATE admission_student_musthave SET txt=?, oxo=?, barangay_clearance=?, PBC=?, admission_test=?, PMC=?, LBE=? WHERE sisnum=?");
                  $stmt->bindParam(1, $txt);
                  $stmt->bindParam(2, $oxo);
                  $stmt->bindParam(3, $brgyclearance);
                  $stmt->bindParam(4, $psanso);
                  $stmt->bindParam(5, $grcadtest);
                  $stmt->bindParam(6, $marrcert);
                  $stmt->bindParam(7, $lbe);
                  $stmt->bindParam(8, $sisnum);

          if($stmt->execute())
            {
            }
          if ($status == 'Transferee'){

                  $stmt = $pdo_conn->prepare ("UPDATE admission_transfereestudent_credentials SET certificate_of_grades=?, tor=?, hd=?, tgmc=? WHERE sisnum=?");
                  
                  $stmt->bindParam(1, $cog);
                  $stmt->bindParam(2, $tor);
                  $stmt->bindParam(3, $hd);
                  $stmt->bindParam(4, $tgmc);
                  $stmt->bindParam(5, $sisnum);

                  if($stmt->execute())
                    {
                    }

            }
            else {

            $stmt = $pdo_conn->prepare ("UPDATE admission_freshmenstudent_credentials SET  form_137A=?, form_138A=?, GMC=?, TRF=? WHERE sisnum=?");
            $stmt->bindParam(1, $f137a);
            $stmt->bindParam(2, $f138a);
            $stmt->bindParam(3, $fgmc);
            $stmt->bindParam(4, $trf);
            $stmt->bindParam(5, $sisnum);

            if($stmt->execute())
              {
              }

            }

        if($studnum == '')
        {
          $query1 = mysqli_query($conn, "SELECT * FROM student_enrollment_record WHERE student_number = '$sisnum' OR student_number = '$studnum'");
          if(mysqli_num_rows($query1) > 0)
          {
            echo 'admission-final-process';
          } 
          else
          {
            echo 'admission-crediting';
          }
        }
        else
        {
            echo 'admission-final-process';
        }

    }
    else
    {
          $stmt = $pdo_conn->prepare ("INSERT INTO admission_student_musthave (sisnum, txt, oxo, barangay_clearance, PBC, admission_test, PMC, LBE)Values (?,?,?,?,?,?,?,?)");
                  $stmt->bindParam(1, $sisnum);
                  $stmt->bindParam(2, $txt);
                  $stmt->bindParam(3, $oxo);
                  $stmt->bindParam(4, $brgyclearance);
                  $stmt->bindParam(5, $psanso);
                  $stmt->bindParam(6, $grcadtest);
                  $stmt->bindParam(7, $marrcert);
                  $stmt->bindParam(8, $lbe);

          if($stmt->execute())
            {
            }
          if ($status == 'Transferee'){

                  $stmt = $pdo_conn->prepare ("INSERT INTO admission_transfereestudent_credentials (sisnum, certificate_of_grades, tor, hd, tgmc)Values (?,?,?,?,?)");
                  
                  $stmt->bindParam(1, $sisnum);
                  $stmt->bindParam(2, $cog);
                  $stmt->bindParam(3, $tor);
                  $stmt->bindParam(4, $hd);
                  $stmt->bindParam(5, $tgmc);

                  if($stmt->execute())
                    {
                    }

            }
            else {

            $stm = $pdo_conn->prepare ("INSERT INTO admission_freshmenstudent_credentials (sisnum, form_137A, form_138A, GMC, TRF)Values (?,?,?,?,?)");
            $stmt->bindParam(1, $sisnum);
            $stmt->bindParam(2, $f137a);
            $stmt->bindParam(3, $f138a);
            $stmt->bindParam(4, $fgmc);
            $stmt->bindParam(5, $trf);

            if($stmt->execute())
              {
              }

            }
            echo 'admission-crediting';
    }
  
  }
  exit();
}  


if(isset($_POST['updateuser'])){
	$id = $_POST['id'];
	$user = $_POST['uname'];
	$pass = password_hash($_POST['pass'], PASSWORD_ARGON2I);
	$usertype = $_POST['usertype'];
	$dept = $_POST['dept'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$mname = $_POST['mname'];

	$check = mysqli_query($conn, "SELECT * FROM user WHERE username = '$user'");

	if (mysqli_num_rows($check) > 0) {
		$chk = mysqli_fetch_assoc($check);
		if($chk['id'] == $id){
			$stmt = $pdo_conn->prepare("UPDATE user SET firstname = ?, lastname = ?, middlename = ?, username = ?, password = ?,  usertype = ?, department = ? WHERE id = ?");
			$stmt->bindParam(1, $fname);
			$stmt->bindParam(2, $lname);
			$stmt->bindParam(3, $mname);
			$stmt->bindParam(4, $user);
			$stmt->bindParam(5, $pass);
			$stmt->bindParam(6, $usertype);
			$stmt->bindParam(7, $dept);
			$stmt->bindParam(8, $id);

			if($stmt->execute())
			{
				echo '1';
			}
		}
		else{
			echo '0';
		}
	}
	else{
		$stmt = $pdo_conn->prepare("UPDATE user SET firstname = ?, lastname = ?, middlename = ?, username = ?, password = ?,  usertype = ?, department = ? WHERE id = ?");
		$stmt->bindParam(1, $fname);
		$stmt->bindParam(2, $lname);
		$stmt->bindParam(3, $mname);
		$stmt->bindParam(4, $user);
		$stmt->bindParam(5, $pass);
		$stmt->bindParam(6, $usertype);
		$stmt->bindParam(7, $dept);
		$stmt->bindParam(8, $id);

		if($stmt->execute())
		{
			echo '1';
		}
	}
}

if(isset($_POST['deletestudent'])){
  $studnum = $_POST['studnum'];
  $result = mysqli_query($conn, "DELETE FROM student_info WHERE student_number = '$studnum'");
  echo "Student deleted succesfully";
  exit();
}

if(isset($_POST['edit'])){
	$studnum = $_POST['studnum'];
	$query = "SELECT * FROM student_info WHERE student_number = '$studnum'";
	$result = mysqli_query($conn, $query);
	$output = '';
	if(mysqli_num_rows($result) == 1){
		$row = mysqli_fetch_assoc($result);
		$output .= '
		<div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update User Account</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close" onclick="reset()">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
 
        <div class="modal-body">
		<div class="row">
              <div class="col-lg-6">
        <input type="hidden" id="id_val" value="'.$id.'">
  <div id="edit_f" class="form-group">
    <input id="edit_firstname" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" value="'.$row['firstname'].'">
      <span class="form-highlight"></span>
        <span class="form-bar"></span>
        <label for="firstname" class="float-label" style="font-family:Arial, FontAwesome">First Name</label>
          <erroru>
            First Name is required
              <i>   
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M0 0h24v24h-24z" fill="none"/>
                  <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                </svg>
              </i>
          </erroru>
  </div>



  <div id="edit_l" class="form-group">
    <input id="edit_lastname" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" value="'.$row['lastname'].'">
      <span class="form-highlight"></span>
        <span class="form-bar"></span>
        <label for="lastname" class="float-label" style="font-family:Arial, FontAwesome">Last Name</label>
          <erroru>
            Last Name is required
              <i>   
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M0 0h24v24h-24z" fill="none"/>
                  <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                </svg>
              </i>
          </erroru>
  </div>



  <div id="edit_m" class="form-group">
    <input id="edit_middlename" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" value="'.$row['middlename'].'">
      <span class="form-highlight"></span>
        <span class="form-bar"></span>
        <label for="middlename" class="float-label" style="font-family:Arial, FontAwesome">Middle Name</label>
          <erroru>
            Middle Name is required
              <i>   
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M0 0h24v24h-24z" fill="none"/>
                  <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                </svg>
              </i>
          </erroru>
  </div>



    <div class="box1">
      <label class="select-label">Department</label>
      <select id="edit_department" required>
        <option hidden>Choose Department</option>
        <option value="Accounting">Accounting</option>
        <option value="Admission">Admission</option>
        <option value="Faculty">Faculty</option>
        <option value="Registrar">Registrar</option>
      </select>
    </div>


              </div>

              <div class="col-lg-6">


    <div class="box2">
      <label class="select-label">Usertype</label>
      <select id="edit_usertype" required>
        <option hidden>Choose Usertype</option>
        <option value="Admin">Admin</option>
        <option value="Cashier">Cashier</option>
        <option value="Staff">Staff</option>
        <option value="Faculty">Faculty</option>
      </select>
    </div>

    

  <div id="edit_u" class="form-group">
    <input id="edit_username" spellcheck=false class="form-control" name="username" type="text" size="18" alt="login" required="" value="'.$row['username'].'">
      <span class="form-highlight"></span>
        <span class="form-bar"></span>
        <label for="username" class="float-label" style="font-family:Arial, FontAwesome">Username</label>
          <errorun>
            Username is required
              <i>   
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M0 0h24v24h-24z" fill="none"/>
                  <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                </svg>
              </i>
          </errorun>
  </div>
    
    
  <div id="edit_p" class="form-group">
    <input type="password" id="edit_password" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
      <span toggle="#edit_password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
      <span class="form-highlight"></span>
        <span class="form-bar"></span>
        <label for="password1" class="float-label" style="font-family:Arial, FontAwesome">Password</label>
          <erroru>
            Password is required
              <i>   
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M0 0h24v24h-24z" fill="none"/>
                  <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                </svg>
              </i>
          </erroru>
  </div>
          
    
  <div id="edit_cp" class="form-group">
    <input type="password" id="edit_confirm_pass" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
    <span toggle="#edit_confirm_pass" class="fa fa-fw fa-eye field-icon toggle-password"></span>
      <span class="form-highlight"></span>
        <span class="form-bar"></span>
        <label for="confirm_pass" class="float-label" style="font-family:Arial, FontAwesome">Confirm Password</label>
          <errorp>
            Confirm Password is required
              <i>   
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M0 0h24v24h-24z" fill="none"/>
                  <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                </svg>
              </i>
          </errorp>
  </div>



  <!-- Show PassWord -->
  <script type="text/javascript">
    $(".toggle-password").click(function() {

    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });
  </script>


              </div> <!-- col-lg-6 End -->
  </div> <!-- Row End -->





        </div> <!-- Modal Body End -->

      <div class="modal-footer">
        <button type="button" class="cancel" data-dismiss="modal" onclick="reset()" ripple><i class="fas fa-times"></i> Cancel</button>
        <button type="button" class="save" id="update_btn" ripple><i class="fas fa-pen"></i> Update</button>
      </div>

      </div>
    <script>
    $("#edit_department").change(function(){
	    var val = $(this).val();
	    if(val == "Accounting"){
	      $("#edit_usertype option[value=Cashier]").show();
	      $("#edit_usertype option[value=Staff]").hide();
      $("#usertype option[value=Faculty]").hide();
	    }else if(val == "Faculty"){
      $("#usertype option[value=Staff]").hide();
      $("#usertype option[value=Cashier]").hide();
      $("#usertype option[value=Admin]").hide();
      $("#usertype option[value=Faculty]").show();
      }else{
	      $("#edit_usertype option[value=Cashier]").hide();
	      $("#edit_usertype option[value=Staff]").show();
      $("#usertype option[value=Faculty]").hide();
	    }
	  });

    $("#edit_usertype").val("'.$row['usertype'].'").change();
	$("#edit_department").val("'.$row['department'].'").change();
  
  $("#edit_confirm_pass").keyup(function(){
    var pass = $("#edit_password").val();
    var pmsg = $("erroru");
    var cpmsg = $("errorp");
    var pdiv = $("#edit_p");
    var cpdiv = $("#edit_cp");
    if(pass != $(this).val()){
      cpdiv.attr("errr","");
      cpmsg.html("Password did not match.");
    }else{
      cpdiv.removeAttr("errr");
    }
  });
	</script>
    <script src="update.js"></script>';
	}
	echo $output;
	exit();
}

?>