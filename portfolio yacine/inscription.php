<?php
$port = '3306';
$host = '127.0.0.1';
$dbname = 'web';
$id = 'root';
$password = '';
$erreurs = [];
mb_internal_encoding('UTF-8');

try {
    $bdd = new PDO('mysql:host='.$host.';dbname='.$dbname.';port='.$port.';charset=utf8mb4', $id, $password);
} catch (Exception $ex) {
    echo 'Connection failed: ' . $ex->getMessage();
    exit();
}

if (!empty($_POST)) {

    if (empty($erreurs)) {
        try {
            $insertion = $bdd->prepare('INSERT INTO login (Name, Firstname, Email, Password, Date) VALUES (:name, :firstname, :email, :passwordd, :datetime)');
            $insertion->bindParam(':name', $_POST['nom']);
            $insertion->bindParam(':firstname', $_POST['prenom']);
            $insertion->bindParam(':email', $_POST['email']);
            $insertion->bindParam(':passwordd', $_POST['password']);
            $insertion->bindParam(':datetime', $_POST['date_naissance']);

            $insertion->execute();
            echo 'Félicitations, vous avez créé un personnage ! Vous devez maintenant monter niveau 200.';
        } catch (Exception $exception) {
            echo 'Error during insertion: ' . $exception->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Inscription</title>
        <link href="inscription.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
        <link rel="icon" href="image/YG.jpg">
        <link rel="stylesheet" href="https://kit.fontawesome.com/a8e2a22e13.css" crossorigin="anonymous">
    </head>
    <body>
        <div class="vl"></div>
        <div class="vl1"></div>
        <div class="contenant-formulaire" id="contenant-formulaire">
            <div class="formulaire inscription-contenant" id="formulaire-inscription">
                <form action="#" method="POST">
                    <h1>S'inscrire</h1>
                    
                    <div class="reseaux-sociaux">
                      <a href="#"><i class="fab fab-facebook"></i></a>
                      <a href="#"><i class="fab fab-google"></i></a>
                      <a href="https://www.linkedin.com/in/yacine-guerda-b30aa3262/"><i class="fab fab-linkedin"></i></a>
                    </div>
                    
                    <a class="lien" href="connexion.html">Déjà inscrit? Connectez-vous</a>
                    
                    <input for="nom" type="text" name="nom" placeholder="Nom" required>
                    
                    <input for="prenom" type="text" name="prenom" placeholder="Prénom" required>
                    
                    <input for="email"type="email" name="email" placeholder="Email" required>
                    
                    <input for = "password"type="password" name="password" placeholder="Mot de passe" required>
                    
                    <input for = "date_naissance" type="date" name="date_naissance" placeholder="Date de naissance" required>
                    
                    <select name="genre" required>
                      <option value="">Choisissez votre genre</option>
                      <option value="homme">Homme</option>
                      <option value="femme">Femme</option>
                      <option value="autre">Autre</option>
                    </select>
                    
                    <button type="submit" >S'inscrire</button>
                    
                  </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>