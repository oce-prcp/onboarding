<?php
require_once 'connexion-bd.php';

if(isset($_POST['action'])) {
    $action = $_POST['action'];
    // var_dump($connexion);
    
    switch ($action)
    {
        case "inscription": 
            $username = $_POST['username'];
            $password = $_POST['password'];
            $mail = $_POST['mail'];
            
            // Vérifier si l'utilisateur existe déjà dans la base de données
            $sql = "SELECT * FROM user WHERE email = :mail";
            $stmt = $connexion->prepare($sql);
            $stmt->bindParam(':mail', $mail);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if($result) {
                // L'utilisateur existe déjà, rediriger vers la page de connexion
                header("Status: 301 Moved Permanently", false, 301);
                header("Location: login.php");
                exit;
            } else {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                
                // Insérer les données dans la base de données
                $sql = "INSERT INTO user (username, password, email, idroleuser) VALUES (:user, :hashe, :mail, 1)";
                $stmt = $connexion->prepare($sql);
                $stmt->bindParam(':user', $username);
                $stmt->bindParam(':hashe', $hashedPassword);
                $stmt->bindParam(':mail', $mail);
                $stmt->execute();
                
                // Rediriger vers la page d'accueil
                header("Status: 301 Moved Permanently", false, 301);
                header("Location: index.html");
                exit;
            }
            break;
            
            case "login": 
                $password = $_POST['password'];
                $email = $_POST['email'];
                    
                    // Vérifier si l'utilisateur existe dans la base de données
                $sql = "SELECT * FROM user WHERE email = :mail";
                $stmt = $connexion->prepare($sql);
                $stmt->bindParam(':mail', $email);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    
                if(password_verify($password, $hashedPassword)) {
                    // Les informations de connexion sont valides, connecter l'utilisateur
                    connexion($result['username']); // Assurez-vous que $result['username'] contient le nom d'utilisateur correct
                        
                    // Rediriger vers la page d'accueil
                    header("Status: 301 Moved Permanently", false, 301);
                    header("Location: index.html");
                } else {
                    // Les informations de connexion ne sont pas valides, afficher un message d'erreur
                    echo "OUPS une erreur est survenue";
                    //echo var_dump($result);
                    // var_dump(password_verify($password, $result['password']));
                    //echo $result['password'] . "<br/>";
                    // echo "password_verify($hashedPassword , $result['password'])";
                    echo password_verify($hashedPassword , $result['password']);
                }
                exit;
                break;
                default:
                echo "C'est FF la team";
                break;
            }
    }
    ?>


