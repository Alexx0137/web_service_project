<?php
$servername = "localhost";
$username = "root";
$password = ""; // Tu contraseña de MySQL, si tienes una

// Crear conexión
$conn = new mysqli($servername, $username, $password);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Crear base de datos si no existe
$dbname = "test2";
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    // Conectar a la base de datos
    $conn->select_db($dbname);
} else {
    die("Error creating database: " . $conn->error);
}

// Crear tabla users si no existe
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) DEFAULT NULL,
    user VARCHAR(20) NOT NULL,
    password VARCHAR(60) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
if ($conn->query($sql) !== TRUE) {
    die("Error creating table: " . $conn->error);
}
?>
