<?php
// Check if the form is submitted
session_start();
require_once "config.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = htmlspecialchars($_POST["fullName"]);
    $fullAddress = htmlspecialchars($_POST["fullAddress"]);
    $mobileNumber = htmlspecialchars($_POST["mobileNumber"]);
    $totalPrice = $_POST["totalPrice"];
    $cartId = $_POST["cartId"];
    $userId =$_SESSION['userId'];
    if (empty($fullName) || empty($fullAddress) || empty($mobileNumber)) {
        echo "Please fill in all the required fields.";
    } else {

        $conn = connectDB();

        $sql = "INSERT INTO orders (user_id,cart_id,full_name, full_address, mobile_number,total_price) VALUES ($userId,$cartId,'$fullName', '$fullAddress', '$mobileNumber','$totalPrice')";

        // Execute the SQL statement
        if ($conn->query($sql) === TRUE) {
            $_SESSION['message_place_order'] = "Order placed successfully!";
            header("refresh:3; url=index.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error; 
            header('Location: ' . $_SERVER['HTTP_REFERER']);
    
           }

        $conn->close();
    }
}

// Redirect back to the previous page
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
?>
