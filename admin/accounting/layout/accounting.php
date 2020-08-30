<?php
include('../../config/config.php');

$querytf = "SELECT * FROM timeframe WHERE status='Active' AND type='enrollment'";
$resulttf = mysqli_query($conn, $querytf) OR die(mysqli_error($conn));
$result_datatf = mysqli_fetch_assoc($resulttf);

// Enrolled Student
$result1 = mysqli_query($conn, "SELECT * FROM payment WHERE status = 'Enrolled' AND schoolyr = '".$result_datatf['school_year']."' && semester = '".$result_datatf['semester']."' ");
$rows1 = mysqli_num_rows($result1);

// Fully Paid Student
$result2 = mysqli_query($conn, "SELECT * FROM payment WHERE balance = 0 AND schoolyr = '".$result_datatf['school_year']."' && semester = '".$result_datatf['semester']."' ");
$rows2 = mysqli_num_rows($result2);

// Promissory Note
$result3 = mysqli_query($conn, "SELECT * FROM payment WHERE promissory_note = '1' AND schoolyr = '".$result_datatf['school_year']."' && semester = '".$result_datatf['semester']."' ");
$rows3 = mysqli_num_rows($result3);

// Student Balance
$result4 = mysqli_query($conn, "SELECT * FROM payment where balance > 0 AND schoolyr = '".$result_datatf['school_year']."' && semester = '".$result_datatf['semester']."' ");
$rows4 = mysqli_num_rows($result4);

// Midterm Permit
$result5 = mysqli_query($conn, "SELECT * FROM payment where total_cash >= midterm AND md = 1 AND schoolyr = '".$result_datatf['school_year']."' && semester = '".$result_datatf['semester']."' ");
$rows5 = mysqli_num_rows($result5);

// Final Permit
$result6 = mysqli_query($conn, "SELECT * FROM payment where balance = 0 AND fd = 1 AND schoolyr = '".$result_datatf['school_year']."' && semester = '".$result_datatf['semester']."' ");
$rows6 = mysqli_num_rows($result6);

// Entrance Exam
$result7 = mysqli_query($conn, "SELECT * FROM entrance_exam WHERE school_yr = '".$result_datatf['school_year']."' && semester = '".$result_datatf['semester']."' ");
$rows7 = mysqli_num_rows($result7);

// Statement of Account
$result8 = mysqli_query($conn, "SELECT * FROM statement_of_account WHERE schoolyear = '".$result_datatf['school_year']."' && semester = '".$result_datatf['semester']."' ");
$rows8 = mysqli_num_rows($result8);

//  All Transaction
$result9 = mysqli_query($conn, "SELECT * FROM transaction_all WHERE schoolyr = '".$result_datatf['school_year']."' && semester = '".$result_datatf['semester']."' ");
$rows9 = mysqli_num_rows($result9);

// Transaction for Tuition Fees
$result10 = mysqli_query($conn, "SELECT * FROM transaction_fees WHERE schoolyr = '".$result_datatf['school_year']."' && semester = '".$result_datatf['semester']."' ");
$rows10 = mysqli_num_rows($result10);

// Transaction for Other Fees
$result11 = mysqli_query($conn, "SELECT * FROM transaction WHERE schoolyear = '".$result_datatf['school_year']."' && semester = '".$result_datatf['semester']."' ");
$rows11 = mysqli_num_rows($result11);

// Transaction for Other Fees
$result12 = mysqli_query($conn, "SELECT * FROM payment_com WHERE schoolyr = '".$result_datatf['school_year']."' && semester = '".$result_datatf['semester']."' ");
$rows12 = mysqli_num_rows($result12);

// Petition Subject
$result13 = mysqli_query($conn, "SELECT * FROM petition_price WHERE school_year = '".$result_datatf['school_year']."' && semester = '".$result_datatf['semester']."' ");
$rows13 = mysqli_num_rows($result13);

// Scholar of Student
$result14 = mysqli_query($conn, "SELECT * FROM payment_com WHERE scholar = 'Full Scholar' AND schoolyr = '".$result_datatf['school_year']."' && semester = '".$result_datatf['semester']."' ");
$rows14 = mysqli_num_rows($result14);

$result15 = mysqli_query($conn, "SELECT * FROM payment where md = '1' AND schoolyr = '".$result_datatf['school_year']."' && semester = '".$result_datatf['semester']."' ");
$rows15 = mysqli_num_rows($result15);

$result16 = mysqli_query($conn, "SELECT * FROM payment where fd = '1' AND schoolyr = '".$result_datatf['school_year']."' && semester = '".$result_datatf['semester']."' ");
$rows16 = mysqli_num_rows($result16);

?>

<div class="row">

          <div class="col-xl-3 col-sm-6 mb-3"> <!-- Enrolled Students Start Here -->
            <div class="card total-count-card">
                <div class="pt-1 pb-1 student-bg">
                 Enrolled Students
                </div>
              <div class="student-color">

                <span class="float-left"><h4><?php echo $rows1; ?></h4></span>
                <span class="float-right"><h4><i class="fas fa-users"></i></h4></span>

              </div>
              <a class="footer-count pt-1 pb-1 clearfix small z-1 student-bg" href="accounting-dashboard/enrolled.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div> <!-- Enrolled Students End Here -->

          <div class="col-xl-3 col-sm-6 mb-3"> <!-- Fully Paid Students Start Here -->
             <div class="card total-count-card">
                <div class="pt-1 pb-1 new-enrollees-bg">
                  Fully Paid Students
                </div>
              <div class="new-enrollees-color">

                <span class="float-left"><h4><?php echo $rows2; ?></h4></span>
                <span class="float-right"><h4><i class="fas fa-receipt"></i></h4></span>
             
              </div>
              <a class="footer-count pt-1 pb-1 clearfix small z-1 new-enrollees-bg" href="accounting-dashboard/fullypaid.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div> <!-- Fully Paid Students End Here -->

          <div class="col-xl-3 col-sm-6 mb-3"> <!-- Student with Promissory Start Here -->
             <div class="card total-count-card">
                <div class="pt-1 pb-1 subjects-bg ">
                  Student with Promissory
                </div>
              <div class="subjects-color">

                <span class="float-left"><h4><?php echo $rows3; ?></h4></span>
                <span class="float-right"><h4><i class="fas fa-book"></i></h4></span>

              </div>
              <a class="footer-count pt-1 pb-1 clearfix small z-1 subjects-bg " href="accounting-dashboard/promissory.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div> <!-- Student with Promissory End Here -->

          <div class="col-xl-3 col-sm-6 mb-3"> <!-- Student with Balances Start Here -->
             <div class="card total-count-card">
                <div class="pt-1 pb-1 instructor-bg">
                  Student with Balances
                </div>
              <div class="instructor-color ">

                <span class="float-left"><h4><?php echo $rows4; ?></h4></span>
                <span class="float-right"><h4><i class="fas fa-money-check-alt"></i></h4></span>

              </div>
              <a class="footer-count pt-1 pb-1 clearfix small z-1 instructor-bg" href="accounting-dashboard/balances.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>  <!-- Student with Balances End Here -->                   

        </div>




<div class="row">

          <div class="col-xl-3 col-sm-6 mb-3"> <!-- Student with Midterm Permit Start Here -->
            <div class="card total-count-card">
                <div class="pt-1 pb-1 student-bg">
                 Student with Midterm Permit
                </div>
              <div class="student-color">

                <span class="float-left"><h4><?php echo $rows5; ?></h4></span>
                <span class="float-right"><h4><i class="far fa-clipboard"></i></h4></span>

              </div>
              <a class="footer-count pt-1 pb-1 clearfix small z-1 student-bg" href="accounting-dashboard/midterm.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div> <!-- Student with Midterm Permit End Here -->

          <div class="col-xl-3 col-sm-6 mb-3"> <!-- Student with Final Permit Start Here -->
            <div class="card total-count-card">
                <div class="pt-1 pb-1 new-enrollees-bg">
                  Student with Final Permit
                </div>
              <div class="new-enrollees-color">

                <span class="float-left"><h4><?php echo $rows6; ?></h4></span>
                <span class="float-right"><h4><i class="far fa-clipboard"></i></h4></span>

              </div>
              <a class="footer-count pt-1 pb-1 clearfix small z-1 new-enrollees-bg" href="accounting-dashboard/final.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div> <!-- Student with Final Permit End Here -->

          <div class="col-xl-3 col-sm-6 mb-3"> <!-- Entrance Exam Start Here -->
            <div class="card total-count-card">
                <div class="pt-1 pb-1 subjects-bg">
                  Entrance Exam
                </div>
              <div class="subjects-color">
                <span class="float-left"><h4><?php echo $rows7; ?></h4></span>
                <span class="float-right"><h4><i class="far fa-clipboard"></i></h4></span>

              </div>
              <a class="footer-count pt-1 pb-1 clearfix small z-1 subjects-bg" href="accounting-dashboard/entranceexam.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div> <!-- Entrance Exam End Here -->

          <div class="col-xl-3 col-sm-6 mb-3"> <!-- Statement of Account Start Here -->
            <div class="card total-count-card">
                <div class="pt-1 pb-1 instructor-bg">
                  Statement of Account
                </div>
              <div class="instructor-color">

                <span class="float-left"><h4 class="counts"><?php echo $rows8; ?></h4></span>
                <span class="float-right"><h4><i class="far fa-newspaper"></i></h4></span>

              </div>
              <a class="footer-count pt-1 pb-1 clearfix small z-1 instructor-bg" href="accounting-dashboard/statement_of_account.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>   <!-- Statement of Account End Here --> 

        </div>




<div class="row">

          <div class="col-xl-3 col-sm-6 mb-3"> <!-- Transaction for Today Start Here -->
            <div class="card total-count-card">
                <div class="pt-1 pb-1 student-bg">
                 Transaction
                </div>
              <div class="student-color">
                <span class="float-left"><h4><?php echo $rows9; ?></h4></span>
                <span class="float-right"><h4><i class="fas fa-users"></i></h4></span>

              </div>
              <a class="footer-count pt-1 pb-1 clearfix small z-1 student-bg" href="accounting-dashboard/transaction.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div> <!-- Transaction for Today End Here -->

          <div class="col-xl-3 col-sm-6 mb-3"> <!-- Transaction for Tuition Fees Start Here -->
             <div class="card total-count-card">
                <div class="pt-1 pb-1 new-enrollees-bg">
                  Transaction for Tuition Fees
                </div>
              <div class="new-enrollees-color">
                <span class="float-left"><h4><?php echo $rows10; ?></h4></span>
                <span class="float-right"><h4><i class="fas fa-receipt"></i></h4></span>
             
              </div>
              <a class="footer-count pt-1 pb-1 clearfix small z-1 new-enrollees-bg" href="accounting-dashboard/transaction-tuitionfees.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div> <!-- Transaction for Tuition Fees End Here -->

          <div class="col-xl-3 col-sm-6 mb-3"> <!-- Transaction for Other Fees Start Here -->
             <div class="card total-count-card">
                <div class="pt-1 pb-1 subjects-bg ">
                  Transaction for Other Fees
                </div>
              <div class="subjects-color">

                <span class="float-left"><h4><?php echo $rows11; ?></h4></span>
                <span class="float-right"><h4><i class="fas fa-book"></i></h4></span>

              </div>
              <a class="footer-count pt-1 pb-1 clearfix small z-1 subjects-bg " href="accounting-dashboard/transaction-otherfees.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div> <!-- Transaction for Other Fees End Here -->

          <div class="col-xl-3 col-sm-6 mb-3"> <!-- Student of COM Start Here -->
             <div class="card total-count-card">
                <div class="pt-1 pb-1 instructor-bg">
                  Certificate of Matriculation
                </div>
              <div class="instructor-color ">

                <span class="float-left"><h4><?php echo $rows12; ?></h4></span>
                <span class="float-right"><h4><i class="fas fa-money-check-alt"></i></h4></span>

              </div>
              <a class="footer-count pt-1 pb-1 clearfix small z-1 instructor-bg" href="accounting-dashboard/certificate-of-matriculation.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>  <!-- Student of COM End Here -->                   

        </div>

        <div class="row">

          <div class="col-xl-3 col-sm-6 mb-3"> <!-- Petition Subject Start Here -->
            <div class="card total-count-card">
                <div class="pt-1 pb-1 student-bg">
                 Petition Subject
                </div>
              <div class="student-color">
                <span class="float-left"><h4><?php echo $rows13; ?></h4></span>
                <span class="float-right"><h4><i class="far fa-clipboard"></i></h4></span>

              </div>
              <a class="footer-count pt-1 pb-1 clearfix small z-1 student-bg" href="accounting-dashboard/petition_price.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div> <!-- Petition Subject End Here -->

          <div class="col-xl-3 col-sm-6 mb-3"> <!-- Student Scholar Start Here -->
             <div class="card total-count-card">
                <div class="pt-1 pb-1 new-enrollees-bg">
                  Scholar
                </div>
              <div class="new-enrollees-color">
                <span class="float-left"><h4><?php echo $rows14; ?></h4></span>
                <span class="float-right"><h4><i class="fas fa-receipt"></i></h4></span>
             
              </div>
              <a class="footer-count pt-1 pb-1 clearfix small z-1 new-enrollees-bg" href="accounting-dashboard/student-scholar.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div> <!-- Student Scholar End Here -->

          <div class="col-xl-3 col-sm-6 mb-3"> <!-- Transaction for Other Fees Start Here -->
             <div class="card total-count-card">
                <div class="pt-1 pb-1 subjects-bg ">
                  Midterm with Promissory
                </div>
              <div class="subjects-color">

                <span class="float-left"><h4><?php echo $rows15; ?></h4></span>
                <span class="float-right"><h4><i class="fas fa-book"></i></h4></span>

              </div>
              <a class="footer-count pt-1 pb-1 clearfix small z-1 subjects-bg " href="accounting-dashboard/midterm-promi.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div> <!-- Transaction for Other Fees End Here -->

          <div class="col-xl-3 col-sm-6 mb-3"> <!-- Student of COM Start Here -->
             <div class="card total-count-card">
                <div class="pt-1 pb-1 instructor-bg">
                  Finals with promissory
                </div>
              <div class="instructor-color ">

                <span class="float-left"><h4><?php echo $rows16; ?></h4></span>
                <span class="float-right"><h4><i class="fas fa-money-check-alt"></i></h4></span>

              </div>
              <a class="footer-count pt-1 pb-1 clearfix small z-1 instructor-bg" href="accounting-dashboard/finals-promi.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>  <!-- Student of COM End Here -->                   

        </div>
        <br>