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

<div class="table-responsive">          
<table class="table table-striped table-bordered">
  <thead>
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
    </tr>
  </thead>
  <tbody id="schedlist">
  
  </tbody>
</table>
</div>


<div class="modal-footer">

<button type="button" class="edit-user" id="acceptpetition" ripple><i class="fas fa-edit"></i> UPDATE</button> 

</div>

        </div>
      </div>
    </div>
  </div> <!-- Modal End -->
<script type="text/javascript">
  $(document).ready(function() {
    

  
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
  });
</script>