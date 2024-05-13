<?php
session_start();

include 'components/connect.php';

if(isset($_POST['productId'], $_POST['productImage'], $_POST['productName'], $_POST['productPrice']) && isset($_SESSION['user-email']) && isset($_SESSION['user-id'])) {
    $productId = $_POST['productId'];
    $productImage = $_POST['productImage'];
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $userEmail = $_SESSION['user-email'];
    $userId = $_SESSION['user-id'];

    $existingProductQuery = $con->prepare("SELECT * FROM wishlist WHERE Wishlist_Name = ? AND user_email = ? LIMIT 1");
    $existingProductQuery->bind_param("ss", $productName, $userEmail);
    $existingProductQuery->execute();
    $existingProductResult = $existingProductQuery->get_result();

    if ($existingProductResult->num_rows > 0) {
        echo json_encode(array('success' => false, 'error' => 'Item already exists in wishlist'));
    } else {
        $sql = "INSERT INTO wishlist (user_id, user_email, Wishlist_Image, Wishlist_Name, Wishlist_Price, Wishlist_Quantity) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $con->prepare($sql);
        
        $defaultQuantity = 1;
        $stmt->bind_param("isssdi", $userId, $userEmail, $productImage, $productName, $productPrice, $defaultQuantity);
        $success = $stmt->execute();
        $stmt->close();

        if ($success) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('success' => false, 'error' => 'Error adding item to wishlist'));
        }
    }
} else {
    echo json_encode(array('success' => false, 'error' => 'Invalid data received or user not logged in'));
}

$con->close();
?>
