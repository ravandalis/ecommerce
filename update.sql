Situational case: Assume that the orders of a certain user have been delivered. This update code will update the delivery status of the order.

<?php

include_once 'order_db_connect.php';

$order_id = 1234; // replace with the order ID of the perfume order to update
$delivery_status = 'Delivered'; // set the new delivery status here

$table = "orders";
$fields = array('delivery_status' => $delivery_status);
$filter = array('order_id' => $order_id);

if(update($conn, $table, $fields, $filter)) {
    echo "Delivery status updated successfully";
} else {
    echo "Error updating delivery status";
}

?>
