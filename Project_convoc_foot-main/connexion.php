<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
    // connexion à la base de données
    $db_username = 'etudiant';
    $db_password = 'etudiant';
    $db_name     = 'projet';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');
    
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
    
     if($username !== "" && $password !== "")
    {
        $requete = "SELECT count(*) FROM connect where 
              nom_utilisateur = '".$username."' and mdp= '".$password."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['username'] = $username;
           header('Location: accueil_view.php');
        }
        else
        {
           header('Location: connexion_view.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: connexion_view.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: connexion_view.php');
}
mysqli_close($db); // fermer la connexion
?>
