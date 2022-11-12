<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['order_btn'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $number = $_POST['number'];
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $method = mysqli_real_escape_string($conn, $_POST['method']);
   $address = mysqli_real_escape_string($conn, 'hẻm số '. $_POST['alley'].', '. $_POST['street'].', '. $_POST['ward'].', '. $_POST['district'].', '. $_POST['city'].' - '. $_POST['pin_code']);
   $placed_on = date('d-M-Y');

   $cart_total = 0;
   $cart_products[] = '';

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   if(mysqli_num_rows($cart_query) > 0){
      while($cart_item = mysqli_fetch_assoc($cart_query)){
         $cart_products[] = $cart_item['name'].' ('.$cart_item['quantity'].') ';
         $sub_total = ($cart_item['price'] * $cart_item['quantity']);
         $cart_total += $sub_total;
      }
   }

   $total_products = implode(', ',$cart_products);

   $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND number = '$number' AND email = '$email' AND method = '$method' AND address = '$address' AND total_products = '$total_products' AND total_price = '$cart_total'") or die('query failed');

   if($cart_total == 0){
      $message[] = 'Giỏ của bạn trống trơn!';
   }else{
      if(mysqli_num_rows($order_query) > 0){
         $message[] = 'Đơn hàng của bạn đã được đặt rồi!'; 
      }else{
         mysqli_query($conn, "INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price, placed_on) VALUES('$user_id', '$name', '$number', '$email', '$method', '$address', '$total_products', '$cart_total', '$placed_on')") or die('query failed');
         $message[] = 'Đặt hàng thành công!';
         mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      }
   }
   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Thanh toán</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>Thanh toán</h3>
   <p> <a href="home.php">home</a> / checkout </p>
</div>

<section class="display-order">

   <?php  
      $grand_total = 0;
      $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_cart) > 0){
         while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total += $total_price;
   ?>
   <p> <?php echo $fetch_cart['name']; ?> <span>(<?php echo ''.$fetch_cart['price'].'vnđ'.' x '. $fetch_cart['quantity']; ?>)</span> </p>
   <?php
      }
   }else{
      echo '<p class="empty">Giỏ của bạn trống trơn!</p>';
   }
   ?>
   <div class="grand-total"> Tổng cộng : <span><?php echo $grand_total; ?>vnđ</span> </div>

</section>

<section class="checkout">

   <form action="" method="post">
      <h3>điền thông tin vào đơn đặt hàng</h3>
      <div class="flex">
         <div class="inputBox">
            <span>Tên của bạn :</span>
            <input type="text" name="name" required placeholder="Nhập tên của bạn">
         </div>
         <div class="inputBox">
            <span>Số điện thoại :</span>
            <input type="number" name="number" required placeholder="Nhập số điện thoại">
         </div>
         <div class="inputBox">
            <span>Email :</span>
            <input type="email" name="email" required placeholder="Nhập địa chỉ email">
         </div>
         <div class="inputBox">
            <span>Phương thức thanh toán :</span>
            <select name="method">
               <option value="Khi nhận được hàng">Khi nhận được hàng</option>
               <option value="Thẻ tín dụng">Thẻ tín dụng</option>
               <option value="Momo">Momo</option>
               <option value="Zalo pay">Zalo pay</option>
            </select>
         </div>
         <div class="inputBox">
            <span>Hẻm :</span>
            <input type="number" min="0" name="alley" required placeholder="5">
         </div>
         <div class="inputBox">
            <span>Tên đường :</span>
            <input type="text" name="street" required placeholder="Phan Đình Tùng">
         </div>
         <div class="inputBox">
            <span>Phường :</span>
            <input type="text" name="ward" required placeholder="Hưng Lợi">
         </div>
         <div class="inputBox">
            <span>Quận :</span>
            <input type="text" name="district" required placeholder="Ninh Kiều">
         </div>
         <div class="inputBox">
            <span>Thành phố:</span>
            <input type="text" name="city" required placeholder="Cần Thơ">
         </div>
         <div class="inputBox">
            <span>Mã pin :</span>
            <input type="number" min="0" name="pin_code" required placeholder="123456">
         </div>
      </div>
      <input type="submit" value="đặt hàng ngay" class="btn" name="order_btn">
   </form>

</section>









<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>