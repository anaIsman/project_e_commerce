<?php
error_reporting(-1);
require_once("../php/utils/cnx.database.php");

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    echo json_encode(["success" => false, "error" => "Mauvaise méthode"]);
    die;
}
if (!isset($_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["pwd"])) {
    echo json_encode(["success" => false, "error" => "Données introuvables"]);
    die;
}
if (
    empty(trim($_POST["firstname"])) ||
    empty(trim($_POST["lastname"])) ||
    empty(trim($_POST["email"])) ||
    empty(trim($_POST["pwd"]))
) {
    echo json_encode(["success" => false, "error" => "Données vides"]);
    die;
}

$regex = "/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])[a-zA-Z0-9]{8,12}$/";
if (!preg_match($regex, $_POST["pwd"])) {
    echo json_encode(["success" => false, "error" => "Le mot de passe ne correspond pas au format"]);
    die;
}

$hash = password_hash($_POST["pwd"], PASSWORD_DEFAULT);

$req = $bdd->prepare("INSERT INTO users(firstname,lastname, email, pwd) VALUES (:firstname, :lastname, :email, :pwd)");
$req->bindvalue(":firstname", htmlspecialchars($_POST["firstname"]));
$req->bindvalue(":lastname", htmlspecialchars($_POST["lastname"]));
$req->bindvalue(":email", htmlspecialchars($_POST["email"]));
$req->bindvalue(":pwd", $hash);
$req->execute();

if ($req->rowcount()) echo json_encode(["success" => true]);
else echo json_encode(["success" => false, "error" => "email déja existant"]);
