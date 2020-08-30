<style type="text/css">
  .table td, th {
   text-align: center;   
}
</style>



<!-- Modal Start -->
  <div class="modal fade" id="view-mdoal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      <th scope="col" colspan="3"></th>
      <th scope="col" colspan="3">Day and Time</th>
      <th scope="col" colspan="3">Day and Time</th>
      <th scope="col" colspan="2"></th>
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
      <th scope="col">No. of Students</th>
      <th scope="col">Max. Student</th>
    </tr>
  </thead>
  <tbody id="schedlist">
  </tbody>
</table>
</div>


<!-- <div class="modal-footer">

<h5>Section</h5>

</div> -->

        </div>
      </div>
    </div>
  </div> <!-- Modal End -->




<!-- Modal Start -->
  <div class="modal fade" id="petition-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="subject-name"></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
        <div class="modal-body">

<div class="table-responsive">          
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col" colspan="3">Day and Time</th>
      <th scope="col" colspan="3">Day and Time</th>
      <th scope="col" colspan="2"></th>
    </tr>
    <tr>
      <th scope="col">Day</th>
      <th scope="col">Time</th>
      <th scope="col">Room</th>
      <th scope="col">Day</th>
      <th scope="col">Time</th>
      <th scope="col">Room</th>
      <th scope="col">No. of Students</th>
      <th scope="col">Max. Student</th>
    </tr>
  </thead>
  <tbody id="petitionlist">
  </tbody>
</table>
</div>


<!-- <div class="modal-footer">

<h5>Section</h5>

</div> -->

        </div>
      </div>
    </div>
  </div> <!-- Modal End -->

  <script type="text/javascript">
    
      // view button for schedules per year
      $(document).on('click','.view1', function(e)
      {
        var section = $(this).attr("id");
        $('#vsection').text(section);
         $.ajax({
        url:"schedule-process.php",
        method:"POST",
        data:{"viewsched":1,section:section},
        success:function(data){
          $('#schedlist').html(data);
        }
      });
      });

      $(document).on('click','.view2', function(e)
      {
        var section = $(this).attr("id");
        $('#vsection').text(section);
         $.ajax({
        url:"schedule-process.php",
        method:"POST",
        data:{"viewsched":1,section:section},
        success:function(data){
          $('#schedlist').html(data);
        }
      });
      });

      $(document).on('click','.view3', function(e)
      {
        var section = $(this).attr("id");
        $('#vsection').text(section);
         $.ajax({
        url:"schedule-process.php",
        method:"POST",
        data:{"viewsched":1,section:section},
        success:function(data){
          $('#schedlist').html(data);
        }
      });
      });

      $(document).on('click','.view4', function(e)
      {
        var section = $(this).attr("id");
        $('#vsection').text(section);
         $.ajax({
        url:"schedule-process.php",
        method:"POST",
        data:{"viewsched":1,section:section},
        success:function(data){
          $('#schedlist').html(data);
        }
      });
      });

      $(document).on('click','.view5', function(e)
      {
        var section = $(this).attr("id");
        $('#vsection').text(section);
         $.ajax({
        url:"schedule-process.php",
        method:"POST",
        data:{"viewsched":1,section:section},
        success:function(data){
          $('#schedlist').html(data);
        }
      });
      });


      $(document).on('click','.viewpet', function(e)
      {
        var subject = $(this).attr("id");
         $.ajax({
        url:"schedule-process.php",
        method:"POST",
        data:{"petsubjdetails":1,subject:subject},
        success:function(data){
          $('#petitionlist').html(data);
        }
      });
      //for searching of subject name
      $.ajax({
      url:"schedule-process.php",
      method:"POST",
      data:{"subjectname":1,subject:subject},
      success:function(data)
      {
        $('#subject-name').text(data);
      }
      });

      });


   //search schedule
  $(document).on( 'click','.search', function (e) {
      var subject = $('#searchbox').val();

      $.ajax({
      url:"schedule-process.php",
      method:"POST",
      data:{"searchschedule":1,subject:subject},
      success:function(data)
      {
        $('#search-schedule').html(data);
      }
    });
  });

      //for search box
      $.ajax({
      url:"schedule-process.php",
      method:"POST",
      data:{"searchsubject":1},
      success:function(data)
      {
        $('#search-data').html(data);
      }
    });



  </script>