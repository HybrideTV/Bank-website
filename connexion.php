<?php
require('database.php');
if(isset($_POST['identifiant']) && isset($_POST['mdp']))
    {

        $identifiant = $_POST['identifiant'];
        $mdp = $_POST['mdp'];

        $result = $objPdo->query("SELECT * FROM account WHERE identifiant = '$identifiant' AND mdp = '$mdp' ");
        $result->bindValue('identifiant', $_POST['identifiant'], PDO::PARAM_STR);
        $result->bindValue('mdp', $_POST['mdp'], PDO::PARAM_STR);
        $count = $result->rowCount();

        if($count == 1)
        {
            echo "Connexion avec un compte existant";
            session_start();
            
            $_SESSION['ouvert']=true;
            $stmt = $objPdo->query("SELECT * FROM account WHERE identifiant = '$identifiant'");
            $stmt->bindValue('identifiant', $_POST['identifiant'], PDO::PARAM_STR);
            $res = $stmt->fetch();

            $_SESSION['id']=$res['id'];
            $_SESSION['identifiant']=$res['identifiant'];
            $_SESSION['prenom']=$res['prenom'];
            $_SESSION['nom']=$res['nom'];
            $_SESSION['argent']=$res['argent'];
            header("location: account.php");
        }
        else
        {
            echo "Connexion avec un compte inexistant";
        }
    }
?>
<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf8">
    <link rel="stylesheet" href="/css/connexion.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    

    <title>Accéder à mes comptes - Crédit Agricole Paris</title>
    <img class="img" src="/resources/logo_ca.png" alt="Crédit Agricole Provence Côte d'Azur  - Banque et assurances"/>
  </head>
  <body style="background-color:#F5F5F5;"">
    <!-- PREMIERE BARRE ICI-->
    <div class="nav">
      <a href="index.html">X</a>
    </div>
    <div class="box">
        <img src="/resources/banniereNPC-CreditAuto01.22-10801080.jpg" style="width: 990px; height: 903px; margin-left: 0px; margin-top: 0px">
    </div>

    <div class="box2">
        <div class="box3">ACCÉDER A <b>MES COMPTES</b></div>
        <div class="box4">IDENTIFIANT</div>
        <div class="box5">Saisissez votre identifiant à 11 chiffres</div>
        

        <form method="POST">
        <input id="searchbar" type="text" name="identifiant" placeholder="Ex: 95884265874"><br>
        <input id="searchbar" type="password" name="mdp" placeholder="Mot de passe"><br>
        <div class="button">
            <button>
            Accéder à mon compte
            </button>
        </div>
    </form>
        
    </div>
    <div class="box6"><b>VOTRE IDENTIFICATION NE CHANGE PAS</b><br>Pour accéder à votre compte, <br>saisissez votre identifiant et votre code personnel habituels.</div>
    <div class="box7"><b>OU TROUVER MON IDENTIFIANT / NUMERO DE COMPTE ?</b><br>- les RIB/IBAN de votre chéquier<br> - vos relevés de compte<br> - l'application Ma Banque</div>
    <div class="box8"><b>UN PROBLEME TECHNIQUE</b><br>Signalez-nous un problème<br>Aide en ligne<br>Tutoriels</div>

  </body>

 
</html>