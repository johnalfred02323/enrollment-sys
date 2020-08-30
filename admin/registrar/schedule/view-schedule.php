<style type="text/css">
  .table td, th {
   text-align: center;   
}
</style>


<!-- Modal Start -->
  <div class="modal fade" id="view-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="vsection"></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
        <div class="modal-body">

<div class="table-responsive" id="viewschedtbl">          
<table class="table table-striped table-bordered" id="schedtbl" style="border:solid 1px black;">
  <thead>
    <tr>
        <th colspan="3">Subject Details</th>
        <th colspan="3">Lecture Details</th>
        <th colspan="3">Other Details</th>
        <th colspan="3"></th>
      </tr>
    <tr>
      <th scope="col">Subject Code</th>
      <th scope="col">Subject Title</th>
      <th scope="col">Unit</th>
      <th scope="col">Day</th>
      <th scope="col">Time</th>
      <th scope="col">Room</th>
      <th scope="col">Day</th>
      <th scope="col">Time</th>
      <th scope="col">Room</th>
      <th scope="col">Faculty</th>
      <th scope="col">Student Enrolled</th>
      <th scope="col">Max Student</th>
    </tr>
  </thead>
  <tbody id="schedlist">
  
  </tbody>
</table>
</div>


<div class="modal-footer">

    <button type="button" class="delete-user" id="updatepetition" ripple><i class="far fa-edit"></i> UPDATE</button> 
    <button id="" class="view-user pull-xs-right print" ripple><i class="fas fa-print"></i> PRINT</button> 
    <button id="" class="edit-user pull-xs-right excel" ripple><i class="far fa-file-excel"></i> Excel</button>

</div>

        </div>
      </div>
    </div>
  </div> <!-- Modal End -->
<script type="text/javascript">
  $(document).ready(function() {
    

  //for viewing
    $(document).on('click','#updatepetition', function(e)
    {
    var section = $('#vsection').text();
     $.ajax({
      url:"process.php",
      method:"POST",
      data:{"viewsched":1,section:section},
      success:function(data){
        $('#schedlist').html(data);
      }
    });
   });

  //for viewing
    $(document).on('click','.view', function(e)
    {
    var section = $('#vsection').text();
     $.ajax({
      url:"process.php",
      method:"POST",
      data:{"viewsched":1,section:section},
      success:function(data){
        $('#schedlist').html(data);
      }
    });
   });


// for printing
$(document).on( 'click','.print', function (e) {
    var section = $('#vsection').text();
    var schoolyear = $('#sy').val();
    var sem = $('#sem').val();
        var newWin = window.open('print.php?data='+section+'&data2='+schoolyear+'&data3='+sem);
        newWin.document.close();
        newWin.focus();
        newWin.print();
  });

// for excel exporting
$(document).on( 'click','.excel', function (e) {
  var section = $('#vsection').text();
  var schoolyear = $('#sy').val();
  var sem = $('#sem').val();
  var filename;
  filename = (section+'_'+sem+'_'+schoolyear);

  $.ajax({
        url:"process.php",
        method:"POST",
        data:{"viewschedexcel":1,section:section,schoolyear:schoolyear,sem:sem},
        success:function(data){
          window.location = "for_excel_export.php?data="+ data+"&data2="+filename;
        }
      }); 
   });

  });
</script>