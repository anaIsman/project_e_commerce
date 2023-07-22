<nav>
    <ul>
        <li>
            <a href="../login/login.php">Accueil</a>
        </li>
        <li><a href="products.php">Produits</a></li>
        <li><a href="contact.php">Contact</a></li>
        <?php if (isset($_SESSION["connected"]) && $_SESSION["connected"]) : ?>
            <li><a href="panier.php">Panier</a></li>
            <li><a href="../login/logout.php">Déconnexion</a></li>
        <?php else : ?>
            <li><a href="../login">Connexion</a></li>
        <?php endif ?>



    </ul>
</nav>