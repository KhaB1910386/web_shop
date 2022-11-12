<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Về chúng tôi</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>Về chúng tôi</h3>
   <p> <a href="home.php">home</a> / about </p>
</div>

<section class="about">

   <div class="flex">

      <div class="image">
         <img src="images/about_N2K.jpg" alt="">
      </div>

      <div class="content">
         <h3>Vì sao nên chọn N2K?</h3>
         <p>Với chúng tôi thời trang không dừng lại ở mẫu mã mà còn nằm ở chất lượng sản phẩm. Chúng tôi luôn muốn tạo ra nhiều sản phẩm để quý khách hàng có thể lựa chọn. Song song đó chúng tôi luôn muốn gởi tới khách hàng sản phẩm đạt chất lượng tốt nhất.</p>
         <p>Sự hài lòng của khách hàng giúp chúng tôi phát triển hơn. Mọi sự đánh giá của các bạn sẽ giúp N2K phát triển hơn từng ngảy</p>
         <a href="contact.php" class="btn">Liên hệ chúng tôi</a>
      </div>

   </div>

</section>

<section class="reviews">

   <h1 class="title">Phản hồi của khách hàng</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/Kh_1.jpg" alt="">
         <p>Đồ đẹp mà giá cả lại hợp lý, phù hợp với học sinh, sinh viên nha.Hãy ghé N2K để mua đồ đẹp với mình nhé!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
         </div>
         <h3>Lê Văn Tèo</h3>
      </div>

      <div class="box">
         <img src="images/Kh_2.jpg" alt="">
         <p>Mua lần đầu ở shop nhưng ưng cực luôn. Áo lên form cực chuẩn, không có chỉ thừa luôn. Ai thích áo thun thì ghé shop này liền. </p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
         </div>
         <h3>Huệ Huệ</h3>
      </div>

      <div class="box">
         <img src="images/Kh_3.jpg" alt="">
         <p>Mua đúng đợt lễ nên shop giao hơi chậm, 5 ngày mình mới có hàng. Nhưng không sao, bù lại đồ đẹp đúng với hình. Lần sau sẽ quay lại mua nữa.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
         </div>
         <h3>Nguyễn Thanh Tú</h3>
      </div>

      <div class="box">
         <img src="images/Kh_4.jpg" alt="">
         <p>Lần đầu tiên mua được quần jean hợp với dáng mình vậy luôn. Nhưng bị cái quần hơi dài, phải đi cắt ngắn lại. Nhưng không sao đẹp là được. </p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
         </div>
         <h3>Lê Văn Khá</h3>
      </div>

      <div class="box">
         <img src="images/KH_5.jpg" alt="">
         <p>Áo đẹp, chất mịn, mở hàng ra nghe mùi thơm dễ chịu lắm.Mua áo cặp cho hai vợ chồng đi chơi lễ, mà qua lễ mới nhận được áo :(.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Phạm Thị Ngọc Trâm</h3>
      </div>

      <div class="box">
         <img src="images/KH_6.jpg" alt="">
         <p>Mua 2 cái áo cái nào cũng hơi ngắn so với mình hết. Mình cao có 1m95 thôi hà. Lần sau phải mua lớn hơn 1 size mới được.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Lê Quăng Sú</h3>
      </div>

   </div>

</section>

<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>