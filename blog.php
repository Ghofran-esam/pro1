<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./main.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:wght@100;900&display=swap" rel="stylesheet">

</head>
<body>
<section id="header">
    <a href="#"> <img  src= "./images/Screenshot 2024-04-18 042407.png" class="logo" alt="this is logo" ></a>
    <div>
    <ul id="navbar">
        <li><a  href="index.php">Home</a></li>
        <li><a href="shop.php">Shop</a></li>
        <li><a class="active"  href="blog.php">Blog</a></li>
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





       <section id="blog-header">

       </section>
       <section id="blog">
        <div class="blog-heading">
        
            <h3>Our Blog</h3>
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
            <div class="blog-box">
              <div class="blog-img">
                  <img src="./images/11.png" alt="Blog Image">
              </div>
              <div class="blog-text">
                  <span>1 February 2024 /Ghofran</span> 
                  <a href="#" class="blog-title">Labels How It Helps You When Shopping Online, 54% OFF</a>
                  <p>Your blog post content goes here...</p>
                  <a href="#">Read More</a>
              </div>
          </div>
            
          <div class="blog-box">
            <div class="blog-img">
                <img src="./images/تصميم بدون عنوان.png" alt="Blog Image">
            </div>
            <div class="blog-text">
                <span>20 August 2022 /Nijma</span> 
                <a href="#" class="blog-title">Best designer dress on affordable price</a>
                <p>Your blog post content goes here...</p>
                <a href="#">Read More</a>
            </div>
        </div>
        <div class="blog-box">
          <div class="blog-img">
              <img src="./images/تصميم بدون عنوان (2).png" alt="Blog Image">
          </div>
          <div class="blog-text">
              <span>2 February 2022 /Sadeil</span> 
              <a href="#" class="blog-title">How to Buy the Best Fashion Clothes Online for Women Today! </a>
              <p>Your blog post content goes here...</p>
              <a href="#">Read More</a>
          </div>
      </div>
      
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


    

</body>
</html>