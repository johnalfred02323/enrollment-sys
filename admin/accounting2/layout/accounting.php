<?php
include('../../config/config.php');
$query = mysqli_query($conn, "SELECT * FROM transaction");
$rows = mysqli_num_rows($query);


?>

<div class="row">

          <div class="col-xl-3 col-sm-6 mb-3"> <!-- Enrolled Students Start Here -->
            <div class="card total-count-card">
                <div class="pt-1 pb-1 student-bg">
                 Enrolled Students
                </div>
              <div class="student-color">

                <span class="float-left"><h4>0</h4></span>
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

                <span class="float-left"><h4>0</h4></span>
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

                <span class="float-left"><h4>0</h4></span>
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

                <span class="float-left"><h4>0</h4></span>
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
              <a class="footer-count pt-1 pb-1 clearfix small z-1 sections-bg" href="accounting-dashboard/midterm.php">
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
              <a class="footer-count pt-1 pb-1 clearfix small z-1 admins-bg" href="accounting-dashboard/final.php">
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
                  Transaction
                </div>
              <div class="admins-color">

                <span class="float-left"><h4><?php echo $rows; ?></h4></span>
                <span class="float-right"><h4><i class="far fa-clipboard"></i></h4></span>

              </div>
              <a class="footer-count pt-1 pb-1 clearfix small z-1 none-bg" href="accounting-dashboard/transaction.php">
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

                <span class="float-left"><h4 class="counts">0</h4></span>
                <span class="float-right"><h4><i class="far fa-newspaper"></i></h4></span>

              </div>
              <a class="footer-count pt-1 pb-1 clearfix small z-1 news-bg" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>   <!-- News End Here --> 

        </div>