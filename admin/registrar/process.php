<?php

include('../../config/config.php');
date_default_timezone_set("Asia/Manila");

//for lock code
if(isset($_POST['login']))  
 {
  $uname = $_POST['username'];
  $pass = $_POST['password'];

  $stmt = $pdo_conn->prepare("SELECT username, password FROM user WHERE username = ?");
  $stmt->bindParam(1, $uname);
  $stmt->execute();
  $data = $stmt->fetch();
  $password = $data['password'];
  $verify = password_verify($pass, $password);
  if($verify)
  {
    echo '0';
  }
  else
  {
    echo '1';
  }

 }


if(isset($_POST['enrollmentstart'])){
  $startdate = $_POST['startdate'];
  $stopdate = $_POST['stopdate'];
  $semid = $_POST['sem'];
  $schoolyr = $_POST['schoolyr'];
  $identifier = $_POST['identifier'];

  if($semid == "fs")
  {
    $sem = 'First Semester';
  }
  else if ($semid == "ss")
  {
    $sem = 'Second Semester';
  }
  else
  {
    $sem = 'Summer';
  }
  $result = mysqli_query($conn, "UPDATE timeframe SET status='Inactive' WHERE type='enrollment' ");
  
  if($identifier == '1')
  {
        $stmt = $pdo_conn->prepare("INSERT INTO timeframe (school_year, semester, date_from, date_to,type ,status) VALUES (?,?,?,?,'enrollment','Active')");
        $stmt->bindParam(1, $schoolyr);
        $stmt->bindParam(2, $sem);
        $stmt->bindParam(3, $startdate);
        $stmt->bindParam(4, $stopdate);
        
        if($stmt->execute())
        {
          echo  '<tr>
          <td><input type="date" class="date-table" id="datestart" value="'.$startdate.'"></td>
          <td><input type="date" class="date-table" id="datestop" value="'.$stopdate.'"></td>
        </tr>';
        }
  }
  else
  {
    echo  '<tr>
          <td><input type="date" class="date-table" id="datestart" value=""></td>
          <td><input type="date" class="date-table" id="datestop" value=""></td>
        </tr>
        ';
  }

    exit();
}

if(isset($_POST['enrollment'])){
  $check = mysqli_query($conn, "SELECT * FROM timeframe where status='Active' AND type = 'enrollment'");
  
  if (mysqli_num_rows($check) > 0) 
  {
          $row = mysqli_fetch_assoc($check);
          $currentdate = date('Y-m-d');
          if($row['date_to'] < $currentdate)
          {
            $result = mysqli_query($conn, "UPDATE timeframe SET status='Inactive' WHERE type='enrollment'");
            echo '0';
          }
          else
          {
          echo  '<tr>
          <td><input type="date" class="date-table" id="datestart" value="'.$row['date_from'].'"></td>
          <td><input type="date" class="date-table" id="datestop" value="'.$row['date_to'].'"></td>
          </tr>';
          }
  }
  else
  {
    echo  '<tr>
          <td><input type="date" class="date-table" id="datestart" value=""></td>
          <td><input type="date" class="date-table" id="datestop" value=""></td>
        </tr>';
  }

    exit();
}
//if enrollement has stopped
if(isset($_POST['semesterinfo'])){
  $check = mysqli_query($conn, "SELECT semester,  LEFT(school_year,4) as sy1, RIGHT(school_year,4) as sy2 FROM timeframe ORDER BY id DESC LIMIT 1");
  
  if (mysqli_num_rows($check) > 0) 
  {
          $row = mysqli_fetch_assoc($check);
          $semester = $row['semester'];
          if($semester == 'First Semester')
          {
            $sem = 'fs';
          }
          else if ($semester == 'Second Semester')
          {
            $sem = 'ss';
          }
          else
          {
            $sem = 'sm';
          }
          $sy1 = $row['sy1'];
          $sy2 = $row['sy2'];

          echo json_encode(array('sem' => $sem ,'sy1' => $sy1,'sy2' => $sy2));
  }
  else
  {
          $semester ='';
          $sy1 = '';
          $sy2 = '';

          echo json_encode(array('semester' => $semester ,'sy1' => $sy1,'sy2' => $sy2));
  }

    exit();
}



//for displaying petition subject
if(isset($_POST['getpetitionrequestdata'])){
   //timeframe for checking of school year and semester
    $sy = "SELECT * FROM timeframe ORDER BY id DESC";
    $sysem = mysqli_query($conn, $sy); 
    $syrow = mysqli_fetch_assoc($sysem); 
    $schoolyear = $syrow['school_year'];
    $semester = $syrow['semester'];

  $subjcode = $_POST['subjcode'];
   $result = mysqli_query($conn, "SELECT DISTINCT student_info.firstname, student_info.lastname, student_info.middlename, course.course_abbreviation AS course, course.course_major AS major FROM petition_request
     INNER JOIN student_info ON petition_request.student_number = student_info.student_number 
     INNER JOIN course ON course.course_id = student_info.course_id 
     INNER JOIN subject ON petition_request.subject_code = subject.subject_code where petition_request.subject_code ='$subjcode' AND petition_request.status = 'Requested' AND petition_request.school_year = '$schoolyear' AND petition_request.semester = '$semester'") or die(mysqli_error($conn)); 
  if (mysqli_num_rows($result) > 0) 
  {
          while($row=mysqli_fetch_array($result))
          {
                echo  '<tr>
                 <th scope="row">'.$row['lastname'].', '.$row['firstname'].' '.$row['middlename'].'</th>
                 <td>'.$row['course'].'</td>
                 <td>'.$row['major'].'</td>
                </tr>';
          }
  }
  else
  {
    echo '';
  }
    exit();
  
}

//student list petition Printing

if(isset($_POST['studentlistpetition'])){
$num = 0;
//timeframe for checking of school year and semester
    $sy = "SELECT * FROM timeframe ORDER BY id DESC";
    $sysem = mysqli_query($conn, $sy); 
    $syrow = mysqli_fetch_assoc($sysem); 
    $schoolyear = $syrow['school_year'];
    $semester = $syrow['semester'];

$subjcode = $_POST['subjcode'];
$query1 =  mysqli_query($conn, "SELECT subject.subject_code, subject.subject_title, subject.units FROM petition_request INNER JOIN subject ON petition_request.subject_code = subject.subject_code
  WHERE petition_request.subject_code='$subjcode' AND petition_request.school_year = '$schoolyear' AND petition_request.semester = '$semester' GROUP BY subject.subject_code") or die(mysqli_error($conn));
$rows1=mysqli_fetch_assoc($query1);

$query =  mysqli_query($conn, "SELECT student_info.lastname, student_info.firstname, student_info.middlename, student_info.course, student_info.major FROM petition_request
  INNER JOIN student_info ON petition_request.student_number = student_info.student_number
  INNER JOIN subject ON subject.subject_code = petition_request.subject_code
  WHERE petition_request.subject_code = '$subjcode' AND school_year = '$schoolyear' AND semester = '$semester' AND petition_request.status='Requested' GROUP BY student_info.student_number") or die(mysqli_error($conn));

  $output = '
        <style>
            
            #studentmasterlist {
              font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
              border-collapse: collapse;
              width: 100%;
            }

            #studentmasterlist td, #studentmasterlist th {
              border: 1px solid black;
              padding: 4px;
            }

            #studentmasterlist tr:hover {background-color: black;}

            #studentmasterlist th {
              padding-top: 6px;
              padding-bottom: 6px;
              text-align: left;
              color: black;
            }
        </style>

        <table id="studentmasterlist">
        <center><font size="5" face="sans-serif">GLOBAL RECIPROCAL COLLEGES</font></center>
        <tr><th colspan="3">Subject Code: '.$rows1['subject_code'].'</th>
        <th colspan="3">School Year: '.$schoolyear.'</th></tr>
        <tr><th colspan="3">Subject Title: '.$rows1['subject_title'].'</th>
        <th colspan="3">Semester: '.$semester.'</th></tr>
        <tr><th>No.</th>
        <th>Lastname</th>
        <th>Firstname</th>
        <th>Middlename</th>
        <th>Course</th>
        <th>Major</th></tr>';

  if(mysqli_num_rows($query) > 0)
    {

      while($rows=mysqli_fetch_array($query))
      {
        $num++;
        $output .= '
        <tr><td>'.$num.'</td>
        <td>'.$rows['lastname'].'</td>
        <td>'.$rows['firstname'].'</td>
        <td>'.$rows['middlename'].'</td>
        <td>'.$rows['course'].'</td>
        <td>'.$rows['major'].'</td>
        </tr>';
      }
    }
  else
    {
      $output .= '
        <tr><td>0</td>
        <td colspan="5"><center>No Student Enrolled</center></td>
        </tr>';
    }
        $output .= '
              </table>';
        echo $output;
exit();
}



//for edit


?>