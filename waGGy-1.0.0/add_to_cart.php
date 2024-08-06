<?php
header('Content-Type: application/json');
session_start();
include 'connection.php'; // Your database connection script

$data = json_decode(file_get_contents('php://input'), true);
$petId = $data['petId'];
$quantity = $data['quantity'];
$userId = $_SESSION['user_id']; // Ensure the user is logged in

// Sanitize inputs
$petId = mysqli_real_escape_string($con, $petId);
$quantity = mysqli_real_escape_string($con, $quantity);

// Check if item already exists in the cart
$query = $con->prepare('SELECT * FROM cart WHERE user_id = ? AND pet_id = ?');
$query->bind_param('ii', $userId, $petId);
$query->execute();
$result = $query->get_result();

if ($result->num_rows > 0) {
    // Update quantity if item exists
    $query = $con->prepare('UPDATE cart SET quantity = quantity + ? WHERE user_id = ? AND pet_id = ?');
    $query->bind_param('iii', $quantity, $userId, $petId);
} else {
    // Insert new item if not exists
    $priceQuery = $con->prepare('SELECT price FROM pets WHERE id = ?');
    $priceQuery->bind_param('i', $petId);
    $priceQuery->execute();
    $priceResult = $priceQuery->get_result();
    $price = $priceResult->fetch_assoc()['price'];
    $total = $price * $quantity;
    $query = $con->prepare('INSERT INTO cart (user_id, pet_id, quantity, price, total) VALUES (?, ?, ?, ?, ?)');
    $query->bind_param('iiidd', $userId, $petId, $quantity, $price, $total);
}

$query->execute();

// Get updated cart count
$query = $con->prepare('SELECT COUNT(*) AS count FROM cart WHERE user_id = ?');
$query->bind_param('i', $userId);
$query->execute();
$countResult = $query->get_result();
$count = $countResult->fetch_assoc()['count'];

echo json_encode(['success' => true, 'cartCount' => $count]);
?>
