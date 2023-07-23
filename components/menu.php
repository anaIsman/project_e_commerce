<header class="header_section">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
            <div class="fk_width" id="">
                <div class="custom_menu-btn">
                    <button onclick="openNav()">
                        <span class="s-1"> </span>
                        <span class="s-2"> </span>
                        <span class="s-3"> </span>
                    </button>
                </div>
                <div id="myNav" class="overlay">
                    <div class="overlay-content">

                        <a href="../home/">Accueil</a>

                        <a href="../products/">Produits</a>
                        <a href="../contact/">Contact</a>
                        <?php

                        if (isset($_SESSION["connected"]) && $_SESSION["connected"]) : ?>
                            <a href="panier.php">Panier</a>
                            <?php if (isset($_SESSION["admin"]) && $_SESSION["admin"] == 1) : ?>
                                <a href="../admin/dashboard/">Dashboard</a>
                            <?php endif ?>
                            <a href="profil.php">Profil</a>


                            <a href="../login/logout.php">Déconnexion</a>
                        <?php else : ?>

                            <?php header("location: ../login/") ?>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <a class="navbar-brand" href="../home/">
                <span>
                    HiDo Yeelo
                </span>
            </a>
            <div>
                <form class="form-inline my-2 my-lg-0  mb-3 mb-lg-0">
                    <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
                </form>
            </div>
        </nav>
    </div>
</header>