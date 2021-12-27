
<?php

 include('../Model/connect.php');


     if(isset($_GET['user_id']) ){
               
          $user_id= $_GET['user_id'];
          $product_id= $_GET['product_id'];


          try{
               $sql= "SELECT product_qty FROM `cart` WHERE user_id='".$user_id."' AND product_id='".$product_id."' ";
               $object=$conn->query($sql);
               $cartQTY= $object->fetchAll();
               foreach ($cartQTY as $cartQty) {
                    //cartQty[0] now has the cart quantity, we need to add this to the available qty

                    try{
                         $Prdrsql= "SELECT qty FROM `product` WHERE id='".$product_id."' ";
                         $prdrobject=$conn->query($Prdrsql);
                         $prdrQTY= $prdrobject->fetchAll();
                         foreach($prdrQTY as $PrdrQtyVal){
                              //now PrdrQtyVal[0] has the currect available qty
                              $updatedQty = $PrdrQtyVal[0] + $cartQty[0];

                              try{
                                   $upd_sql = "UPDATE product SET qty='$updatedQty' WHERE id='$product_id' "  ;
                                   $upd_obj = $conn->prepare($upd_sql)->execute();
                                   
                              }catch(PDOException $e){
                                   echo $e;
                              }

                         }


                    }catch(PDOException $exp){
                         echo $exp;
                    }
                    
                    
               }


               $delsql="DELETE FROM cart WHERE user_id='".$user_id."' AND product_id='".$product_id."' ";
	          $delobj = $conn->query($delsql);

               
               echo "<script>console.log('Update SUCCESSFULL!!!!');</script>";
          }
          catch(PDOException $ex1){
               echo $ex1;
               
          }
     }

?>