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
        <li><a  href="about.php">About</a></li>
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
       <?php
  include 'config.php';
  $conn = connectDB();

  // Retrieving product_id from URL parameter
  $productId = $_GET['product_id'];

  // Query to select product details based on product_id
  $sql = "SELECT product_id as id, name, size, category, price, description FROM products WHERE product_id = $productId";
  $result = $conn->query($sql);

  ?>


   <section id="prodetails" class="section-p1">

<div class="single-pro-image">
<?php
      if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <form action="addToCart.php" method="post">
        <img src="./images/<?php echo $row["name"]; ?>.webp" width="100%" id="MainImg">
<div class="small-img-groub">


<div class="small-img-col">
              <img src="./images/<?php echo $row["name"]; ?>_2.webp" width="100%" class="small-img" alt="">
            </div>
            <div class="small-img-col">
              <img src="./images/<?php echo $row["name"]; ?>_3.webp" width="100%" class="small-img" alt="">
            </div>
            <div class="small-img-col">
              <img src="./images/<?php echo $row["name"]; ?>_4.webp" width="100%" class="small-img" alt="">
            </div>
            <div class="small-img-col">
              <img src="./images/<?php echo $row["name"]; ?>.webp" width="100%" class="small-img" alt="">
            </div>
          </div>
      </div>

<div class="single-pro-details">
<?php
        if (isset($_SESSION['message'])) {
          echo "<div class='success' style='  color: green;
          font-weight: bold;
          margin-top: 10px;'>" . $_SESSION['message'] . "</div>";
          unset($_SESSION['message']);
        } else if (isset($_SESSION['message_ERROR'])) {
          echo "<div class='success' style='  color: red;
          font-weight: bold;
          margin-top: 10px;'>" . $_SESSION['message_ERROR'] . "</div>";
          unset($_SESSION['message_ERROR']);
        }
        ?>
        <h6 style="cursor:pointer; padding:5px; border-radius: 3px; border: solid #080808 1px; width: 40px;"
          onclick="window.location.href='shop.php'">
          Back
        </h6>
        <input type="hidden" name="productId" value="<?php echo $row['id']; ?>">
        <h4><?php echo $row["name"]; ?></h4>
        <h2>$<?php echo $row["price"]; ?></h2>
        <select name="size">
          <option>select size</option>
          <option><?php echo $row["size"]; ?></option>
        </select>
        <input type="number" name="quantity" min="1"value="1" style="border: solid 1px #000;">
        <button class="normal" style="cursor:pointer; margin: 5px; padding: 5px;" type="submit">Add To Cart</button>
        <h4>Product Details</h4>
        <span><?php echo $row["description"]; ?></span>
      </div>
      </form>

      <?php
      } else {
        echo "Product not found";
      }

      ?>


    </section>


    <section id="product1" class="section-p1">
        <h2>
           Featured Products 
        </h2>
        <p>
            Lorem, ipsum dolor sit amet consectetur adipisic
        </p>
       
        <div class="pro-container">
        <?php


$sqlGet = "SELECT product_id as id, name, size,category, price FROM products";

$resultFetured = $conn->query($sqlGet);
if ($resultFetured) {
  ?>

  <?php while ($rowFetured = $resultFetured->fetch_assoc()): ?>
          <div class="pro"data-productid="<?php echo $rowFetured["id"]; ?>" onclick="redirectToProductDetails(this)">
          <img src="./images/<?php echo $rowFetured["name"]; ?>.webp">
              <div class="des">
              <span><?php echo $rowFetured["category"]; ?></span>
              <h5><?php echo $rowFetured["name"]; ?></h5>
              <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <h4>$<?php echo $rowFetured["price"]; ?></h4>
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
      





        <script>
    var MainImg = document.getElementById("MainImg");
    var smallimg = document.getElementsByClassName("small-img");
    smallimg[0].onclick = function () {
      MainImg.src = smallimg[0].src;
    }
    smallimg[1].onclick = function () {
      MainImg.src = smallimg[1].src;
    }
    smallimg[2].onclick = function () {
      MainImg.src = smallimg[2].src;
    }
    smallimg[3].onclick = function () {
      MainImg.src = smallimg[3].src;
    }

    function redirectToProductDetails(element) {
      var productId = element.getAttribute('data-productid');
      window.location.href = 'sproduct.php?product_id=' + productId;
    }

    // function addToCart() {
    //   var quantity = document.getElementById('quantity').value;
    //   var productId = document.getElementById('productId').value;

    //     $.post('addToCart.php', { productId: productId , quantity: quantity}, function(response) {
    //         alert(response.message);
    //     }, 'json');
    // }

  </script>

  <script src="script.js"></script>

</body>
</html>