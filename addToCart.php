<?php
session_start();

include 'config.php';

// Connect to the database
$conn = connectDB();

if (isset($_POST['productId'], $_POST['quantity'], $_SESSION['userId'])) {
    $productId = $_POST['productId'];
    $quantity = $_POST['quantity'];
    $userId = $_SESSION['userId'];

    // Check if the user is logged in
    if (!isset($_SESSION['userId'])) {
        $_SESSION['message'] = 'Please login before adding to cart.';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }

    // Check if the product already exists in the cart
    $check_query = "SELECT cart_id FROM cart WHERE user_id = $userId AND cart_id NOT IN (SELECT cart_id FROM orders)";
    $check_result_cart = $conn->query($check_query);

    if ($check_result_cart && $check_result_cart->num_rows > 0) {
        $cartId = $check_result_cart->fetch_assoc()['cart_id'];
    } else {
        // Cart does not exist, create a new cart
        $insert_cart_query = "INSERT INTO cart (user_id) VALUES ($userId)";
        $conn->query($insert_cart_query);

        $cartId = $conn->insert_id;
    }

    // Check if the product already exists in the cart
    $check_product_query = "SELECT * FROM cart_products WHERE cart_id = $cartId AND product_id = $productId";
    $check_result_product = $conn->query($check_product_query);

    if ($check_result_product && $check_result_product->num_rows > 0) {
        // Product already exists, update quantity
        $update_query = "UPDATE cart_products SET quantity = quantity + $quantity WHERE cart_id = $cartId AND product_id = $productId";
        $conn->query($update_query);
    } else {
        // Product does not exist, insert new record
        $insert_query = "INSERT INTO cart_products (cart_id, product_id, quantity) VALUES ($cartId, $productId, $quantity)";
        $conn->query($insert_query);
    }

    $_SESSION['message'] = 'Item added to cart successfully!';
} else {
    $_SESSION['message_ERROR'] = 'Please login before adding to cart.';
}

// Redirect back to the previous page
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
?>
