<?php
session_start();
header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['id']) && isset($data['quantity'])) {
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] == $data['id']) {
            $item['quantity'] = (int)$data['quantity'];
            echo json_encode(['success' => true]);
            exit;
        }
    }
}
echo json_encode(['success' => false]);
?>
