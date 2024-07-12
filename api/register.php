<?php
include 'db.php'; // Asegúrate de que db.php está configurado correctamente

header('Content-Type: application/json');

// Capturar datos JSON desde la solicitud
$data = json_decode(file_get_contents("php://input"));

$name = $data->name;
$last_name = $data->last_name;
$user = $data->user;
$password = password_hash($data->password, PASSWORD_BCRYPT);

// Verificar si el usuario ya existe
$query = $conn->prepare("SELECT * FROM users WHERE user = ?");
$query->bind_param("s", $user);
$query->execute();
$result = $query->get_result();

if ($result->num_rows > 0) {
    echo json_encode(["error" => "User already exists"]);
} else {
    // Insertar el nuevo usuario en la base de datos
    $query = $conn->prepare("INSERT INTO users (name, last_name, user, password) VALUES (?, ?, ?, ?)");
    $query->bind_param("ssss", $name, $last_name, $user, $password);
    if ($query->execute()) {
        echo json_encode(["message" => "User registered successfully!"]);
    } else {
        echo json_encode(["error" => "Error registering user"]);
    }
}

$conn->close();
?>
