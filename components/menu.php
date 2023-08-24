<header class="header_section">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">

            <a class="navbar-brand" href="../home/">
                <span>
                    HiDo Yeelo
                </span>
            </a>
            <a href="../home/">Accueil</a>

            <a href="../products/">Produits</a>
            <a href="../contact/">Contact</a>
            <?php

            if (isset($_SESSION["connected"]) && $_SESSION["connected"]) : ?>

                <?php if (isset($_SESSION["admin"]) && $_SESSION["admin"] == 1) : ?>
                    <a href="../admin/dashboard/">Dashboard</a>
                <?php endif ?>
                <a href="../profile/">Profil</a>

            <?php else : ?>

                <?php header("location: ../login/") ?>
            <?php endif ?>
            <?php if (isset($_SESSION["connected"]) && $_SESSION["connected"]) : ?>
                <div>


                    <a href="../panier/" class="cart-icon">
                        <img src="../assets/cart.png" alt="">
                        <span class="cart-badge" id="cart-badge"></span>
                    </a>
                    <a href="../login/logout.php">Déconnexion</a>
                </div>

            <?php endif; ?>

            <div>

                <form class="form-inline my-2 my-lg-0  mb-3 mb-lg-0">
                    <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
                </form>
            </div>
        </nav>
    </div>
</header>