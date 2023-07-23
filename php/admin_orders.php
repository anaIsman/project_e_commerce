<?php
error_reporting(-1);
require_once("../php/utils/cnx.database.php");
require("../php/utils/function.php");

// J'appelle ma fonction pour savoir si mon utilisateur est connecté
isConnected();

if ($_SERVER["REQUEST_METHOD"] == "POST") $method = $_POST;
else $method = $_GET;


switch ($method["choisir"]) {


    case "select_id":
        // Je selectionne tous les produits(tous les colonnes) ainsi que les catégories en fonction de leur id dans les produits.
        $stmt = $bdd->prepare("SELECT * FROM products  where id_product = :id_product ");
        $stmt->bindValue(":id_product", $method['id_product'], PDO::PARAM_INT);
        $stmt->execute();
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        // Je retourne tous les produits avec un message success
        echo json_encode(["success" => true, "product" => $product]);
        break;
    case "select":
        // Je selectionne tous les produits(tous les colonnes) ainsi que les catégories en fonction de leur id dans les produits.
        $stmt = $bdd->query("SELECT o.*, concat(u.firstname, ' ', u.lastname) as client, count(po.id_order) AS total_products 
                        FROM orders o 
                        LEFT JOIN product_order po ON po.id_order = o.id_order 
                        INNER JOIN users u on u.id_user =o.id_user
                        GROUP BY (po.id_order) DESC
                        ");
        // J'affecte la totalité de mes résultats à la variable $products
        $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // Je retourne tous les produits avec un message success
        echo json_encode(["success" => true, "orders" => $orders]);
        break;
    case "validate":
        if ($_SERVER["REQUEST_METHOD"] != "GET") {

            echo json_encode(["success" => false, "error" => "Méthode non permise"]);
            die;
        }


        if (!isset($method["id"]) || empty(trim($method["id"]))) {
            // J'envoie une réponse avec un success false et un message d'erreur
            echo json_encode(["success" => false, "error" => "Données manquantes"]);
            die;
        }

        // J'écris une requete préparée de mise à jour du product à partir de son produit.
        $stmt = $bdd->prepare("UPDATE orders SET statut=:statut 
                WHERE id_order = :id");

        $stmt->bindValue(":id", $method["id"]);
        $stmt->bindValue(":statut", 1, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount()) echo json_encode(["success" => true]);
        else echo json_encode(["success" => false, "error" => $bdd->errorInfo()]);
        break;

    case "delete":
        if ($_SERVER["REQUEST_METHOD"] != "POST") {
            echo json_encode(["success" => false, "error" => "Méthode non permise"]);
            die;
        }

        if (!isset($method["id_product"]) || empty(trim($method["id_product"]))) {
            echo json_encode(["success" => false, "error" => "Id manquant"]);
            die;
        }

        // J'écris une requete préparée de suppression du product en fonction de son id.
        $stmt = $bdd->prepare("DELETE FROM orders WHERE id = ? ");
        $stmt->execute($method["id_order"]);
        if ($stmt->rowCount()) echo json_encode(["success" => true]);
        else echo json_encode(["success" => false, "error" => "Erreur de suppression"]);
        break;


    default:

        echo json_encode(["success" => false, "error" => "Mauvaise requête"]);
        break;
}
