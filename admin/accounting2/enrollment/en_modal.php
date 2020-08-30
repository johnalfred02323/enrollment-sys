<form id="fees_form">
  <!-- Add User Modal-->
  <div class="modal fade" id="en_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
      <div id="fees_forms"></div> 
      <div id="fees_forms_new"> 
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tuition Fees</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close" onclick="reset()">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
 
        <div class="modal-body">
 
         <div class="input-group mb-3">
                    <?php
                    $query1 = "SELECT sum(price) FROM current_fees";
                    $result1 = mysqli_query($conn, $query1);
                    while ($row = mysqli_fetch_array($result1)) {
                    ?>
                    <input type="text" class="form-controls" id="miss1" aria-label="Default" disabled="" aria-describedby="inputGroup-sizing-default" autocomplete="off" value='<?php echo $row['sum(price)']; ?>'>
                  <?php } ?>
        </div>

                            <div class="box1">
                                <?php require 'tuition-fees-combo.php'; ?>
                                <select name="fees2" id="fees1" required>
                                    <option hidden>Tuition per Unit</option>
                                    
                                    <?php echo fees($conn); ?>
                                    
                                </select>
                            </div>




  

        </div> <!-- Modal Body End -->

      <div class="modal-footer">
        <button type="button" class="cancel" data-dismiss="modal" onclick="reset()"><i class="far fa-times-circle"></i> Cancel</button>
        <button type="button" class="save" id="save_btn" ripple><i class="fa fa-plus"></i> ADD</button>
      </div>

      </div>

</div>

    </div>
  </div>
</form>

<div class="alert-box success" >
  <i class="fas fa-check"></i> <span id="successmsg">Successful!</span>    
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>

<div class="alert-box failed" >
  <i class="far fa-times-circle"></i> <span id="failedmsg">Failed!</span> 
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>


<script>
 $(document).on('click', '#save_btn', function(){   
           var query = $('#miss1').val();
           var query1 = $('#mis1').text(query);

           var tfees = $('#fees1').val();
           var tfees1 = $('#fees').text(tfees);

           var un1 = $('#totalunits').text();
           var un2 = $('#uni1').text(un1);   
           $('#en_modal').modal('hide');

           var total = $('#totalunits').text();
           var amount = Number(query)+(Number(tfees)*Number(total)) ;
           var amount1 = $('#totalamount').text(amount);

});
</script>