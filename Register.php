<?php
require_once 'includes/db-conexion.php';
$db = new Db_Connect();
$conn = $db->connect();

$email = $_POST["email"];
$usuario = $_POST["usuario"];
$password = $_POST["password"];

$stmt = mysqli_prepare($conn, "INSERT INTO usuarios (usuario, email, password) VALUES (?, ?, ?)");
mysqli_stmt_bind_param($stmt, "sss", $usuario, $email, $password);
mysqli_stmt_execute($stmt);

$response =array();
$response["success"] = true;

echo json_encode($response);
