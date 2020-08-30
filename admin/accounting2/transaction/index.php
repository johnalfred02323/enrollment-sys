<!-- Head -->
<?php
require 'layout/head.php'; 
require '../../../config/config.php'; 
?>

<!-- jquery -->
<script src="../../../src/vendor/jquery/jquery-3.3.1.min.js"></script>


<!-- Table CSS -->
<link rel="stylesheet" type="text/css" href="../../../src/table/css/responsive.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../../src/table/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../../src/table/css/fixedHeader.dataTables.css">

<!-- Dark mode -->
<link rel="stylesheet" type="text/css" href="../../../src/table/css/jquery.dataTables-dark.css">


  <title>GRC System | Accounting</title>

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
        <?php require 'layout/cashier-top-nav.php'; ?>


       <!-- Begin Page Content -->
        <div class="container-fluid">


<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <div class="breadcrumb-item active" aria-current="page"><a href="../cashier-dashboard.php">Dashboard</a> / Transaction / Other Transaction</div>
  </ol>
</nav>




<!-- SPACER -->
<div class="mx-auto" style="height: 20px;"></div>

<div class="card shadow-sm mb-4"> <!-- card start -->

  <!-- Card Header - Dropdown -->
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

      <h5 class="m-0">Other Transaction</h5>

  </div>

    <div class="card-body" >

<!-- <style>  
    #searchstudlist ul{  
    background-color:#ccc;  
    cursor:pointer;  
    }  
    #searchstudlist li{  
    padding:12px;  
    }
</style> -->

  <div class="container">
  <div class="row">
    <div class="col-sm">
    </div>
    <div class="col-sm">



<!-- <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">Search</span>
  </div>
  <input type="text" class="form-controls" id="searchstud" aria-label="Default" placeholder="Student Number" aria-describedby="inputGroup-sizing-default" autocomplete="off">
</div>
    <span id="searchstudlist" style="position: absolute; display: inline-block; z-index: 1;"></span>
     -->

<div class="close-divs">  
  <div class="form-group">

    <input type="email" class="form-controls" id="searchstud" aria-describedby="Default" placeholder="Student Number">
    
    <div class="sample-lines" style=" overflow: auto;">
      <div class="show-result-searchs">
        <span id="searchstudlist"></span>
      </div>              
    </div>

  </div>
</div>


    </div>
    <div class="col-sm">
    </div>
  </div>
</div>

<div class="container m-0" id="studdata">
  <br>
  <div class="row" id="studinfo">


  </div>

 

  <br>
  <br>
  <br>

</div>
</div> <!-- card end -->

   <div id="transaction_div" class="row" style="display: none;"> <!-- ROW Start Here -->

        <div class="col-lg-6"> <!-- left column Start -->

        <table class="table table-hover table-striped" id="tbl">
                  <thead>
                   
                      <tr>            
                          <th hidden="true">ID</th>        
                          <th>Description</th>
                          <th>Price</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                   <tbody>
                    <tr>
                       <td></td>
                       <td></td>
                       <th><strong>Total:</strong></th>
                       <th id="TotMarks"></th>
                       <th></th>
                    </tr>
                    </tbody>
        </table>

        



        </div> <!-- left column End -->




        <div class="col-lg-6">  <!-- Right column Start -->

        <div class="col-ms-3">

       <!-- Textbox Cash Rendered -->
       <input type="text" class="form-controls" id="rendered" aria-label="Default" placeholder="Cash Rendered" aria-describedby="inputGroup-sizing-default" maxlength="5" onkeypress="return Validate(event);"><br>

       <!-- Change -->
       <input type="text" class="form-controls" id="change" aria-label="Default" placeholder="Change" aria-describedby="inputGroup-sizing-default" disabled=""><br>
       </div>
 
        <div class="col-ms-3">
        <!-- Modal Add -->
        <button id="" class="delete-user pull-xs-right edit" ripple data-toggle="modal" data-target="#scholar_modal" > <i class="fas fa-plus"> Add</i></button>

        <!-- Button Done -->
        <button id="done" class="view-user pull-xs-right edit" ripple><i class="fas fa-money-check-alt"> Done</i></button>
    
        <br>
        <br>
        </div>


        </div> <!-- Right column Start -->

  </div> <!-- ROW End Here -->

</div>


        </div>
        <!-- /.container-fluid -->
   

      </div>
      <!-- End of Main Content -->


      <!-- Footer -->
      <?php require '../../../src/layout/footer.php'; ?>


    </div>
    <!-- End of Content Wrapper -->


<!-- Add Transaction Modal -->
<?php include 'transaction_modal.php'; ?>


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

<div class="alert-box failed" style="max-width: 500px;">
  <i class="far fa-times-circle"></i> <span id="failedmsg">Failed!</span> 
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>

<div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
    
    <h5>Successful!</h5>
    
        </div>
      <div class="modal-footer"> <!-- Footer -->
        <button type="button" class="save" id="savedone" ripple><i class="fas fa-check"></i> Ok</button>
      </div>
      </div>
    </div>
</div>


<script>  
 $(document).ready(function(){  

  // Student Search Textbox
      $('#searchstud').keyup(function(){  
           var query = $(this).val();  
           if(query != '')  
           {  
                $.ajax({  
                     url:"transaction.php",  
                     method:"POST",  
                     data:{"autosearch":1,query:query},  
                     success:function(data)  
                     {  
                          $('#searchstudlist ').fadeIn();  
                          $('#searchstudlist').html(data);  
                     }  
                });
           } 

          document.getElementById("searchstudlist").style.display = "none";
          
      });  

// Student Click by Search
      $(document).on('click', 'li', function(){  
           $('#searchstud').val($(this).text());  
           $('#searchstudlist').fadeOut(); 
           var query = $(this).text();  
           if(query != '')  
           {  
                $.ajax({  
                     url:"transaction.php",  
                     method:"POST",  
                     data:{"getstuddata":1,query:query},  
                     success:function(data)  
                     {  
                          $('#studdata').fadeIn();  
                          $('#studdata').html(data);  
                     }  
                });
                 
           } 
           $('#transaction_div').show();
          $('#studdata').html('<div class="row"><div class="col-sm">Name:</div> ');  
      });
 });  

// Combobox Drop down
 $(document).ready(function(){  
   var cc = 1;
  $('#add_btn').click(function(){
   
    var trans = $('#txt1').val();
    var fees = $('#txt2').val();
    var id = $('#txt3').val();
    $('#tbl tr:first').after('<tr><td id="'+cc+'" hidden="true">'+id+'</td><td>'+trans+'</td><td class="subjects">'+fees+'</td><td><button id="remove" class="delete-user pull-xs-right delete" ripple><i class="far fa-trash-alt"></i> Remove</button></td></tr>');
    $('#scholar_modal').modal('hide');
cc++;
  var totmarks=0;
  $(this).find('#TotMarks').val();

  $('tr').each(function(){
    
    $(this).find('.subjects').each(function(){
      var marks=$(this).text();
      if(marks.length!==0)
      {
        totmarks+=parseFloat(marks);
      }
    });
      $(this).find('#TotMarks').html(totmarks);
  });

  });


// Remove Button for Item List
  $('#tbl').on('click', '#remove', function(){
  $(this).closest('tr').remove();
  var totmarks=0;
  $(this).find('#TotMarks').val();

  $('tr').each(function(){
    
    $(this).find('.subjects').each(function(){
      var marks=$(this).text();
      if(marks.length!==0)
      {
        totmarks+=parseFloat(marks);
      }
    });
      $(this).find('#TotMarks').html(totmarks);
  });

  });


// Compute Total of Item
$('#rendered').keyup(function(){

 var num1 = $('#TotMarks').text();
 var num2 = document.getElementById('rendered').value;
 
if (num2 == '' || num1 == ''){
  $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
  $('#failedmsg').html("Please Insert Item or Input Rendered Value");
}
else {
   
    var result = parseInt(num2) - parseInt(num1);

  if (result <0)
   {
   
    
    $('#change').val('');
   
   }
   else
   {
   $('#change').val(result);
   }
}  
});

// D0ne The Item
$(document).on('click', '#done', function(){
  var rowCount=$('#tbl tr').length - 2;
  var sn = $('#sn').html();
  var or = $('#or_id').val();
  var rn = $('#rendered').val();
  var ch = $('#change').val();
  var tr = $('#TotMarks').text();
  var num1 = $('#TotMarks').text();
  var num2 = document.getElementById('rendered').value;
  
  if( or == '' )
  {
    $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
    $('#failedmsg').html("Please Input Official Receipt Number");
  }
  else{
    var i = 0;
    var items = [];
    for (i = 1; i <= rowCount; i++) {
      var rr = $('#'+i).closest('td').text();
      items.push(rr);
    }
  
  if( rn == '' )
  {
    $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
    $('#failedmsg').html("Please Input A Payment");
  }
  else{
    var i = 0;
    var items = [];
    for (i = 1; i <= rowCount; i++) {
      var rr = $('#'+i).closest('td').text();
      items.push(rr);
    }
  
   
    var result = parseInt(num2) - parseInt(num1);

  if (result < 0)
   {
   
    $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
    $('#failedmsg').html("Insuffient Balance");
    $('#change').val('');
   }
   else
   {
   $('#change').val(result);

    // alert(rowCount);
    var allitems = JSON.stringify(items);
    console.log(allitems);
    $.ajax({
      url:"transaction.php",
      method:"POST",
      data: {"add":1,allitems:allitems,sn:sn,or:or,rn:rn,ch:ch,tr:tr},
      success:function(data){
        if(data=='0')
        {
          $('#success').modal('show');

        }
        else{
          $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
          $('#failedmsg').html("Official Receipt Number Exist");
        } 
               
      }
    });
   }

  }
}
});


// save ok
$(document).on('click', '#savedone', function(){
$('#success').modal('hide');
window.location.href='./';
});


 function Validate(event) {
        var regex = new RegExp("^[0-9-]");
        var key = String.fromCharCode(event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    }

});
</script>