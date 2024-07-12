<?php
include 'db.php'; // Asegúrate de que db.php está configurado correctamente

header('Content-Type: application/json');

// Capturar datos JSON desde la solicitud
$data = json_decode(file_get_contents("php://input"));

$user = $data->user;
$password = $data->password;

// Buscar el usuario en la base de datos
$query = $conn->prepare("SELECT * FROM users WHERE user = ?");
$query->bind_param("s", $user);
$query->execute();
$result = $query->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        echo json_encode(["message" => "Authentication successful"]);
    } else {
        echo json_encode(["error" => "Invalid username or password"]);
    }
} else {
    echo json_encode(["error" => "Invalid username or password"]);
}

$conn->close();
?>
