<?php

echo <<<HTML

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="">
    <title>Profile</title>
</head>

<body>

    <div>
        <div>
            <h1>Profil de l'utilisateur</h1> 
                <img href="img.png" >
            </div>
        <div>
            <label for="firstname">Prénom</label>
            <input type="text" name="lastname" id="firstname" require>
        </div>

        <div>
            <label for="lastname">Nom</label>
            <input type="text" name="lastname" id="lastname" required>
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" disabled>
        </div>
    </div>

    <form>
        <div>
            <h2>Changer votre mot de passe </h2>
        </div>

        <div>
            <label for="password">Nouveau mot de passe</label>
            <input type="password" name="password" id="password">
        </div>

        <div>
            <label for="password">Ancien mot de passe</label>
            <input type="password" name="password" id="password">
        </div>

        <input type="submit" value="Modifier">
    </form>

    <div>
        <div>Mes commandes passées</div>
        <ul>
            <li>Commande 1 , date : 08 - 12</li>
            <li>Commande 2 , date : 08 - 12</li>
            <li>Commande 3 , date : 08 - 12</li>
            <li>Commande 4 , date : 08 - 12</li>
        </ul>
    </div>
     


    <script src= "../profile/profile.js"></script>
</body>

</html>
HTML;
