<?php

    require('database.php');

    if(isset($_POST['email']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mdp'])){
      $email = $_POST["email"];
      $nom = $_POST["nom"];
      $prenom = $_POST["prenom"];
      $mdp = $_POST["mdp"];
      $identifiant = rand(400000, 500000);
// ENVOI MAIL

      $to = $_POST["email"];
      $from = "no-reply@fake-agricole.fr"; 
      $subject = "Bienvenue au crédit agricole !";
      $message = 'Votre identifiant de connexion est :'.$identifiant;
      $headers = "From: no-reply@fake-agricole.fr";

      $req = $bdd->prepare('INSERT INTO account(email, nom, prenom, mdp, identifiant, argent) VALUES (?, ?, ?, ?, ?, 50)');

      $req->execute(array($email, $nom, $prenom, $mdp, $identifiant));

    }
?>

<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf8">
    <link rel="stylesheet" href="/css/inscription.css">
    <link rel="stylesheet" href="/css/createaccount.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    

    <title>Banque & Assurances - Crédit Agricole Paris</title>
    <img class="img" src="/resources/logo_ca.png" alt="Crédit Agricole Provence Côte d'Azur  - Banque et assurances"/>
  </head>
  <body>
    <text-1>Vous êtes un particulier ▼</text-1>

    <!-- PREMIERE BARRE ICI-->
    <div class="nav">
      <a href="#">
        <img src="/resources/logo_nous_contacter.svg" style="width: 20px; height: 20px; margin-left: -1px;"></img> NOUS CONTACTER</a>
      <a href="inscription.html">OUVRIR UN COMPTE</a>
      <a href="connexion.php">
        <img src="/resources/logo_cadenas.png" style="width: 20px; height: 20px; margin-left: -1px;"></img> MON ESPACE</a>
    </div>

    <input id="searchbar" type="text" name="search" placeholder="Rechercher une thématique, un produit...">
    <img class="img-search" src="/resources/icone-loupe-vert.png" style="width: 30px; height: 30px; margin-left: 0px; margin-top: -5px"/>

    <!-- 2EME BARRE ICI-->
    <div class="navbottom">
      <a href="#">COMPTES & CARTES</a>
      <a href="#">ÉPARGNER</a>
      <a href="#">S'ASSURER</a>
      <a href="#">EMPRUNTER</a>
      <a href="#">INFORMATIONS REGLEMENTAIRES</a>
      <a href="#">ESPACE JEUNES</a>
      <a href="#">FICHES MÉMOS</a>
      <a href="#">SIMULATION & DEVIS</a>
      <a href="#">BOUTIQUE EN LIGNE</a>
      <a href="#">NOS CONSEILS</a>     
    </div>

    <!-- SLIDER IMAGE ICI -->
    <div class="container">
      <br>
        <form  method="post" class="my-form" action="createaccount.php" enctype="multipart/form-data">
          Nom : <input type="text" name="nom" placeholder="Entrez votre nom"><br>
          Prénom : <input type="text" name="prenom" placeholder="Entrez votre prénom"><br>
          Email : <input type="text" name="email" placeholder="Entrez votre adresse mail"><br>
          Mot de passe : <input type="text" name="mdp" placeholder="Entrez un mot de passe"><br>
          <br>
          <input type="submit" value="Créer mon compte">
<br><br>
<br><br>
<br><br>
          </form>
        </div>



  </body>












  <!-- FOOTER -->
  <div class="footer-dark">
    <footer>
        <div class="container">
          <div class="col item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a></a></div>
          <br>
            <div class="row">
                <div class="col-sm-6 col-md-3 item">
                    <h3>LE CREDIT AGRICOLE</h3>
                    <ul>
                        <li><a href="#">Présentation</a></li>
                        <li><a href="#">Banque coopérative</a></li>
                        <li><a href="#">Engagement RSE</a></li>
                        <li><a href="#">Charte éthique</a></li>
                        <li><a href="#">Groupe Crédit Agricole</a></li>
                        <li><a href="#">Recrutement</a></li>

                    </ul>
                </div>
                <div class="col-sm-6 col-md-3 item">
                    <h3>RELATION BANQUE CLIENT</h3>
                    <ul>
                      <li><a href="#">Réclamation et médiation</a></li>
                      <li><a href="#">Tarifs et Guides</a></li>
                      <li><a href="#">Nos engagements</a></li>
                      <li><a href="#">Charte des données personnelles</a></li>
                      <li><a href="#">Fonds de Garantie de Dépots et de Résolution</a></li>
                      <li><a href="#">Information règlementaires</a></li>
                    </ul>
                </div>
            </div>
            <p class="copyright">MENTIONS LEGALES | COOKIES ET POLITIQUE DE PROTECTION DES DONNÉES PERSONNELLES DU SITE INTERNET | POLITIQUE DE PROTECTION DES DONNÉES PERSONNELLES DE LA CAISSE RÉGIONALE | SÉCURITÉ <br> © Crédit Agricole</p>
        </div>
    </footer>
</div>
 
</html>
