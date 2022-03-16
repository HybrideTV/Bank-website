<?php
    error_reporting(E_ALL & ~E_NOTICE);
    session_start();
    if($_SESSION['ouvert'] == false){
        header("location: connexion.php"); // Bloqué l'accès si pas connecté
    }
    function viewTransaction()
    {
      require('database.php');
      $emmeteur = $_SESSION['identifiant'];
      $i = 0;
      $result = $objPdo->query("SELECT * FROM `transactions` WHERE `emmeteur` = '".$emmeteur."' OR beneficiaire = '".$emmeteur."'");
      $row = $result->fetch();
          while ($row = $result->fetch()) {
              $date = date('d/m/Y',  $row['datetimestamp']);
              echo "<td>" . $date . "</td>";
              echo "<td>" . $row['emmeteur'] . "</td>";
              echo "<td>" . $row['beneficiaire'] . "</td>";
              echo "<td>" . $row['montant'] . "€</td>";
              echo "</tr>";
              $i++;
            }
    }
    ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf8">
    <link rel="stylesheet" href="/css/account.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <title>Banque & Assurances - Crédit Agricole Paris</title>
    <img class="img" src="/resources/logo_ca.png" alt="Crédit Agricole Provence Côte d'Azur  - Banque et assurances"/>
  </head>
  <body>
    <div class="nav">
      <a href="account.php">Mr <?php echo $_SESSION['prenom']; ?> <?php echo $_SESSION['nom']; ?></a>
      <a href="deconnexion.php">Se déconnecter</a>
    </div>
    <input id="searchbar" type="text" name="search" placeholder="Rechercher une thématique, un produit...">
    <img class="img-search" src="/resources/icone-loupe-vert.png" style="width: 30px; height: 30px; margin-left: 0px; margin-top: -5px"/>
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
<div class="box"></div>
<div class="box3">Bonjour Mr <?php echo $_SESSION['prenom']; ?> <?php echo $_SESSION['nom']; ?></div>
<br>
<div class="projet-box">
    <img src="/resources/soleil.png" class="projet-box-image" style="width: 70px; height: 70px;"/>
    <div class="projet-box-text-title">
      <b>MON COMPTE PRINCIPAL</b>
      <div class="projet-box-text">
      <?php echo $_SESSION['argent']; ?>€
      </div><br>
      <div class="container-fluid">
      <table class="table table-striped"  style="width: 799px; margin-left: -135px;">
            <thead thead-light>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Emmeteur</th>
                    <th scope="col">Bénéficiaire</th>
                    <th scope="col">Montant</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    viewTransaction();
                ?>
            </tbody>
        </table>
  </div>
      </div>
  </div><br>
</div>
<br>
<div class="box6"><br><br><button onclick="window.location.href = 'virement.php';">Effectuer un virement</button></div><br><br><br><br><br>


<div class="box6">MES ASSURANCES</div><br><br>
<div class="projet-box-3">Vous n'avez aucune assurance en cours.</div><br><br>
<div class="box6">MES CREDITS</div><br><br>
<div class="projet-box-4">Vous n'avez aucun crédit en cours.</div><br>
  </body>
</html>