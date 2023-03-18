<html>
<?php include_once "db_conn.php"; ?>

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">

</head>

<body>
<body>
    <div class="container">
        <div class="row">
            <div class="col-3">
                <h3>New Record</h3>
                
                <?php
                     if(isset($_GET['new_record'])){
                            switch($_GET['new_record']){
                                case "added": echo "<div class='alert alert-success'>User Added.</div>";
                                      break;
                                case "failed":  echo "<div class='alert alert-danger'>User Not Added</div>";
                                      break;
                                        
                            }
                       }
                ?>
                <form action="product.php" method="post">
                    <div class="mb-3">
                        <label for="item_name" class="form-label">Product Name</label>
                        <input type="text" id="new_product" required name="new_product" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="item_price" class="form-label">Product Price</label>
                        <input type="text" required id="newitem_price" name="newitem_price" class="form-control">
                    </div>
                    <input type="submit" class="btn btn-primary">
                </form>
                
            </div>
            <div class="col-8">
                        <?php
                        $productlist = query($conn, "select item_id, item_name, item_price, item_status from products");
                        //also use SELECT * FROM products
                        
                        echo "<table class='table table-bordered'>";
                        echo "<thead>";
                        echo "<th>Product Name</th>";
                        echo "<th>Product Price</th>";
                        echo "<th>Item Status</th>";
                        echo "<th>Action</th>";
                        echo "</thead>";
                        foreach ($productlist as $key => $row) {
                            echo "<tr>";
                            echo "<td>" . $row['item_name'] . "</td>";
                            echo "<td>" . $row['item_price'] . "</td>";
                            echo "<td>" . $row['item_status'] . "</td>";
                            echo "<td> <a class='btn btn-success' href='update_item.php?item_id=" . $row['item_id'] . "&item_name=" . $row['item_name'] . "&item_price=" . $row['item_price'] . "&item_status=" . $row['item_status'] . "' > Update </a> </td>";
                            echo "<td> <a class='btn btn-danger' href='delete_item.php?item_id=" . $row['item_id'] . " ' > Delete </a> </td>";
                            echo "</tr>";
                        }
                        echo "</table>";

                        ?>

                
            </div>
            <div class="col-1"></div>
        </div>
    </div>
</body>
<script src="js/bootstrap.js"></script>
