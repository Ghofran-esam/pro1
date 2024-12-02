
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Funel - Agancy landing page</title>

  <!-- 
    - favicon link
  -->
 

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./main.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:wght@100;900&display=swap" rel="stylesheet">

</head>

<body id="top">

  


  
  <section id="header">
    <a href="#"> <img  src= "./images/Screenshot 2024-04-18 042407.png" class="logo" alt="this is logo" ></a>
    <div>
    <ul id="navbar">
        <li><a  href="index.php">Home</a></li>
        <li><a href="shop.php">Shop</a></li>
        <li><a href="blog.php">Blog</a></li>
        <li><a class="active" href="about.php">About</a></li>
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


           <section id="about-header">

           </section>
               <div class="container">
      <section class="about" id="about">
        <div class="container">

          <div class="about-top">

            <h2 class="h2 section-title">What we do</h2>

            <p class="section-text">
              This store was made specifically for you so that you do not get tired in the market stores and in the end you lose your money and the goods are not good. Our store is a virtual shopping cart and we have many features.
            </p>

            <ul class="about-list">

              <li>
                <div class="about-card">

                  <div class="card-icon">
                    <ion-icon name="shirt-outline"></ion-icon>
                  </div>

                  <h3 class="h3 card-title">free shipping</h3>

                  <p class="card-text">
                    We do not have any fees for shipping, unlike most online stores, so you can consider yourself as if you are buying from a store in the market
                  </p>

                </div>
              </li>

              <li>
                <div class="about-card">

                  <div class="card-icon">
                    <ion-icon name="gift-outline"></ion-icon>
                  </div>

                  <h3 class="h3 card-title">Promotions</h3>

                  <p class="card-text">
                    If you are our customer and buy from us regularly, you can obtain permanent discount cards for life that start with discounts from 10% to 50%.
                  </p>

                </div>
              </li>

              <li>
                <div class="about-card">

                  <div class="card-icon">
                    <ion-icon name="wallet-outline"></ion-icon>
                  </div>

                  <h3 class="h3 card-title">Save Money</h3>

                  <p class="card-text">
                    Instead of buying clothes from stores and losing your money and the goods are not good, save your money with us with high quality.
                  </p>

                </div>
              </li>

            </ul>

          </div>

          <div class="about-bottom">

            <figure class="about-bottom-banner">
              <img src="./images/about-banner.png" alt="about banner" class="about-banner">
            </figure>

            <div class="about-bottom-content">

              <h2 class="h2 section-title">How It Started</h2>

              <p class="section-text">
                We three girls started our story by saying that we always complain about the markets and that the goods are not good. Otherwise, we would have been able to wear the finest and best clothes, and we wanted to design our pieces with our own hands and to our taste. Until our friend Najma brought this topic up as a joke, and this idea was taken seriously! We are a great team
              </p>

    

            </div>

          </div>

        </div>
      </section>





      <!-- 
        - #FEATURES
      -->

      <section class="features" id="features">
        <div class="container">

          <h2 class="h2 section-title">Our team is made up of all different backgrounds from all over the world.</h2>

          <p class="section-text">
            You can communicate with anyone from the team and they are available 24 hours to serve you
          </p>

          <ul class="features-list">

            <li class="features-item">

              <figure class="features-item-banner">
                <img src="./images/feature-1.png" alt="feature banner">
              </figure>

              <div class="feature-item-content">
                <h3 class="h2 item-title">Make yourself at home!</h3>

                <p class="item-text">
                  You can exchange pieces of clothing whenever you want and without paying extra, provided that the piece does not remain with you for more than 3 days.
                </p>
              </div>

            </li>

            <li class="features-item">

              <figure class="features-item-banner">
                <img src="./images/feature-2.png" alt="feature banner">
              </figure>

              <div class="feature-item-content">
                <h3 class="h2 item-title">We offer low fees that are transparent</h3>

                <p class="item-text">
                  This is what you will find when you see our store, as there are no fees on shipping and no huge amounts of money on clothes and all of this and the quality is very excellent.
                </p>
              </div>

            </li>

          </ul>

        </div>
        
      </section>
    
    </div>



 <!--
    - FOOTER
  -->

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







      <!-- 
        - #CTA
      -->

     
   

    </article>







  



  <!-- 
    - #GO TO TOP
  -->

  <a href="#top" class="go-top active" data-go-top>
    <ion-icon name="chevron-up-outline"></ion-icon>
  </a>





  <!-- 
    - custom js link
  -->
  <script src="./js/script.js"></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>