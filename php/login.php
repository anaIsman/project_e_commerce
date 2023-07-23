<?php
error_reporting(-1);
require_once("../php/utils/cnx.database.php");


if (!isset($_POST["email"], $_POST["pwd"])) {
    echo json_encode(["success" => false, "error" => "Données introuvables"]);
    die;
}
if (empty(trim($_POST["email"])) || empty(trim($_POST["pwd"]))) {
    echo json_encode(["success" => false, "error" => "Données vides"]);
    die;
}
$req = $bdd->prepare("SELECT * FROM users WHERE email = ?");
$req->execute([$_POST["email"]]);
$user = $req->fetch(PDO::FETCH_ASSOC);


if ($user && password_verify($_POST["pwd"], $user["pwd"])) {
    session_start();
    $_SESSION["connected"] = true;
    $_SESSION["user_id"] = $user["id_user"];
    $_SESSION["admin"] = $user["admin"];

    unset($user["pwd"]);
    echo json_encode(["success" => true, "user" => $user]);
} else {


    $_SESSION = [];
    session_destroy();
    echo json_encode(["success" => false, "error" => "Aucun utilisateur"]);
}
