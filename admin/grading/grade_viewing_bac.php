<!-- Head -->
<?php require '../../src/layout/grading/head.php'; 
include('../../config/config.php');

$check_sy_sem = mysqli_query($conn, "SELECT * FROM timeframe WHERE type = 'submission' ORDER BY id DESC LIMIT 1");
$check_sy_sem_data = mysqli_fetch_assoc($check_sy_sem);
?>

<!-- jquery -->
<script src="../../src/vendor/jquery/jquery-3.3.1.min.js"></script>

  <title>GRC | Grading System | Grade Viewing</title>

</head>
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Side Nav -->
    <?php require '../../src/layout/grading/side-nav.php'; ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Top Nav -->
        <?php require '../../src/layout/grading/top-nav.php'; ?>
       <!-- Begin Page Content -->
      <div class="container-fluid">
<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"><a href="index">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Grade Viewing</li>
  </ol>
</nav>
<!-- SPACER -->
<div class="mx-auto" style="height: 50px;"></div>
      <div class="row">
    <div class="col-lg-3">
    </div>
    <div class="col-lg-5">
<div class="input-group mb-3 d-flex justify-content-center d-inline-flex">
  <div class="input-group-prepend">
    <span class="input-group-text" id="">Search</span>
  </div>
  <input type="text" class="form-controls" placeholder="E.g. '2020-01-00001'" aria-label="Search" id="search_student">
</div>
    </div>
    <div class="col-lg-3">
    </div>
  </div>
<div class="card shadow-sm mb-4"> <!-- card start -->

 <!-- Card Header - Dropdown -->
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <label class="container-check">All Courses
      <input type="checkbox" id="checkall">
      <span class="checkmark-check"></span>
    </label>
    <label class="container-check" id="course">BSIT
      <input type="checkbox" class="checkItem" value="BSIT">
      <span class="checkmark-check"></span>
    </label>
    <label class="container-check">BSBA
      <input type="checkbox" class="checkItem" value="BSBA">
      <span class="checkmark-check"></span>
    </label>
    <label class="container-check">BSA
      <input type="checkbox" class="checkItem" value="BSA">
      <span class="checkmark-check"></span>
    </label>
    <label class="container-check">BSE
      <input type="checkbox" class="checkItem" value="BSE">
      <span class="checkmark-check"></span>
    </label>
  </div>

    <div class="card-body" >
    
      <div id="fetch_students">
        <div class="table-responsive">  
          <table class="table table-striped" id="student_table">
            <thead>
              <tr class="table-bordered">
                <th scope="col">Student&nbsp;Number</th>
                <th scope="col">Name</th>
                <th scope="col">Grade&nbsp;Viewing&nbsp;Code</th>
                <th scope="col" class="d-flex justify-content-between align-items-center">Generate&nbsp;<button class="edit-user">Generate&nbsp;All</button></th>
              </tr>
            </thead>
            <tbody>
            <?php $get_students = mysqli_query($conn, "SELECT student_enrollment_record.student_number, student_enrollment_record.sched_id, schedule.sched_id, schedule.semester, schedule.school_year, student_info.student_number, student_info.lastname, student_info.firstname, student_info.middlename, student_info.course FROM student_enrollment_record INNER JOIN schedule ON student_enrollment_record.sched_id = schedule.sched_id INNER JOIN student_info ON student_info.student_number = student_enrollment_record.student_number WHERE school_year = '".$check_sy_sem_data["school_year"]."' AND semester = '".$check_sy_sem_data["semester"]."'") or die(mysqli_error($conn)); 
              
              while ($row = mysqli_fetch_assoc($get_students)) :
            ?>
              <tr>
                <td><?= $row['student_number'] ?></td>
                <td><?= $row['lastname'] ?>, <?= $row['firstname'] ?> <?= substr($row['middlename'], 0, 1) ?></td>
                <td></td>
                <td class="d-flex justify-content-center"><button class="view-user" id="<?= $row['student_number'] ?>">Generate</button></td>
              </tr>
            <?php endwhile;?>
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div> <!-- card end -->

      </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
      <!-- Footer -->
      <?php require '../../src/layout/footer.php'; ?>
    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->
  <!-- Scroll to Top Button -->
  <?php require '../../src/layout/go-to-top.php'; ?>

  <script type="text/javascript">
    
    $(document).ready(function(){
      var get_all = [];
      $('#checkall').prop('checked', true);
      $('.checkItem').prop('checked', true);
      
      $('#checkall').change(function(){
        $('.checkItem').prop('checked', $(this).prop('checked'));
        if($(this).prop('checked') == true) {
           $('.checkItem:checked').each(function(){
            get_all.push($(this).val());
          });
          
        }
        var all = JSON.stringify(get_all);
        $.ajax({
          url:"process.php",
          method:"POST",
          data:{"get_students":1,all:all,semester:"<?php echo $check_sy_sem_data["semester"];?>",school_year:"<?php echo $check_sy_sem_data["school_year"];?>"},
          success:function(data) {
            $('#fetch_students').html(data);
            get_all = [];
          }
        });
        
      });
      $('.checkItem').change(function(){
        if($(this).prop('checked') == false) {
          $('#checkall').prop('checked', false);
        }
        if($('.checkItem:checked').length == $('.checkItem').length) {
          $('#checkall').prop('checked', true);
        } 
      });

      $('.checkItem').click(function(){
        var course = $(this).val();
        
        $('.checkItem:checked').each(function(){
          get_all.push($(this).val());
        });
        var all = JSON.stringify(get_all);
        $.ajax({
          url:"process.php",
          method:"POST",
          data:{"get_students":1,all:all,semester:"<?php echo $check_sy_sem_data["semester"];?>",school_year:"<?php echo $check_sy_sem_data["school_year"];?>"},
          success:function(data) {
            $('#fetch_students').html(data);
            get_all = [];
          }
        });
      });

      $('#search_student').keyup(function(){
        var value = this.value.toLowerCase().trim();

        $("table tr").each(function (index) {
            if (!index) return;
            $(this).find("td").each(function () {
                var id = $(this).text().toLowerCase().trim();
                var not_found = (id.indexOf(value) == -1);
                $(this).closest('tr').toggle(!not_found);
                return not_found;
            });
        });
      });
    });
  </script>


  <!-- Responsive core JavaScript -->
  <script src="../../src/vendor/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript -->
  <script src="../../src/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages -->
  <script src="../../src/js/admin.min.js"></script>

  <!-- Dark Theme -->
  <script src="../../src/js/dark-mode-switch.min.js"></script>
</body>

</html>
