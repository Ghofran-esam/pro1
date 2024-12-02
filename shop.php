<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Shopping</title>
    

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
 

<link rel="stylesheet" href="./main.css">
  

</head>
<body>
<section id="header">
    <a href="#"> <img  src= "./images/Screenshot 2024-04-18 042407.png" class="logo" alt="this is logo" ></a>
    <div>
    <ul id="navbar">
        <li><a  href="index.php">Home</a></li>
        <li><a class="active" href="shop.php">Shop</a></li>
        <li><a href="blog.php">Blog</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>

        <?php session_start(); if (!isset($_SESSION['username'])): ?>
            <li><a href="login.php">Login</a></li>
        <?php else: ?>
            <li><a href="logout.php">Logout</a></li>
        <?php endif; ?>
        <?php
        if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'ADMIN'): ?>
            <li><a href="admin_panel.php">Admin Panel</a></li>
        <?php endif; ?>
        
        <?php  if (isset($_SESSION['username'])): ?>
            <li  id="lg-bag"><a href="cart.php" ><i class="far fa-shopping-bag"></i></a></li>
        <?php endif; ?>
        <a href="#" id="close"><i class="far fa-times"></i></a>
    </ul>
</div>
       </section>

    <section id="product1" class="section-p1">
      <h2>
      Our Products 
      </h2>
      
      <div class="pro-container">
      <?php
      include 'config.php';
      $conn = connectDB();

      $sql = "SELECT product_id as id, name, size,category, price FROM products";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        ?>
        <?php while ($row = $result->fetch_assoc()): ?>

        
          <div class="pro"  data-productid="<?php echo $row["id"]; ?>" onclick="redirectToProductDetails(this)">
          <img src="./images/<?php echo $row["name"]; ?>.webp">
              <div class="des">
              <span><?php echo $row["category"]; ?></span>
              <h5><?php echo $row["name"]; ?></h5>
        
          <div class="star">
             <i class="fas fa-star"></i>
             <i class="fas fa-star"></i>
             <i class="fas fa-star"></i>
             <i class="fas fa-star"></i>
            
              </div>
      
              <h4>$<?php echo $row["price"]; ?></h4>
          </div>
      
          <a href="#">
             <i class="fal fa-shopping-cart cart"></i>
      
          </a>
          
          </div>     
          <?php endwhile; ?>
        <?php
      } else {
        echo "0 results";
      }
      $conn->close();
      ?>
          </div>   
      
      
      </section>
      


 <section id="pagination" class="section-p1">
    <a href="#">1</a>
    <a href="#">2</a>
<a href="#"> <i class="fal fa-long-arrow-alt-right"></i> </a>
 </section>
 <section class="section newsletter">
  <div class="container">

    <div class="newsletter-card" style="background-image: url('./images/newsletter-bg.png')">

      <h2 class="card-title">Subscribe Newsletter</h2>

      <p class="card-text">
        Enter your email below to be the first to know about new collections and product launches.
      </p>

      <form action="" class="card-form">

        <div class="input-wrapper">
          <ion-icon name="mail-outline"></ion-icon>

          <input type="email" name="emal" placeholder="Enter your email" required class="input-field">
        </div>

        <button type="submit" class="btn ">
          <span>Subscribe</span>

          <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
        </button>

      </form>

    </div>

  </div>
</section>
<footer>

    <div class="footer-category">

      <div class="container">

 
 



    <div class="footer-nav">

      <div class="container">

        <ul class="footer-nav-list">

          <li class="footer-nav-item">
            <h2 class="nav-title">Categories</h2>
          </li>

          <li class="footer-nav-item">
            <a href="shop.php" class="footer-nav-link">Dress</a>
          </li>

          <li class="footer-nav-item">
            <a href="shop.php" class="footer-nav-link">Pants</a>
          </li>

          <li class="footer-nav-item">
            <a href="shop.php" class="footer-nav-link">Bodysuits</a>
          </li>

          <li class="footer-nav-item">
            <a href="shop.php" class="footer-nav-link">Jumpsuit</a>
          </li>

       

        </ul>

        <ul class="footer-nav-list">
        
          <li class="footer-nav-item">
            <h2 class="nav-title">Products</h2>
          </li>
        
       
          <li class="footer-nav-item">
            <a href="shop.php" class="footer-nav-link">New products</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="shop.php" class="footer-nav-link">Best sales</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="contact.php" class="footer-nav-link">Contact us</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="contact.php" class="footer-nav-link">Sitemap</a>
          </li>
        
        </ul>

        <ul class="footer-nav-list">
        
          <li class="footer-nav-item">
            <h2 class="nav-title">Our Company</h2>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Delivery</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Legal Notice</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Terms and conditions</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="about.php" class="footer-nav-link">About us</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Secure payment</a>
          </li>
        
        </ul>

        <ul class="footer-nav-list">
        
          <li class="footer-nav-item">
            <h2 class="nav-title">Services</h2>
          </li>
          <li class="footer-nav-item">
            <a href="signup.php" class="footer-nav-link">Sign Up</a>
          </li>
          <li class="footer-nav-item">
            <a href="login.php" class="footer-nav-link">Log In</a>
          </li>
          <li class="footer-nav-item">
            <a href="cart.php" class="footer-nav-link">My Cart</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="cart.php" class="footer-nav-link">CheckOut</a>
          </li>
    
        
          <li class="footer-nav-item">
            <a href="contact.php" class="footer-nav-link">Contact us</a>
          </li>
        
       
        
        </ul>

        <ul class="footer-nav-list">

          <li class="footer-nav-item">
            <h2 class="nav-title">Contact</h2>
          </li>

          <li class="footer-nav-item flex">
            <div class="icon-box">
              <ion-icon name="location-outline"></ion-icon>
            </div>

            <address class="content">
            Al-Ersal Street, first floor, Al-Safina Building
            </address>
          </li>

          <li class="footer-nav-item flex">
            <div class="icon-box">
              <ion-icon name="call-outline"></ion-icon>
            </div>

            <a href="tel:+607936-8058" class="footer-nav-link">(607) 936-8058</a>
          </li>

          <li class="footer-nav-item flex">
            <div class="icon-box">
              <ion-icon name="mail-outline"></ion-icon>
            </div>

            <a href="mailto:example@gmail.com" class="footer-nav-link">example@gmail.com</a>
          </li>

        </ul>

        <ul class="footer-nav-list">

          <li class="footer-nav-item">
            <h2 class="nav-title">Follow Us</h2>
          </li>
          <li>
            <ul class="social-link">

              <li class="footer-nav-item">
                <a href="#" class="footer-nav-link">
                  <ion-icon name="logo-facebook"></ion-icon>
                </a>
              </li>

              <li class="footer-nav-item">
                <a href="#" class="footer-nav-link">
                  <ion-icon name="logo-twitter"></ion-icon>
                </a>
              </li>

              <li class="footer-nav-item">
                <a href="#" class="footer-nav-link">
                  <ion-icon name="logo-linkedin"></ion-icon>
                </a>
              </li>

              <li class="footer-nav-item">
                <a href="#" class="footer-nav-link">
                  <ion-icon name="logo-instagram"></ion-icon>
                </a>
              </li>
         
            </div>
        

            </ul>
          </li>

        </ul>

      </div>

    </div>

    <div class="footer-bottom">

      <div class="container">
        <div class="col install">
          <h4> install app</h4>
          <p>
              from app
          </p>
          <div class="row">
  
        
        <img src ="./images/app.jpg ">
        <img src="./images/play.jpg"  > 
      </div>
      <p>
          secured payment gateaway
      </p>
      <img src="./images/pay.png" > 
  
      </div>
       

        <p class="copyright">
          Copyright &copy;  SNG all rights reserved.
        </p>

      </div>
   
  </footer>



  <script src="script.js"></script>

<script type="text/javascript">
  function redirectToProductDetails(element) {
      var productId = element.getAttribute('data-productid');
      window.location.href = 'sproduct.php?product_id=' + productId;
  }
</script>


</body>
</html>