<?php
require_once 'connexion-bd.php';

if(isset($_POST['action'])) {
    $action = $_POST['action'];
    
    echo "PDO <br/>";
    var_dump($connexion);
    switch ($action)
    {
        case "inscription": 
            $username = $_POST['username'];
            $password = $_POST['password'];
            $mail = $_POST['mail'];
            // Autres champs du formulaire...

            // Valider les données (effectuer des vérifications supplémentaires si nécessaire)

            // Hasher le mot de passe (pour des raisons de sécurité)
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insérer les données dans la base de données
            $sql = "INSERT INTO user (username, password, email, idroleuser) VALUES (:user, :hashe, :mail ,1)";
            $stmt = $connexion->prepare($sql);
            $stmt->bindParam(':user',$username);
            $stmt->bindParam(':hashe',$hashedPassword );
            $stmt->bindParam(':mail',$mail);
            header("Status: 301 Moved Permanently", false, 301);
            header("Location: index.html");
            exit;
            $stmt->execute();
            break;
        
        default:
            echo "Bisou";
            break;
    }
}
?>