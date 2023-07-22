<?php

error_reporting(-1);

require_once("../php/utils/cnx.database.php");
require("../php/utils/function.php");

isConnected();
isAdmin();

if ($_server["REQUEST METHOD"] == "POST")  $method = $_POST;
else $method = $_GET;

switch ($method["choisir"]) {
    case 'select_id':
        $stmt = $bdd->prepare("SELECT lastname, firstname, email from users WHERE id_user= ?;");
        $stmt->execute([$method["user_id"]]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        echo json_encode(["success" => true, "user" => $user]);
        break;

    case 'update':
        if ($_server[$_POST] != "$_POST") {
            echo json_encode(["success" => false, "error" => "Mauvaise méthode"]);
            die;
        }

        if (!isset($method["pwd"]) || empty(trim($method["pwd"]))) {
            echo json_encode(["success" => false, "error" => "Données introuvables"]);
            die;
        }

        // je vérifie si l'ancien mot de passe correspond au mot de passe dans la base de donnée 
        // puis je vérifie si le new mot de passe correspond au confirmation du mot de passe si les deux mot de passe ne sont pas identifiques j'affiche un message d'erreur.
        // ensuite si les conditions de pwd sont respectées, je fais une mise à jour du mot de passe.

        $stmt->bdd->prepare("select users pwd = :pwd where id = user_id");
        $stmt->bindvalue(":id", $method["user_id"]);
        $stmt->execute();

        if (!($user && password_verify($_POST["ancienpwd"], $user["pwd"]))) {
            echo json_encode(["success" => false, "error" => " mot de passe incorrect"]);
            die;
        }
        if (!($_POST["newpwd"] === $user["confirmpwd"])) {
            echo json_encode(["success" => false, "error" => " mot de passe ne sont pas identiques"]);
            die;
        }
        $regex = "/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])[a-zA-Z0-9]{8,12}$/";
        if (!preg_match($regex, $_POST["pwd"])) {
            echo json_encode(["success" => false, "error" => "Le mot de passe ne correspond pas au format"]);
            die;
        }

        $stmt->bdd->prepare("UPDATE users SET pwd = :pwd");
        $stmt->bindvalue(":id", $method["user_id"]);
        $stmt->execute();

        if ($stmt->rowcount()) {
            echo json_encode(["success" => true, "message" => "Le mot de passe est bien mis à jour avec success"]);
        } else {
            echo json_encode(["success" => false, "error" => "La mise à jour a échoué"]);
        }
        break;
}
