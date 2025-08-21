<?php
    include ('mymethods.php');

    $response = addEventOrder($_POST);

   if($response == 1){
    echo 'Order placed successfully!';
   } 
   else{
    echo 'Order not placed!!';
   }
?>