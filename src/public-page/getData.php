<?php
if(!empty($_POST["id"])){

//Include DB configuration file
require 'config/config.php';

//Get last ID
$lastID = $_POST['id'];

//Limit on data display
$showLimit = 2;

//Get all rows except already displayed
$queryAll = $conn->query("SELECT COUNT(*) as num_rows FROM news WHERE id < ".$lastID." ORDER BY created_at DESC");
$rowAll = $queryAll->fetch_assoc();
$allNumRows = $rowAll['num_rows'];

//Get rows by limit except already displayed
$query = $conn->query("SELECT * FROM news WHERE id < ".$lastID." ORDER BY created_at DESC LIMIT ".$showLimit);

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){ 
        $postID = $row["id"]; ?>


<?php

  echo '

    <div class="card mb-5" id="post-card">
      <div class="card-header text-muted"></div>
      <div class="view_data" data-toggle="modal" id="'.$row['id'].'" data-target="#dataModal">';


      //if image row is Null in Database, the div of image is not displayed because of height design
      if ($row['image'] == null) 
        {
           echo '<div class="thumb-post" style="display:none;">
                 <img class="card-img-top" src="" alt="">
                 </div>';
        }
      else
        {
           echo  '<div class="thumb-post" style="display:block;">
                  <img class="card-img-top" src="../../admin/registrar/images/'.$row['image'].'" alt="'.$row['image'].'">
                  </div>';
        }


  $content = $row["content"];
  if (strlen($content) > 200)
  {
    $content = substr($content, 0,200)."<b>. . .</b>";
  }

       
echo' <div class="card-body">

<h5 class="card-title title-color text-break">'.$row["title"].'</h5>

<div class="border-post">

        <p class="card-text text-break">'.$content.'</p>

</div>
</div>


      
      <div class="card-footer text-muted">
      Date: &nbsp;'.date('F d , Y \a\t\ g:i A',strtotime($row['created_at'])).'
      </div>
    </div>
    </div>

  ';

?>




<?php } ?>

<?php if($allNumRows > $showLimit) { ?>





<center>
    <div class="load-more" lastID="<?php echo $postID; ?>" style="display: none;">
        <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
    </div>
</center>





<?php } 

else{ ?>


<center>
    <div class="load-more" lastID="0">
        <h3>NO MORE POST!</h3>
    </div>
</center>    


<?php }

}

else{ ?>


<center>
    <div class="load-more" lastID="0">
        <h3>NO MORE POST!</h3>
    </div>
</center>    



<?php

    }

}


?>


<script type="text/javascript">
    $('.view_data').click(function(){  
     var view_posts = $(this).attr("id");  
     $.ajax({  
          url:"view-data.php",  
          method:"post",  
          data:{view_posts:view_posts},  
          success:function(data){  
               $('#post_detail').html(data);  
               $('#dataModal').modal("show");  
          }  
     });  
}); 

</script>