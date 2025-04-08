<?php
session_start();
header('Content-Type: application/json'); // Nagłówek informujący, że odpowiedź to JSON

// Sprawdzanie sesji
if (isset($_SESSION['user_id'])) {
    echo json_encode(['user_id' => $_SESSION['user_id']]);
} else {
    echo json_encode(['error' => 'Brak sesji']);
}
?>
