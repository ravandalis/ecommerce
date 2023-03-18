//list_product.php
<?php 
include_once 'order_db_connect.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>

    <section class="container py-5">
        <h1 class="title text-center mb-4"><i>Product list</i></h1>
        <div class="row">
            
                <?php
                $itemlist = query($conn, "select item_id, item_name, item_price from products where item_status='A'");
                
                foreach($itemlist as $items => $card){
                    echo '
                    <div class="col-md-3 mt-3 mx-2">
                    <form action="./checkout.php" method="post">
                        <div class="card" key="'. $card['item_id'] . '" style="width: 18rem;">
                        <img src="../images/download.png" class="card-img-top" alt="item image">
                        <div class="card-body">
                            <h5 class="card-title">'. $card['item_name'] .'</h5>
                            <p class="card-text">'. $card['item_price'] .'</p>
                            <div class="d-flex justify-content-between align-items-center">
                            <input type="hidden" name="item_id" value="'.$card['item_id'].'">
                            <input type="number" class="form-control w-50" name="quantity" min="1" id="quantity" value="1">    
                            <button type="submit" name="buy_now" class="btn btn-primary">Buy Now</button>
                            </div>
                        </div>
                        </div>
                        </form>
                    </div>';
                }        
                ?>
        </div>
    </section>

</body>
</html>


//checkout.php
<?php

    include_once 'order_db_connect.php';


    if (isset($_POST['buy_now'])) {
    $quantity = $_POST['quantity'];
    $item_id = $_POST['item_id'];
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <div class="container py-5">
        <h3 class="section-title text-center my-5 text-uppercase">Checkout</h3>
        <div class="row">
            <div class="col-md-6 mx-auto">

                <form method="post" action="./ordered_process.php">
                    <input type="hidden" name="item_id" value="<?php echo $item_id; ?>">
                    <input type="hidden" name="quantity" value="<?php echo $quantity; ?>">
            
            
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Enter a username" name="username" required>
                        <label for="floatingInput">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingName" placeholder="Enter Full Name" name="fullname" required>
                        <label for="floatingName">Full Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingNumber" placeholder="Enter Contact Number" name="contact_number" required>
                        <label for="floatingNumber">Contact Number</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Enter Address" id="floatingTextarea" name="address" required></textarea>
                        <label for="floatingTextarea">Address</label>
                    </div>
                    <div class="d-flex justify-content-center">

                        <a href="./list_product.php" class="btn btn-secondary me-3">Cancel Order</a>
                        <button type="submit" name="submit_order" class="btn btn-primary">Submit Order</button>
                    </div>
            
                </form>
            </div>
        </div>
    </div>
</body>
</html>

//order_list.php
<?php
    include_once 'order_db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order List</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="./css/bootstrap.css">
</head>
<body>
    <section class="container py-5">
        <a href="list_product.php" class="btn btn-secondary">Back</a>
        <h1 class="title text-center mb-3 text-uppercase">Order List</h1>

        <!-- Display -->
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Username</th>
                <th scope="col">Item Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Date Ordered</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $orderlist = query($conn, "select users.username, products.item_name, orders.item_qty, orders.date_ordered, orders.order_status from orders join users on users.user_id = orders.user_id join products on products.item_id = orders.item_id");
              
                foreach($orderlist as $orders => $row){
    
                  echo '<tr>';
                  echo    '<th scope="row">'.$row['username'].'</th>';
                  echo   '<td>'.$row['item_name'].'</td>';
                  echo '<td>'.$row['item_qty'].'</td>';
                  echo '<td>'.$row['date_ordered'].'</td>';
                  echo '<td>'.$row['order_status'].'</td>';
    
                   echo    '</tr>';
                }
              ?>
            </tbody>
          </table>
    </section>

</body>
</html>

//ordered_process.php
<?php

include_once 'order_db_connect.php';

if(isset($_POST['submit_order'])) {
    $item_id = $_POST['item_id'];
    $quantity = $_POST['quantity'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $contact_number = $_POST['contact_number'];
    $address = $_POST['address'];

    // handle user first
    
    $user_result = query($conn, "select * from users where user_id = '$user_id'");

    if ($user_result){
        $user_id = $user_result['user_id'];
        $table = "users";
        $fields = array('password' => $password,
                                'fullname' => $fullname,
                                'contact_number' => $contact_number,
                                'address' => $address
                                );
        $filter = array('user_id' => $user_id);

        // Update user information
        update($conn, $table, $fields, $filter);
    } else {
        $table = "users";
        $fields = $arrayName = array('username' => $username, 
                                'password' => $password,
                                'fullname' => $fullname,
                                'contact_number' => $contact_number,
                                'address' => $address
                                );

        // insert user information
        insert($conn, $table, $fields);
        $user_id = mysqli_insert_id($conn);
    }

    // Insert Order
    $table = "orders";
    $fields = array('user_id' => $user_id
                    ,'item_id' => $item_id
                    , 'item_qty' => $quantity
                );
    if(insert($conn, $table, $fields) ){
        header("location: order_list.php?order=added");
        exit();
    } else {
        header("location: order_list.php?order=failed");
        exit();
    }
}
