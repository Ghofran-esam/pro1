<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Shopping</title>

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
 

<link rel="stylesheet" href="main.css">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">


</head>
<body>
  
<section id="header">
    <a href="#"> <img  src= "./images/Screenshot 2024-04-18 042407.png" class="logo" alt="this is logo" ></a>
    <div>
    <ul id="navbar">
        <li><a class="active"  href="index.php">Home</a></li>
        <li><a href="shop.php">Shop</a></li>
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



    <section class="textt">
<h4>Trade-in-offfer</h4>
<h2>Super value deals</h2>
<h1>On all Products</h1>
<p>Save more with Coupons&up to 70%off!</p>
<button class="normal" onclick="window.location.href='shop.html'">Shop Now</button>
    </section>

<section id="features" class="section-p1">
<div class="fe-box">
    <img src="./images/f1.png">
    <h6> Free Shipping</h6>
</div>
<div class="fe-box">
    <img src="./images/f2.png">
    <h6> Online Order</h6>
</div>
<div class="fe-box">
    <img src="./images/f3.png">
    <h6> Save Money</h6>
</div>
<div class="fe-box">
    <img src="./images/f4.png">
    <h6> Promotions</h6>
</div>
<div class="fe-box">
    <img src="./images/f5.png">
    <h6> Happy sell</h6>
</div>
<div class="fe-box">
    <img src="./images/f6.png">
    <h6> F24/7 Support</h6>
</div>
</section>

<section id="product1" class="section-p1">
<h2>
   Featured Products 
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
      
      <div class="pro" data-productid="<?php echo $row["id"]; ?>" onclick="redirectToProductDetails(this)">
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



<section id="blog">
  <div class="blog-heading">
  
      <h3>From Our Blog</h3>
  </div>

  <div class="blog-container">
      <div class="blog-box">
          <div class="blog-img">
              <img src="./images/blog4.jpg" alt="Blog Image">
          </div>
          <div class="blog-text">
              <span>18 April 2024/ Nijma</span> 
              <a href="#" class="blog-title">Heavy discount on our summer sale</a>
              <p>Your blog post content goes here...</p>
              <a href="#">Read More</a>
          </div>
      </div>

      <div class="blog-box">
          <div class="blog-img">
              <img src="./images/blog5.jpg" alt="Blog Image">
          </div>
          <div class="blog-text">
              <span>20 August 2023 /Sadeil</span> 
              <a href="#" class="blog-title">How Outfits Create Elegance</a>
              <p>Your blog post content goes here...</p>
              <a href="#">Read More</a>
          </div>
      </div>

      <div class="blog-box">
          <div class="blog-img">
              <img src="./images/h1-img-13.jpg" alt="Blog Image">
          </div>
          <div class="blog-text">
              <span>18 February 2024 /Ghofran</span> 
              <a href="#" class="blog-title">main benefits of buying women's clothing online</a>
              <p>Your blog post content goes here...</p>
              <a href="#">Read More</a>
          </div>
      </div>
      

  </div>
</section>

<section id="latest-collection">
  <div class="container">
    <div class="product-collection row">
      <div class="col-lg-7 col-md-12 left-content">
        <div class="collection-item">
          <div class="products-thumb">
            <img src="images/collection-item1.jpg" alt="collection item" class="large-image image-rounded">
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 product-entry">
            <div class="categories">casual collection</div>
            <h3 class="item-title">street wear.</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dignissim massa diam elementum.</p>
            <div class="btn-wrap">
              <a href="shop.html" class="d-flex align-items-center">shop collection <i class="icon icon-arrow-io"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-5 col-md-12 right-content flex-wrap">
        <div class="collection-item top-item">
          <div class="products-thumb">
            <img src="images/collection-item2.jpg" alt="collection item" class="small-image image-rounded">
          </div>
          <div class="col-md-6 product-entry">
            <div class="categories">Basic Collection</div>
            <h3 class="item-title">Basic shoes.</h3>
            <div class="btn-wrap">
              <a href="shop.html" class="d-flex align-items-center">shop collection <i class="icon icon-arrow-io"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="collection-item bottom-item">
          <div class="products-thumb">
            <img src="images/collection-item3.jpg" alt="collection item" class="small-image image-rounded">
          </div>
          <div class="col-md-6 product-entry">
            <div class="categories">Best Selling Product</div>
            <h3 class="item-title">woolen hat.</h3>
            <div class="btn-wrap">
              <a href="shop.html" class="d-flex align-items-center">shop collection <i class="icon icon-arrow-io"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
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