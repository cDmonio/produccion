<?php
require_once 'includes/functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);

if (isset($_POST['usuario']) && isset($_POST['password'])) {

    // receiving the post params
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // get the user by email and password
    $user = $db->getUserByUsuarioAndPassword($usuario, $password);

    if ($user != false) {
        // use is found
        $response["error"] = FALSE;
        $response["id"] = $user["id"];
        $response["user"]["usuario"] = $user["usuario"];
        $response["user"]["email"] = $user["email"];
        $response["user"]["creado_en"] = $user["creado_en"];
        $response["user"]["actualizado_en"] = $user["actualizado_en"];
        echo json_encode($response);
    } else {
        // user is not found with the credentials
        $response["error"] = TRUE;
        $response["error_msg"] = "Ha ocurrido un error al iniciar sesion. Intente de nuevo!";
        echo json_encode($response);
    }
} else {
    // required post params is missing
    $response["error"] = TRUE;
    $response["error_msg"] = "Se requieren un usuario y - o contrasenas invalidos!";
    echo json_encode($response);
}
?>
