<?php
    session_start();
    $database_name = "Product_details";
    $con = mysqli_connect("localhost","root","",$database_name);

    if (isset($_POST["add"])){
        if (isset($_SESSION["cart"])){
            $item_array_id = array_column($_SESSION["cart"],"product_id");
            if (!in_array($_GET["id"],$item_array_id)){
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'product_id' => $_GET["id"],
                    'item_name' => $_POST["hidden_name"],
                    'product_price' => $_POST["hidden_price"],
                    'item_quantity' => $_POST["quantity"],
                );
                $_SESSION["cart"][$count] = $item_array;
                echo '<script>window.location="cart1.php"</script>';
            }
            else{
                echo '<script>alert("Product is already Added to Cart")</script>';
                echo '<script>window.location="cart1.php"</script>';
            }
        }
        else{
            $item_array = array(
                'product_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][0] = $item_array;
        }
    }

    if (isset($_GET["action"])){
        if ($_GET["action"] == "delete"){
            foreach ($_SESSION["cart"] as $keys => $value){
                if ($value["product_id"] == $_GET["id"]){
                    unset($_SESSION["cart"][$keys]);
                    echo '<script>alert("Product has been Removed...!")</script>';
                    echo '<script>window.location="Cart1.php"</script>';
                }
            }
        }
    }
?>

<!doctype html>
<html oncontextmenu= "return false">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="icon" href="images/icon.png">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Titillium+Web');

        *{
            font-family: 'Titillium Web', sans-serif;
        }
        .product{
            border: 1px solid #eaeaec;
            margin: -1px 19px 3px -1px;
            padding: 10px;
            text-align: center;
            background-color: #efefef;
        }
        table, th, tr{
            text-align: center;
        }
        .title2{
            text-align: center;
            color: #000;
            border-radius: 20px;
            background-color: orange;
            padding: 2%;
        }
        h2{
            text-align: center;
            color: #000;
            background-color: orange;
            border-radius: 20px;
            padding: 2%;
        }
        table th{
            background-color: #efefef;
        }
        #rzp-button1{
            text-align: center;
            color: #000;
            width: 100px;
            border-radius: 5px;
            background-color: orange;
            padding: 2%;
            font-family: 'Titillium Web', sans-serif;
            border: 5; 
            }
    </style>
</head>
<body>

    <div class="container" style="width: 65%">
        <h2>Shopping Cart</h2>
        <?php
            $query = "SELECT * FROM product ORDER BY id ASC ";
            $result = mysqli_query($con,$query);
            if(mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {

                    ?>
                    <div class="col-md-3">

                        <form method="post" action="Cart1.php?action=add&id=<?php echo $row["id"]; ?>">

                            <div class="product">
                                <img src="<?php echo $row["image"]; ?>" class="img-responsive">
                                <h5 class="text-info"><?php echo $row["pname"]; ?></h5>
                                <h5 class="text-danger"><?php echo $row["price"]; ?></h5>
                                <input type="text" name="quantity" class="form-control" value="1">
                                <input type="hidden" name="hidden_name" value="<?php echo $row["pname"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                                <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success"
                                       value="Add to Cart">
                            </div>
                        </form>
                    </div>
                    <?php
                }
            }
        ?>

        <div style="clear: both"></div>
        <h3 class="title2">Shopping Cart Details</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
            <tr>
                <th width="30%">Product Name</th>
                <th width="10%">Quantity</th>
                <th width="13%">Price Details</th>
                <th width="10%">Total Price</th>
                <th width="17%">Remove Item</th>
            </tr>

            <?php
                if(!empty($_SESSION["cart"])){
                    $total = 0;
                    foreach ($_SESSION["cart"] as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $value["item_name"]; ?></td>
                            <td><?php echo $value["item_quantity"]; ?></td>
                            <td>₹ <?php echo $value["product_price"]; ?></td>
                            <td>
                                ₹ <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?></td>
                            <td><a href="Cart1.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span
                                        class="text-danger">Remove Item</span></a></td>

                        </tr>
                        <?php
                        $total = $total + ($value["item_quantity"] * $value["product_price"]);
                    }
                        ?>
                        <tr>
                            <td colspan="3" align="right">Total</td>
                            <th align="right">₹ <?php echo number_format($total, 2); ?></th>
                            <td><button id="rzp-button1">Pay</button></td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
        </div>

    </div>


</body>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    
var options = {
    "key": "rzp_test_HwXoUbOQ26muJe", // Enter the Key ID generated from the Dashboard
    "amount": "<?php echo $total*100; ?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency" : "INR",
    "name": "New Weston Cotton Polka",
    "description": "Confirm Your Payment",
    "image": "data:image/png;base64,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",
    //"order_id": "order_Ef80WJDPBmAeNt", //Pass the `id` obtained in the previous step
    //"account_id": "acc_Ef7ArAsdU5t0XL",
    "handler": function (response){
        console.log(response);
    }
};
var rzp1 = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>
</html>