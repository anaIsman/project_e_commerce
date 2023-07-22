<?php
error_reporting(-1);
require_once("../php/utils/cnx.database.php");
require("../php/utils/function.php");

isConnected();
isAdmin();

if ($_SERVER["REQUEST_METHOD"] == "POST") $method = $_POST;
else $method = $_GET;

switch ($method["choisir"]) {
    case 'select':
        $stmt = $bdd->query("SELECT id, firstname, lastname, email FROM users");
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(["success" => true, "users" => $users]);
        break;

    case 'select_id':
        if (!isset($method["user_id"]) || empty(trim($method["user_id"]))) {
            echo json_encode(["success" => false, "error" => "Id manquant"]);
            die;
        }

        $stmt = $bdd->prepare("SELECT id, firstname, lastname, email FROM users WHERE id = ?");
        $req->execute([$method["user_id"]]);
        $user = $req->fetch(PDO::FETCH_ASSOC);

        echo json_encode(["success" => true, "user" => $user]);
        break;

    case 'update':

        if (!isset($method["firstname"], $method["lastname"], $method["email"], $method["user_id"]) || empty(trim($method["firstname"])) || empty(trim($method["lastname"])) || empty(trim($method["email"])) || empty(trim($method["user_id"]))) {
            echo json_encode(["success" => false, "error" => "Données manquantes"]);
            die;
        }

        $regex = "/^[a-zA-Z0-9-+._]+@[a-zA-Z0-9-]{2,}\.[a-zA-Z]{2,}$/";

        if (!preg_match($regex, $method["email"])) {

            echo json_encode(["success" => false, "error" => "Email ne correspond pas au format"]);
            die;
        }

        $stmt = $db->prepare("UPDATE users SET firstname = :firstname, lastname = :lastname, email = :email WHERE id = :user_id");
        $stmt->bindValue(":firstname", $method["firstname"]);
        $stmt->bindValue(":lastname", $method["lastname"]);
        $stmt->bindValue(":email", $method["email"]);
        $stmt->bindValue(":user_id", $method["user_id"]);
        $stmt->execute();

        echo json_encode(["success" => true]);
        break;
};
