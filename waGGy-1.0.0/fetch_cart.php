<?php
header('Content-Type: application/json');
session_start();
include '../connection.php'; // Your database connection script

$userId = $_SESSION['user_id']; // Ensure the user is logged in

$query = $con->prepare('SELECT c.pet_id, c.quantity, c.price, c.total, p.name AS petName, p.image
                        FROM cart c
                        JOIN pets p ON c.pet_id = p.id
                        WHERE c.user_id = ?');
$query->bind_param('i', $userId);
$query->execute();
$result = $query->get_result();

$items = [];
$total = 0;

while ($row = $result->fetch_assoc()) {
    $items[] = $row;
    $total += $row['total'];
}

echo json_encode(['items' => $items, 'total' => $total]);
?>
