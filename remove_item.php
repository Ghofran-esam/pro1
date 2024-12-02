<?php
session_start();

// Include the database configuration file
include 'config.php';
$conn = connectDB();
// Check if submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['remove_item'])) {
    // Get the item ID from the form
    $item_id = $_POST['item_id'];
    $userId=$_SESSION['userId'];
    $sql = "DELETE FROM cart_products WHERE product_id = $item_id AND cart_id IN (SELECT cart_id FROM cart WHERE user_id = $userId AND cart_id NOT IN (SELECT cart_id FROM orders))";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['message_cart_delete'] = 'Item removed from cart successfully!';
    } else {
        echo "Cannot be removed!";
    }

}

// Close connection
$conn->close();

// Redirect back to the previous page
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
?>
