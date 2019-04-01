<?php 
function check_if_added_to_cart($item_id)
{  include 'include/common.php'; 
   $user_id =$_SESSION['id'];
   $query="SELECT * FROM user_items WHERE item_id='$item_id' AND user_id ='$user_id[0]' and
   status='Added to cart'";    
   $result= mysqli_query($con, $query);
   if(mysqli_num_rows($result)>0){
    return 1;
  }
else{
    return 0;
 }
}
?>