

<!-- View Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-end">
        <div class="input-group ">
          <h4 id="section-name"></h4>
        </div>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th colspan="3">Subject Details</th>
                <th colspan="3">Lecture Details</th>
                <th colspan="3">Other Details</th>
                <th colspan="2"></th>
              <tr>
                <th scope="col" nowrap>Subject Code</th>
                <th scope="col" nowrap>Subject Title</th>
                <th scope="col" nowrap>Units</th>
                <th scope="col" nowrap>Day</th>
                <th scope="col" nowrap>Time</th>
                <th scope="col" nowrap>Room</th>
                <th scope="col" nowrap>Day</th>
                <th scope="col" nowrap>Time</th>
                <th scope="col" nowrap>Room</th>
                <th scope="col" nowrap>No. of Student</th>
                <th scope="col" nowrap>Max. Student</th>
              </tr>
            </thead>
            <tbody id="subjects">
            </tbody>
          </table> 

        </div>       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" ripple><i class="fas fa-times"></i> Close</button>
      </div>
    </div>
  </div>
</div>


<!-- View Petition -->
<div class="modal fade" id="pet-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-end">
        <div class="input-group ">
          <h4 id="subject-name"></h4>
        </div>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col" nowrap>Day</th>
                <th scope="col" nowrap>Time</th>
                <th scope="col" nowrap>Room</th>
                <th scope="col" nowrap>Day</th>
                <th scope="col" nowrap>Time</th>
                <th scope="col" nowrap>Room</th>
                <th scope="col" nowrap>No. of Student</th>
                <th scope="col" nowrap>Max. Student</th>
              </tr>
            </thead>
            <tbody id="schedule-petition">
            </tbody>
          </table> 

        </div>       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" ripple><i class="fas fa-times"></i> Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Search Modal -->
<div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-end">
        <div class="input-group mb-2 mt-3 col-xl-6">
          <input list="search-data" type="text" class="form-control" id="searchbox" placeholder="Search..." aria-label="Recipient's username" aria-describedby="basic-addon2">
          <datalist id="search-data">
            <option></option>
          </datalist>
          <div class="input-group-append">
            <button class="btn btn-danger search" type="button">Search</button>
          </div>
        </div>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col" nowrap>Section</th>
                <th scope="col" nowrap>Subject Code</th>
                <th scope="col" nowrap>Subject Title</th>
                <th scope="col" nowrap>Units</th>
                <th scope="col" nowrap>Day</th>
                <th scope="col" nowrap>Time</th>
                <th scope="col" nowrap>Room</th>
                <th scope="col" nowrap>Day</th>
                <th scope="col" nowrap>Time</th>
                <th scope="col" nowrap>Room</th>
                <th scope="col" nowrap>No. of Student</th>
                <th scope="col" nowrap>Max. Student</th>
              </tr>
            </thead>
            <tbody id="search-schedule">
            </tbody>
          </table> 

        </div>       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" ripple><i class="fas fa-times"></i> Close</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  
  //section details
  $(document).on( 'click','.view', function (e) {
    var section = $(this).attr('id');
    $('#section-name').text(section);
      //for searching of subject for petition
      $.ajax({
      url:"process.php",
      method:"POST",
      data:{"sectiondetails":1,section:section},
      success:function(data)
      {
        $('#subjects').html(data);
      }
    });
  });

  //petition subject details
  $(document).on( 'click','.view2', function (e) {
    var subject = $(this).attr('id');
    $('#section-name').text(subject);
      //for searching of subject for petition
      $.ajax({
      url:"process.php",
      method:"POST",
      data:{"petsubjdetails":1,subject:subject},
      success:function(data)
      {
        $('#schedule-petition').html(data);
      }
    });

      //for searching of subject name
      $.ajax({
      url:"process.php",
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
      url:"process.php",
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
      url:"process.php",
      method:"POST",
      data:{"searchsubject":1},
      success:function(data)
      {
        $('#search-data').html(data);
      }
    });


</script>