

  <form id="scholars_form">
  <!-- Add Scholar Modal-->
  <div class="modal fade" id="scholar_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
      <div id="scholar_forms"></div> 
      <div id="scholar_forms_new"> 
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Transaction</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close" onclick="reset()">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
 
        <div class="modal-body">
      
            <div class="box1">
                  <?php require 'tuitionfees_combo.php'; ?>
                <label class="select-label">Other Fees</label>
                      <select name='fees2' id="transaction" required>
                            <option hidden>--Select--</option>

                                <?php echo transaction($conn); ?>

                                <input type="text" id="txt1" hidden="">
                                <input type="text" id="txt2" hidden="">
                                <input type="text" id="txt3" hidden="">
                      </select>
            </div>
  
        </div> <!-- Modal Body End -->

      <div class="modal-footer"> 
        <button type="button" class="cancel" data-dismiss="modal" onclick="reset()"><i class="far fa-times-circle"></i> Cancel</button>
        <button type="button" class="save" id="add_btn" ripple><i class="fa fa-plus"></i> Add</button>
      </div>

      </div>

</div>

    </div>
  </div>
</form>


<script type="text/javascript">
  $(document).ready(function(){
    $("#transaction").change(function(){
      var display1=$("#transaction option:selected").text();
      $("#txt1").val(display1);
      var id = $("#transaction option:selected").attr('id');
      $("#txt3").val(id);
    })

          

  $(document).on('change','#transaction', function(){
    var fees = $(this).val();
    $("#txt2").val(fees);
    $("#TotMarks").val(fees);
    });




});  
</script>