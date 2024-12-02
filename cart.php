<!DOCTYPE html>
<html lang="en">
<head> <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
  <link rel="stylesheet" href="./main.css">
</head>
<style>
  #page-header-cart {
    background-image: url("./images/cart-scetion.png");
    width: 102%;
    height: 20vh;
    background-size: cover;
    display: flex;
    justify-content: center;
    text-align: center;
    flex-direction: column;
    padding: 14px;
  }
</style>
<body>
<section id="header">
    <a href="#"> <img  src= "./images/Screenshot 2024-04-18 042407.png" class="logo" alt="this is logo" ></a>
    <div>
        <ul id="navbar">
    <li ><a href="index.php" >Home</a>     </li>
    <li ><a href="Shop.php">Shop</a></li>
    <li ><a   href="blog.php">Blog</a></li>
    <li ><a href="about.php">About</a></li>
    <li ><a href="contact.php">Contact</a></li>
  
   
     <?php
      session_start(); 
      if (!isset($_SESSION['username'])): ?>
    <li>
              <a href="login.php">Login</a></li>
        <?php else: ?>
            <li><a href="logout.php">Logout</a></li>
        <?php endif; ?>

        <?php
        if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'ADMIN'): ?>
            <li><a href="admin_panel.php">Admin Panel</a></li>
        <?php endif; ?>

        <?php  if (isset($_SESSION['username'])): ?>

            <li id="lg-bag"><a class="active"  href="cart.php"><i class="far fa-shopping-bag"></i></a></li>
        <?php endif; ?>
 
        <a href="#" id="close"><i class="far fa-times"></i></a>
        </ul>
    </div>
    <div id="mobile">
      
       
            <a href="cart.html"> 
                <i class="far fa-shopping-bag"> </i>
            </a>
            <i id="bar" class="fas fa-outdent"></i>
       
    </div>
       </section>

   
<section id="page-header" class="about-header">

</section>
<?php
  // Include the database configuration file
  include 'config.php';

  // Create connection
  $conn = connectDB();
  $userId = $_SESSION['userId'];
  // Query the database to retrieve cart items
  $sql = "SELECT c.cart_id, p.product_id, p.name AS product_name, p.price, p.size, cp.quantity 
  FROM cart c
  INNER JOIN cart_products cp ON c.cart_id = cp.cart_id
  INNER JOIN products p ON cp.product_id = p.product_id 
  WHERE c.user_id = $userId AND c.cart_id NOT IN (SELECT cart_id FROM orders)";
  $result = $conn->query($sql);
  $totalPrice = 0;
  ?>

<section id="cart" class="section-p1">
<?php if (isset($_SESSION['message_cart_delete'])) {
      echo "<div class='success' style='  color: green;
          font-weight: bold;
          margin-top: 10px;'>" . $_SESSION['message_cart_delete'] . "</div>";
      unset($_SESSION['message_cart_delete']);
    } ?>
    <table width="100%">
        <thead>
<tr>

<td>
    Remove
</td>
<td>
Image
</td>
<td>
  Product
</td>
<td>
   Price
</td>
<td>
    Quantity
 </td>
 <td>
    Subtotal
 </td>


</tr>


        </thead>
<tbody>
<?php
        // Iterate over the retrieved items and generate HTML dynamically
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $totalPrice += $row['price'] * $row['quantity'];
            ?>
            <tr>
              <td>
                <form method="post" action="remove_item.php">
                  <input type="hidden" name="item_id" value="<?php echo $row['product_id']; ?>">
                  <button type="submit" name="remove_item">
                    <i class="far fa-times-circle"></i>
                  </button>
                </form>
              </td>
              <td><img src="./images/<?php echo $row['product_name']; ?>.webp"></td>
              <td><?php echo $row['product_name']; ?></td>
              <td><?php echo $row['price'] . "$"; ?></td>
              <td><?php echo $row['quantity']; ?></td>
              <td><?php echo $row['price'] * $row['quantity'] . "$"; ?></td>
            </tr>
            <?php
          }


        } else {
          echo "<tr><td colspan='6'>No items in cart</td></tr>";
        }
        ?>
</tbody>

        </table>
</section>
<section id="cart-add" class="section-p1">

    <div id="subtotal">
        <h3>
            Cart Totals
        </h3>
        <table>
            <tr>
                <td>Cart Subtotal </td>
                <td>$<?php echo $totalPrice; ?></td>
            </tr>
            <tr>
                <td>Shipping</td>
                <td>Free</td>
            </tr>
            <tr>
                <td><strong>Total</strong></td>
                <td><strong>$<?php echo $totalPrice; ?></strong></td>
            </tr>
        </table>
        <?php if ($totalPrice > 0) {
        echo '<button class="normal" onclick="window.location.href=\'checkout.php\'">Proceed to Checkout</button>';
      } ?>
    </div>
</section>

<?php
  // Close connection
  $conn->close();
  ?>

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