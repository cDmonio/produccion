<?php  session_start(); // session starts with the help of this function ?>

<?php
require_once 'includes/db-conexion.php';
$db = new Db_Connect();
$conn = $db->connect();

$usuario = $_POST["usuario"];
$password = $_POST["password"];

$stmt = mysqli_prepare($conn, "SELECT * FROM usuarios WHERE usuario = ? AND password = ?");
mysqli_stmt_bind_param($stmt, "ss", $usuario, $password);
mysqli_stmt_execute($stmt);

mysqli_stmt_store_result($stmt);

mysqli_stmt_bind_result($stmt, $id, $usuario, $email, $password, $salt, $creado_en, $actualizado_en);

$response = array();
$response["success"]=false;

while(mysqli_stmt_fetch($stmt)){
  $response["success"]= true;
  $response["usuario"]=$usuario;
  $response["email"]=$email;
  $response["password"]=$password;
  $response["salt"]=$salt;
  $response["creado_en"]=$creado_en;
  $response["actualizado_en"]=$actualizado_en;
}

echo json_encode($response);
?>
