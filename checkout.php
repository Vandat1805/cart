<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "technologystore";

// Tạo kết nối
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
echo "Kết nối thành công";
?>
<?php
$sql = "SELECT * FROM product, don_hang_detail where product.id_product = don_hang_detail.product_id";
$result = mysqli_query($conn, $sql);

// if (mysqli_num_rows($result) > 0) {
    // In các hàng dữ liệu
  
// } else {
//     echo "Không có kết quả";
// }

mysqli_close($conn);
?>
<div class="container">
    <div class="checkoutLayout"> 
        <div class="returnCart">
            <a href="/">keep shopping</a>
            <h1>List Product in Cart</h1>
            <div class="list">
                <?php
            while($row = mysqli_fetch_assoc($result)) {
        // echo "id: " . $row["id_product"]."<br>";
        $total_quantity = $row['price_product'] * $row['product_quantity'];
        ?>
        <div class="item">                  
            <img src="images/1.webp">
            <div class="info">
                <div class="name"><?php echo $row['title_product']?></div>
                <div class="price"> <?php echo number_format($row['price_product'],0,',','.').'vnd'?></div>
            </div>
            <div class="quantity"><?php echo $row['product_quantity']?></div>
                    <div class="returnPrice"> <?php echo number_format($total_quantity,0,',','.')?></div>
                </div>
            <?php
        }    
            ?>
            </div>
        </div>


        <div class="right">
            <h1>Checkout</h1>

            <div class="form">
                <div class="group">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" id="name">
                </div>
    
                <div class="group">
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone" id="phone">
                </div>
    
                <div class="group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address">
                </div>
    
                <div class="group">
                    <label for="country">Country</label>
                    <select name="country" id="country">
                        <option value="">Choose..</option>
                        <option value="">Kingdom</option>
                    </select>
                </div>
    
                <div class="group">
                    <label for="city">City</label>
                    <select name="city" id="city">
                        <option value="">Choose..</option>
                        <option value="">London</option>
                    </select>
                </div>
            </div>
            <div class="return">
                <div class="row">
                    <div>Total Quantity</div>
                    <div class="totalQuantity">70</div>
                </div>
                <div class="row">
                    <div>Total Price</div>
                    <div class="totalPrice">$900</div>
                </div>
            </div>
            <button class="buttonCheckout">CHECKOUT</button>
            </div>
    </div>
</div>
<!-- <script src="checkout.js"></script> -->
</body>
</html>