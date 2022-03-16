<?php
    error_reporting(E_ALL & ~E_NOTICE);
    session_start();
    if($_SESSION['ouvert'] == false){
        header("location: connexion.php"); // Bloqué l'accès si pas connecté
    }
    
    ?>
<?php 
//$objPdo = new PDO('mysql:host=195.154.174.181;dbname=banque' , 'banquedbuser','!P3s?8!pZ7xSP&y9');

require('database.php');
if(isset($_POST['beneficiaire']) && isset($_POST['montant']))
    {
        $beneficiaire = $_POST['beneficiaire'];
        $montant = $_POST['montant'];
        $emmeteur = $_SESSION['identifiant'];
        $datetimestamp = time();
        
        $objPdo->query("UPDATE account SET argent = argent + '$montant' WHERE identifiant= '$beneficiaire' ");
        $objPdo->query("UPDATE account SET argent = argent - '$montant' WHERE identifiant= '$emmeteur' ");

        $req = $objPdo->prepare('INSERT INTO transactions(beneficiaire, emmeteur, montant, datetimestamp) VALUES (?, ?, ?, ?)');
        $req->execute(array($beneficiaire, $emmeteur, $montant, $datetimestamp));

    }
?>

<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf8">
    <link rel="stylesheet" href="/css/inscription.css">
    <link rel="stylesheet" href="/css/createaccount.css">
    <link rel="stylesheet" href="/css/virement.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    
    

    <title>Banque & Assurances - Crédit Agricole Paris</title>
    <img class="img" src="/resources/logo_ca.png" alt="Crédit Agricole Provence Côte d'Azur  - Banque et assurances"/>
  </head>
  <body>
    <!-- PREMIERE BARRE ICI-->
    <div class="nav">
      <a href="account.php">Mr <?php echo $_SESSION['prenom']; ?> <?php echo $_SESSION['nom']; ?></a>
      <a href="deconnexion.php">Se déconnecter</a>
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

    

    <!-- VIREMENTS -->
    <div class="container">
    <br><br>
    <br><br>

<br>
<br><br>
      <br>
        <form  method="post" class="my-form" action="virement.php" enctype="multipart/form-data">
          <input type="text" name="beneficiaire" placeholder="Entrez le N° de compte bénéficiaire"><br>
          <input type="text" name="montant" placeholder="Montant de la transaction"><br>
          <br>
          <input type="submit" value="Effectuer le virement">
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