<?php

echo <<<HTML

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Profile</title>
</head>

<body>

<div class="row g-5">
      <div class="text-center col-md-5 col-lg-4 order-md-last">
        <h4 class="mb-3">
          <span class="text-primary">Profile</span>
        </h4>
      <div>
        <img src="../assets/logo2.png" alt="profile">
      </div>
      </div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Informations personnelles</h4>
        <p id="mypara">qsdfqsdfqsdfqsfd</p>
         
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">Prénom</label>
              <input type="text" class="form-control" id="firstname" value="" readonly>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Nom</label>
              <input type="text" class="form-control" id="lastname" value="" readonly>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" readonly>
              <div class="invalid-feedback">
                
              </div>
            </div>
        

          <h4 >Changement de mot de passe</h4>
          <form class="needs-validation" novalidate="">
          <div class="row gy-3">
            <div class="col-md-6">
              <label for="cc-number" class="form-label">Saisir votre ancien mot de passe</label>
              <input type="text" class="form-control" id="cc-number" placeholder="Entrez votre ancien mot de passe" required="">
              <div class="invalid-feedback">
                Credit card number is required
              </div>
            </div>

            <div class="col-md-6">
              <label for="cc-name" class="form-label">Saisir votre nouveau mot de passe</label>
              <input type="text" class="form-control" id="cc-name" placeholder="Entrez votre nouveau mot de passe" required="">
              <div class="invalid-feedback">
                Name on card is required
              </div>
            </div>

            <div class="col-md-6">
              <label for="cc-number" class="form-label">Confirmer le mot de passe</label>
              <input type="text" class="form-control" id="cc-number" placeholder="Confirmez votre nouveau mot de passe" required="">
              <div class="invalid-feedback">
                Credit card number is required
              </div>
            </div>
            <br>
            

            </div>
          </div>
            <div>
                <h4>Liste des commandes passées</h2>
          <ol class="list-group list-group-numbered">
            <li class="list-group-item">première commande</li>
            <li class="list-group-item">deuxième commande</li>
            <li class="list-group-item">troisième commande</li>
            </ol>
            </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Mettre à jour votre mot de passe</button>
        </form>
      </div>
    </div>
    

    <script src= "../profile/profile.js"></script>
</body>

</html>
HTML;
