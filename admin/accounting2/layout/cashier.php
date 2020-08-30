<?php
include('../../config/config.php');

// Enrolled Student
$result1 = mysqli_query($conn, "SELECT * FROM payment WHERE status = 'Enrolled'");
$rows1 = mysqli_num_rows($result1);

// Fully Paid Student
$result2 = mysqli_query($conn, "SELECT * FROM payment WHERE fully_paid = '1'");
$rows2 = mysqli_num_rows($result2);

// Promissory Note
$result3 = mysqli_query($conn, "SELECT * FROM payment WHERE promissory_note = '1'");
$rows3 = mysqli_num_rows($result3);

// Student Balance
$result4 = mysqli_query($conn, "SELECT * FROM payment where balance > 0");
$rows4 = mysqli_num_rows($result4);


$result = mysqli_query($conn, "SELECT * FROM transaction");
$rows = mysqli_num_rows($result);

$result5 = mysqli_query($conn, "SELECT * FROM entrance_exam");
$rows5 = mysqli_num_rows($result5);

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
              <a class="footer-count pt-1 pb-1 clearfix small z-1 student-bg" href="cashier-dashboard/enrolled.php">
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
              <a class="footer-count pt-1 pb-1 clearfix small z-1 new-enrollees-bg" href="cashier-dashboard/fullypaid.php">
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
              <a class="footer-count pt-1 pb-1 clearfix small z-1 subjects-bg " href="cashier-dashboard/promissory.php">
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

                <span class="float-left"><h4><h4><?php echo $rows4; ?></h4></span>
                <span class="float-right"><h4><i class="fas fa-money-check-alt"></i></h4></span>

              </div>
              <a class="footer-count pt-1 pb-1 clearfix small z-1 instructor-bg" href="cashier-dashboard/balances.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>  <!-- Student with Balances End Here -->                

        </div>
<!-- Cards Total End Here 1 -->



<!-- Cards Total Start Here 2 -->
        <div class="row">

          <div class="col-xl-3 col-sm-6 mb-3"> <!-- Student with Midterm Permit Start Here -->
            <div class="card total-count-card">
                <div class="pt-1 pb-1 sections-bg">
                 Student with Midterm Permit
                </div>
              <div class="sections-color">

                <span class="float-left"><h4>0</h4></span>
                <span class="float-right"><h4><i class="far fa-clipboard"></i></h4></span>

              </div>
              <a class="footer-count pt-1 pb-1 clearfix small z-1 sections-bg" href="cashier-dashboard/midterm.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div> <!-- Student with Midterm Permit End Here -->

          <div class="col-xl-3 col-sm-6 mb-3"> <!-- Student with Final Permit Start Here -->
            <div class="card total-count-card">
                <div class="pt-1 pb-1 admins-bg">
                  Student with Final Permit
                </div>
              <div class="admins-color">

                <span class="float-left"><h4>0</h4></span>
                <span class="float-right"><h4><i class="far fa-clipboard"></i></h4></span>

              </div>
              <a class="footer-count pt-1 pb-1 clearfix small z-1 admins-bg" href="cashier-dashboard/final.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div> <!-- Student with Final Permit End Here -->

          <div class="col-xl-3 col-sm-6 mb-3"> <!-- Transaction Start Here -->
            <div class="card total-count-card">
                <div class="pt-1 pb-1 none-bg">
                  Transaction for (Other Fees)
                </div>
              <div class="admins-color">

                <span class="float-left"><h4><?php echo $rows; ?></h4></span>
                <span class="float-right"><h4><i class="far fa-clipboard"></i></h4></span>

              </div>
              <a class="footer-count pt-1 pb-1 clearfix small z-1 none-bg" href="cashier-dashboard/transaction.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div> <!-- Transaction End Here -->

          <div class="col-xl-3 col-sm-6 mb-3"> <!-- News Start Here -->
            <div class="card total-count-card">
                <div class="pt-1 pb-1 news-bg">
                  Entrance Exam
                </div>
              <div class="news-color">

                <span class="float-left"><h4 class="counts"><?php echo $rows5; ?></h4></span>
                <span class="float-right"><h4><i class="far fa-newspaper"></i></h4></span>

              </div>
              <a class="footer-count pt-1 pb-1 clearfix small z-1 news-bg" href="cashier-dashboard/entrance-exam.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>   <!-- News End Here --> 

          <div class="col-xl-3 col-sm-6 mb-3"> <!-- Enrolled Students Start Here -->
            <div class="card total-count-card">
                <div class="pt-1 pb-1 student-bg">
                 Transaction for (Tuition Fees)
                </div>
              <div class="student-color">

                <span class="float-left"><h4>0</h4></span>
                <span class="float-right"><h4><i class="fas fa-users"></i></h4></span>

              </div>
              <a class="footer-count pt-1 pb-1 clearfix small z-1 student-bg" href="cashier-dashboard/enrolled.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div> <!-- Enrolled Students End Here -->

        </div>