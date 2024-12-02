<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="./main.css"> <!-- Make sure to include your main CSS file -->

</head>

<style>
    #coupon input {
        margin: 7px !important;
        width: 80%;

    }

    #coupon textarea {
        padding: 10px 20px;
        outline: none;
        width: 80%;
        margin: 7px;
        border: 4px solid #e2e9e1;
    }

    #coupon button {
        padding: 10px 20px;
        outline: none;
        width: 80%;
        margin: 7px;
        border: 4px solid #e2e9e1;
        cursor: pointer;
    }
</style>

<body>
<section id="header">

    <?php
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
    $cartId ='';
    $totalPrice = 0;


    ?>

    <section id="cart" class="section-p1">
        <?php if (isset($_SESSION['message_place_order'])) {
            echo "<div class='success' style='  color: green;
          font-weight: bold;
          margin-top: 10px;'>" . $_SESSION['message_place_order'] . "</div>";
            unset($_SESSION['message_place_order']);
        } ?>
        <table width="100%">
            <thead>
                <tr>
                    <td>Image</td>
                    <td>Product</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Subtotal</td>
                </tr>
            </thead>
            <tbody>
                <?php
                // Iterate over the retrieved items and generate HTML dynamically
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $totalPrice += $row['price'] * $row['quantity'];
                        $cartId = $row["cart_id"];
                        ?>
                        <tr>
                            <td><img src="./images/<?php echo $row['product_name']; ?>.webp"></td>
                            <td><?php echo $row['product_name']; ?></td>
                            <td><?php echo $row['price'] . "$"; ?></td>
                            <td><?php echo $row['quantity']; ?></td>
                            <td><?php echo $row['price'] * $row['quantity'] . "$"; ?></td>
                        </tr>
                        <?php
                    }
                    echo "<tr style='border-top:1px solid #088178;'><td colspan='5'>Total Is: <strong style=' font-size:16px;'> " . $totalPrice . "$</strong></td></tr>";
                } else {
                    echo "<tr><td colspan='6'>No items in cart</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </section>
    <?php
    // Close connection
    $conn->close();
    ?>

    <section id="payment" class="section-p1">
        <div class="container">
            <h2>Cash on Delivery</h2>
            <p>Please have the cash ready for payment upon delivery.</p>
            <p>Our delivery team will contact you to confirm your order and arrange the delivery.</p>
        </div>
    </section>
    <section id="address" class="section-p1">
        <div id="coupon">
            <h3>Delivery Address</h3>
            <div>
                <form action="place_order.php" method="POST">
                    <input type="hidden" name="cartId" value="<?php echo $cartId; ?>">
                    <input type="hidden" name="totalPrice" value="<?php echo $totalPrice; ?>">
                    <input required type="text" name="fullName" placeholder="Enter Your Full Name" />
                    <textarea required type="text" name="fullAddress" placeholder="Enter Your Full Address"></textarea>
                    <input required type="text" name="mobileNumber" placeholder="Enter Your Mobile Number">
                    <br>
                    <button class="normal" style="width">Place Order</button>
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