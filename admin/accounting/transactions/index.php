<?php 
require '../layout/head.php';
require '../../../config/config.php';

$get_ay = mysqli_query($conn, 'SELECT * FROM timeframe WHERE status = "active";');
$get_ay_res = mysqli_fetch_assoc($get_ay);
if(isset($_COOKIE["username"])): ?>
<label id="usercash" hidden=""><?php echo $_COOKIE['username']; ?></label>
<?php endif ?>

<!-- jquery -->
<script src="../../../src/vendor/jquery/jquery-3.3.1.min.js"></script>

<title>GRC System | Accounting</title>
<style>
  .sn {
    cursor: pointer;
  }

  .sn:hover {
    background-color: rgba(255, 0, 0, 0.2);
  }
  /* width */
  ::-webkit-scrollbar {
    width: 10px;
  }

  /* Track */
  ::-webkit-scrollbar-track {
    background: #f1f1f1; 
  }
  
  /* Handle */
  ::-webkit-scrollbar-thumb {
    background: #888; 
  }

  /* Handle on hover */
  ::-webkit-scrollbar-thumb:hover {
    background: #555; 
  }

  #grclogo_anim {
    fill:#DA2129;
    width: 7rem;
    height: 7rem;
    animation: logo_bounce 1s ease-in-out infinite alternate;
    animation-timing-function: cubic-bezier(0.95, 0.15, 0.695, 0.095);
  }

  .st0{
    stroke:#FFFFFF;stroke-width:3;stroke-miterlimit:10;
  }

  @keyframes logo_bounce{
    /* from{
      transform: translateY(0%);
    }
    to{
      transform: translateY(50%);
    } */
    0% {
      transform: translateY(0%);
    }
    50%{
      transform: translateY(50%);
    }
    55%{
      transform: translateY(0%);
    }
    60%{
      transform: rotateY(0deg);
    }
    100%{
      transform: rotateY(1000deg);
    }
  }
</style>
</head>
<body id="page-top">


  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Side Nav -->
    <?php require 'layout/cashier-side-nav.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">


        <!-- Top Nav -->
        <?php require '../layout/cashier-top-nav.php'; ?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <div class="breadcrumb-item active" aria-current="page"><a href="../cashier-dashboard">Dashboard</a></div>
            <div class="breadcrumb-item">Transactions</div>
          </ol>
        </nav>

        <div class="mx-3" style="height: auto;">

          <div class="row my-3 justify-content-between">
            <div class="col-md-7 m-auto" style="font-size: 1.5rem;">
              <div class="form-check-inline mx-4">
                <input class="form-check-input" name="transactions" type="radio" id="tuition_fee_btn" checked>
                <label class="form-check-label" for="tuition_fee_btn">
                  Tuition Fee
                </label>
              </div>
              <div class="form-check-inline mx-4">
                <input class="form-check-input" name="transactions" type="radio" id="other_transaction_btn">
                <label class="form-check-label" for="other_transaction_btn">
                  Other Transaction
                </label>
              </div>
              <div class="form-check-inline mx-4">
                <input class="form-check-input" name="transactions" type="radio" id="petition_subject_btn">
                <label class="form-check-label" for="petition_subject_btn">
                  Petition Subject
                </label>
              </div>
            </div>
            <!-- bg-dark text-success h2 p-4 text-center -->
            <div class="col-md-3">
              <!-- <span>₱ 00.00</span> -->
              <span class="position-absolute text-success h5 m-1">Grand Total:</span>
              <input class="w-100 text-center p-4 h3 disabled bg-dark text-success rounded shadow-lg" type="text" value="₱ 0.00" disabled style="border: none;" id="grand_total">
            </div>
          </div>

          <!-- TUITION FEE TAB -->

          <div id="tuition_fee_tab">
            <div class="w-50 m-auto">
              <div class="input-group">
                  <input type="text" class="form-control p-1" placeholder="Search Student Number" autocomplete="off" id="search_student_number">
                  <span class="btn bg-transparent" style="margin-left: -40px; z-index: 100; cursor: pointer;" onclick="$('#search_student_number').val('')"><i class="fa fa-times"></i></span>
              </div>
              
              <div id="search_result" class="position-absolute bg-secondary text-light shadow rounded-bottom" style="width: 42%; max-height:100%; margin-top: -2px;display: none;z-index: 1;  overflow: auto;">
              </div>
            </div>

            <div class="row" style="border-bottom: 1px solid #ccc; display:none;" id="tft_body">
              <!-- student information -->
              <div class="col-sm" id="student_information">
                <p class="h2 my-4 ml-4 font-weight-bold p-2" style="border-left: 4px solid #e01b1b;">Student Information</p>
                <div class="ml-5 px-3 py-2 h5">
                  <p class="py-2">Student Number: <strong id="tft_stud_num"></strong></p>
                  <p class="py-2">Student Name: <strong id="tft_stud_name"></strong></p>
                  <p class="py-2"><span class="mr-3">Course: <strong id="tft_stud_course"></strong></span><span>Major: <strong id="tft_stud_major"></strong></span></p>
                  <div class="row py-2">
                    <div class="col-sm-4 m-auto">
                      <span>Year Level: <strong id="tft_stud_yearlvl">4th Year</strong></span>
                    </div>
                    <div class="box1 col-sm m-auto">
                      <select class="form-control w-50" id="student_type">
                        <option value="" hidden>Student Type</option>
                        <option value="Regular Student">Regular Student</option>
                        <option value="Irregular Student">Irregular Student</option>
                      </select>
                    </div>
                  </div>
                  <div class="box2 my-2 py-2">
                    <select class="form-control w-50" id="scholar_type">
                      <option value="" hidden>Scholar Type</option>
                      <option value="Partial Scholar">Partial Scholar</option>
                      <option value="Full Scholar">Full Scholar</option>
                    </select>
                  </div>
                </div>
              </div>
              <!-- expenses -->
              <div class="col-sm">
                <p class="h2 my-4 ml-4 font-weight-bold p-2" style="border-left: 4px solid #e01b1b;">Expenses</p>
                <div class="ml-5 px-3 py-2">
                  <div class="box1 py-2">
                    <select class="form-control w-50" id="tf_per_unit">
                      <option value="" hidden>Tuition fee per Unit</option>
                      <option value="150">₱ 150.00</option>
                      <option value="200">₱ 200.00</option>
                    </select>
                  </div>
                  <div class="">Miscellaneous Fee: <strong id="tft_misc_fee"></strong></div>
                  <div style="display: none;" id="other_expe">
                    <div class="">Total Unit Fee: <strong id="tft_total_unit"></strong> * <strong id="tf_per_unit_amount"></strong> = <strong id="tft_unit_fee"></strong></div>
                    <div class="mt-3" style="display: none;" id="tft_w_discount">Discount (10%): <strong id="tft_discount">400</strong></div>
                    <div id="tft_no_discount">
                      <div class="mt-3">Required Downpayment: <strong id="tft_req_dp"></strong></div>
                      <div class="mt-3">Required Amount for Midterm: <strong id="tft_req_4midterm">3080</strong></div>
                      <div class="">Required Amount for Final: <strong id="tft_req_4finals">4400</strong></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-2 mt-5" id="tft_checkbox">
                <label class="container-check">Early Bird
                  <input type="checkbox" id="tft_early_bird">
                  <span class="checkmark-check"></span>
                </label>
                <label class="container-check">Promisorry Note
                  <input type="checkbox" id="tft_promi">
                  <span class="checkmark-check"></span>
                  <span class="text-danger ml-2" style="display: none; cursor: pointer;" id="dp_warning" data-placement="auto" data-toggle="popover2" data-trigger="hover"><i class="fas fa-exclamation-triangle"></i></span>
                </label>

                <div id="popover-title2" style="display:none;">Note:</div>

                <div id="popover-content2" style="display:none;">
                  Required downpayment doesn't meet.<br/>Promisorry note is needed.
                </div>
              </div>
            </div>

            <!-- process -->
            <div class="row mb-3">
              <div class="col-sm p-4 ml-5">
                <div class="my-2">Date: <strong><?php echo date("F j, Y, g:i a"); ?></strong></div>
                <div class="my-2">User Logged On: <strong><?php echo $_COOKIE['name']; ?></strong></div>
              </div>
              <div class="col-sm-4 mt-4">
                <div class="row">
                  <div class="col">
                      <label for="cash_rendered" class="form-label">Cash Rendered</label>
                      <input type="text" class="form-controls" id="cash_rendered" disabled>
                  </div>
                  <div class="col-sm-4">
                      <label for="official_receipt" class="form-label">Official Receipt No.</label>
                      <input type="text" class="form-controls" id="official_receipt" disabled>
                  </div>
                </div>
                <div class="form-group row justify-content-center align-items-center">
                  <label for="balance" class="col-sm-2 col-form-label">Balance</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-controls disabled" id="balance" disabled>
                  </div>
                </div>
                <button class="w-100 btn btn-danger mb-3 disabled" disabled id="process_btn">Process</button>
              </div>
            </div>
          </div>

          <!-- END OF TUITION TAB -->



          <!-- <div class="row my-3">
            <div class="col-sm">
              One of three columns
            </div>
            <div class="col-sm">
              One of three columns
            </div>
            <div class="col-sm">
              One of three columns
            </div>
          </div> -->
        </div>


        </div>
        <!-- /.container-fluid -->
   

      </div>
      <!-- End of Main Content -->


      <!-- Footer -->
      <?php require '../../../src/layout/footer.php'; ?>


    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->


  <!-- Button Effect -->
<script src="../../../src/js/button-effect.js"></script> 


  <!-- Scroll to Top Button -->
  <?php require '../../../src/layout/go-to-top.php'; ?>


<script src="../../../src/vendor/table/js/jquery-3.3.1.min.js"></script>
<script src="../../../src/vendor/table/js/jquery.dataTables.min.js"></script>
<script src="../../../src/vendor/table/js/dataTables.responsive.min.js"></script>

  <!-- Responsive core JavaScript -->
  <script src="../../../src/vendor/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript -->
  <script src="../../../src/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages -->
  <script src="../../../src/js/admin.min.js"></script>

  <!-- Dark Theme -->
  <script src="../../../src/js/dark-mode-switch.min.js"></script>

  <!-- Counter -->
  <script src="../../../src/js/counter.js"></script>

</body>

</html>

<div class="alert-box success">
  <i class="fas fa-check"></i> <span id="successmsg">Successful!</span>    
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>

<div class="alert-box failed" style="max-width: 800px;">
  <i class="far fa-times-circle"></i> <span id="failedmsg">Failed!</span> 
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>

  <!-- Modal Start -->
  <div class="modal fade" id="tft_confirmation_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered justify-content-center" role="document">
      <!-- <div class="text-light">Loading....</div> -->
      <svg version="1.1" id="grclogo_anim" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            viewBox="0 0 602 488" style="enable-background:new 0 0 602 488;" xml:space="preserve">
          
            <path class="st0" d="M421,103c-20.75-0.44-35-2-52,9c-7,5-18,13-24,30c-12.11,34.33-21.92,76.67-23,83c-8,47-39.56,85.77-78,84
	c-34.32-1.58-62.35-32.51-63.93-66.84C178.3,203.72,208.95,172,247,172c17.59,0,47.56,13.5,61.28,36.93
	c0.46,0.78,1.63,0.59,1.82-0.29c1.92-8.72,6.03-25.67,11.36-44.26c0.1-0.36,0-0.74-0.26-1C301.1,143.64,272.24,132,247,132
	c-59.6,0-107.82,48.73-106.99,108.52c0.8,57.63,47.92,108.72,105.47,105.47c34.06-1.93,57.2-12.42,74.52-28.99
	c18.55-17.74,30.28-42.49,37-73c3.22-14.61,19-85,31-97c9-9,16-8,35-8l161.85,1.97c0.5,0.01,0.92-0.35,1-0.85l5.1-32.71
	c0.1-0.61-0.37-1.16-0.99-1.15C564.14,106.56,446.01,103.53,421,103z"/>
            <path class="st0" d="M456,145c-35-0.85-49,15-55,32c-10,32-14,49-17,64c-14.54,72.71-64.1,133-137,133s-133-58.55-133-132
	s59.1-133,132-133c31.37,0,60.14,8.91,82.79,27.18c0.54,0.44,1.35,0.21,1.57-0.45c0.54-1.59,1.09-3.17,1.64-4.73
	c4.72-13.38,12.53-21.17,19.06-26.32c0.51-0.4,0.52-1.18,0.01-1.58C321.8,79.99,285.44,68,245,68c-94.99,0-172,77.01-172,172
	s77.01,172,172,172c106,0,163.7-75.66,180-168c3-17,6.42-31.68,9-42c2-8,4.58-14.47,9-18c5-4,11.13-3,21-3l114.42,1.22
	c0.5,0.01,0.92-0.35,1-0.85l5.33-34.18c0.09-0.6-0.37-1.15-0.98-1.15L456,145z"/>
            <path class="st0" d="M476,186.01c-16,6-19.57,42.87-22,57c-21,122-97.2,193.33-206,193.33S51,348.89,51,241.01
	S139.2,45.68,248,45.68c56.91,0,87.6,9.88,131.78,46.64c8.52-1.06,17.51-0.54,28.22-0.32c4.49,0.1,11.99,0.27,21.41,0.49
	c-0.01-0.1-0.05-0.19-0.12-0.28C382,37,317.36,9.01,247,9.01c-130.34,0-236,104.77-236,234s105.66,234,236,234
	s227.09-100.41,243-233c3-25,7-22,17-22c14.07,0,58.32,0.72,65.08,0.83c0.5,0.01,0.93-0.35,1-0.85l5.44-34.85
	c0.09-0.6-0.36-1.14-0.96-1.15C566.74,185.77,482.55,184.13,476,186.01z"/>
      </svg>
    </div>
  </div> <!-- Modal End -->

<script>
$("[data-toggle=popover2]").popover({
  trigger: 'hover',
  html: true,
  title: function() {
    return $('#popover-title2').html();
  },
  content: function() {
    return $('#popover-content2').html();
  }
});

function ordinal_suffix_of(i) {
    var j = i % 10,
        k = i % 100;
    if (j == 1 && k != 11) {
        return i + "st";
    }
    if (j == 2 && k != 12) {
        return i + "nd";
    }
    if (j == 3 && k != 13) {
        return i + "rd";
    }
    return i + "th";
}

var grand_total = 0, disc_grand_total = 0;

$(document).on('click', '.close-result', function(){
  $('#search_result').slideUp('fast');
});

$('#search_student_number').focus(function() {
  $('#search_result').slideDown('fast');
});

$('#search_student_number').keyup(function() {
  var val = $(this).val();
  $.ajax({
    url:"process.php",
    method:"POST",
    data:{"search-student":1,val:val},
    success:function(data) {
      $('#search_result').html(data);
      $('#search_result').slideDown('fast');
    }
  });
});

$(document).on('click', '.sn', function(){
  var sn = $(this).attr('id');
  $('#search_student_number').val(sn);
  $('#search_result').slideUp('fast');

  $.ajax({
    url:"process.php",
    method:"POST",
    data:{'get_data':1,sn:sn,'school_yr':'<?php echo $get_ay_res['school_year'];?>','semester':'<?php echo $get_ay_res['semester'];?>'},
    success:function(data) {
      $('#tft_body').slideDown('slow');
      var result = $.parseJSON(data);
      $('#tft_stud_num').text(result['student_number']);
      $('#tft_stud_name').text(result['full_name']);
      $('#tft_stud_course').text(result['course']);
      $('#tft_stud_major').text(result['major']);
      $('#tft_stud_yearlvl').text(ordinal_suffix_of(result['year_lvl']));
      $('#tft_misc_fee').text(parseInt(result['misc_fee']).toLocaleString());
      $('#tft_misc_fee').attr('name', result['misc_fee']);
      $('#tft_total_unit').text(result['total_units']);

      $('#cash_rendered').removeAttr('disabled');
      $('#official_receipt').removeAttr('disabled');
      $('#process_btn').removeAttr('disabled');
      $('#process_btn').removeClass('disabled');

      $('#tf_per_unit').focus();
      console.log(data);
    }
  });
 
$('#tf_per_unit').change(function(){
  var val = $(this).val();
  var total_unit = $('#tft_total_unit').text();
  $('#other_expe').slideDown('fast');
  $('#tf_per_unit_amount').text(val);
  var result = parseFloat(val) * parseFloat(total_unit);
  $('#tft_unit_fee').text(result.toLocaleString());

  $('#tft_checkbox :checkbox').prop('checked', false);
  $('#tft_w_discount').hide();
  $('#tft_no_discount').show();

  var misc_fee = $('#tft_misc_fee').attr('name');
  grand_total = parseInt(misc_fee) + result;
  // $('#grand_total').val('₱ '+grand_total.toLocaleString()+'.00');
  $('#grand_total').prop('Counter', 0).animate({
    Counter: grand_total
  }, {
    duration: 200,
    easing: 'linear',
    step: function(now) {
      $('#grand_total').val('₱ '+Math.ceil(now).toLocaleString()+'.00');
    }
  });

  // console.log(parseFloat(misc_fee));
  // console.log(result);

  // var grand_total_copy = grand_total;

  var req_dp = grand_total*.4;
  $('#tft_req_dp').text(req_dp.toLocaleString());

  var midterm_req = grand_total*.7;
  $('#tft_req_4midterm').text(midterm_req.toLocaleString());
  $('#tft_req_4finals').text(grand_total.toLocaleString());

  if($('#cash_rendered').val() == '' || grand_total == 0) {
    $('#balance').val('');
  }
  else if(parseInt($('#cash_rendered').val()) > grand_total) {
    $('#balance').val('RENDERED CASH EXCEEDED!!');
  }
  else {
    var total_balance = grand_total - parseInt(parseInt($('#cash_rendered').val()));
    $('#balance').val(total_balance.toLocaleString());
  }

  if(parseInt($('#cash_rendered').val()) < parseInt($('#tft_req_dp').text().replace(/,/g, ''), 10)) {
    $('#dp_warning').show();
  }
  else {
    $('#dp_warning').hide();
  }
  // console.log(val);
});

$('#tft_early_bird').change(function() {
  var val = .1;
    if (this.checked) {
      // $('#grand_total').val('₱ '+parseInt(grand_total - (grand_total * .1)).toLocaleString()+'.00');
      disc_grand_total = grand_total - (grand_total * .1);
      $('#grand_total').prop('Counter', 0).animate({
        Counter: disc_grand_total
      }, {
        duration: 200,
        easing: 'linear',
        step: function(now) {
          $('#grand_total').val('₱ '+Math.ceil(now).toLocaleString()+'.00');
        }
      });
      
      if($('#cash_rendered').val() == '' || grand_total == 0) {
        $('#balance').val('');
      }
      else if(parseInt($('#cash_rendered').val()) > disc_grand_total) {
        $('#balance').val('RENDERED CASH EXCEEDED!!');
      }
      else {
        var total_balance = disc_grand_total - parseInt(parseInt($('#cash_rendered').val()));
        $('#balance').val(total_balance.toLocaleString());
      }

      $('#tft_discount').text(parseInt(grand_total * .1).toLocaleString());
      $('#tft_w_discount').show();
      $('#tft_no_discount').hide();
      $('#dp_warning').hide();

    } else {
      disc_grand_total = 0;
      $('#grand_total').prop('Counter', 0).animate({
        Counter: grand_total
      }, {
        duration: 200,
        easing: 'linear',
        step: function(now) {
          $('#grand_total').val('₱ '+Math.ceil(now).toLocaleString()+'.00');
        }
      });

      if($('#cash_rendered').val() == '' || grand_total == 0) {
        $('#balance').val('');
      }
      else if(parseInt($('#cash_rendered').val()) > grand_total) {
        $('#balance').val('RENDERED CASH EXCEEDED!!');
      }
      else {
        var total_balance = grand_total - parseInt(parseInt($('#cash_rendered').val()));
        $('#balance').val(total_balance.toLocaleString());
      }
      $('#tft_w_discount').hide();
      $('#tft_no_discount').show();
      if(parseInt($('#cash_rendered').val()) < parseInt($('#tft_req_dp').text().replace(/,/g, ''), 10)) {
        $('#dp_warning').show();
      }
      else {
        $('#dp_warning').hide();
      }
    }
});

$('#scholar_type').change(function(){
  var val = $(this).val();
  if(val == 'Full Scholar') {
    $('#grand_total').prop('Counter', 0).animate({
      Counter: grand_total
    }, {
      duration: 200,
      easing: 'linear',
      step: function(now) {
        $('#grand_total').val('₱ '+Math.ceil(now).toLocaleString()+'.00');
      }
    });
    $('#tft_checkbox').hide();
    $('#tft_w_discount').hide();
    $('#tft_no_discount').show();
  }
  else {
    $('#grand_total').prop('Counter', 0).animate({
      Counter: grand_total
    }, {
      duration: 200,
      easing: 'linear',
      step: function(now) {
        $('#grand_total').val('₱ '+Math.ceil(now).toLocaleString()+'.00');
      }
    });
    $('#tft_w_discount').hide();
    $('#tft_no_discount').show();
    $('#tft_checkbox').show();
    $('#tft_checkbox :checkbox').prop('checked', false);
  }


  
});

$('#cash_rendered').keyup(function(){
  var val = $(this).val(), gt = 0;
  if(disc_grand_total == 0) {
    gt = grand_total;
  }
  else {
    gt = disc_grand_total;
  }
  if(parseInt($('#cash_rendered').val()) < parseInt($('#tft_req_dp').text().replace(/,/g, ''), 10) || $('#tft_early_bird').checked) {
    $('#dp_warning').show();
  }
  else {
    $('#dp_warning').hide();
  }


  if(val == '' || grand_total == 0) {
    $('#balance').val('');
  }
  else if(val > gt) {
    $('#balance').val('RENDERED CASH EXCEEDED!!');
  }
  else {
    var total_balance = gt - parseInt(val);
    $('#balance').val(total_balance.toLocaleString());
  }
});



$('#process_btn').click(function(){
  var stud_number = $('#tft_stud_num').text(),
      stud_type = $('#student_type').val(),
      stud_scholar_type = $('#scholar_type').val(),
      tf_per_unit = $('#tf_per_unit').val(),
      cash_rendered = $('#cash_rendered').val(),
      official_receipt = $('#official_receipt').val(),
      req_dp = parseInt($('#tft_req_dp').text().replace(/,/g, ''), 10);

      if(stud_scholar_type == '' && stud_type == '' && tf_per_unit == '' && cash_rendered == '' && official_receipt == '') {
        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
        $('#failedmsg').html("Please Fill out all necessary fields for your transaction.");
      }
      else if(stud_type == '') {
        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
        $('#failedmsg').html("Please indicate the student type of the student to continue.");
      }
      else if(stud_scholar_type == '') {
        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
        $('#failedmsg').html("Please indicate the scholar type of the student to continue.");
      }
      else if(tf_per_unit == '') {
        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
        $('#failedmsg').html("Please select a tuition per unit value to continue.");
      }
      else if(official_receipt == '') {
        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
        $('#failedmsg').html("Official Receipt No. field is empty. Kindly input the official receipt for this transaction.");
      }
      else if(cash_rendered == '') {
        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
        $('#failedmsg').html("Cash Rendered field is empty. <br/>Kindly input the cash redered by the customer to complete the transaction.");
      }
      else if(cash_rendered < 500) {
        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
        $('#failedmsg').html("Minimum amount to render is 500 for this transaction.");
      }
      else if(cash_rendered > grand_total) {
        $('#balance').val('RENDERED CASH EXCEEDED!!');
      }
      else if(cash_rendered < req_dp) {
        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
        $('#failedmsg').html("Required downpayment doesn't meet. Promisorry note is needed.");
      }
      else {
        $('#tft_confirmation_modal').modal({
            backdrop: 'static',
            keyboard: false
        });
        setTimeout(function(){
          $('#tft_body').slideUp('slow');
          $('#cash_rendered').val('');
          $('#balance').val('');
          $('#official_receipt').val('');
          $('#official_receipt').attr('disabled', true);
          $('#balance').attr('disabled', true);
          $('#cash_rendered').attr('disabled', true);
          $('#process_btn').attr('disabled', true);
          $('#process_btn').addClass('disabled');
          $('#tft_confirmation_modal').modal('hide');
          grand_total = 0;
          $('#student_type').prop('selectedIndex',0);
          $('#scholar_type').prop('selectedIndex',0);
          $('#student_type').prop('selectedIndex',0);
          window.open('../');
        }, 5000);
      }
      
});


});
</script>