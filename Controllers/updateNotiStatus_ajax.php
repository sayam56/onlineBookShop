<?php
 //echo "console.log('next page SUCCESSFULL!!!!');";

 include('../Model/connect.php');

     if(isset($_GET['user_id']) ){ 
          $user_id=$_GET['user_id'];                    

          try{
               $up_sql = "UPDATE notifications SET seen='1' WHERE user_id='$user_id' "  ;
               $up_obj = $conn->prepare($up_sql)->execute();

               ?>
               <li id="shoppingC" ><a style="cursor: pointer;"><i class="fa fa-bell"></i> <span>0</span></a></li>
              <?php 

               echo "<script>console.log('Update SUCCESSFULL!!!!');</script>";
          }
          catch(PDOException $ex1){
               echo $ex1;
               
          }
     }

?>