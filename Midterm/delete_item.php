<?php
include_once "db_conn.php";

if(isset($_GET['item_id'])){

    
    $table = "products";
    $d_item_id = $_GET['item_id'];
    $fields = array( 'item_status' => 'I' );
    $filter = array( 'item_id' => $d_item_id );
    
    if(query($conn, "DELETE FROM products WHERE item_id = $d_item_id") ){
       header("location: index.php?user_delete=done");
       exit();
   }
   else{
       header("location: index.php?user_delete=failed");
       exit();
   } 
}