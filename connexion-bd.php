<?php

    $host = "localhost";
    $utilisateur = "root";
    $motdepasse = "";
    $base_de_donnees = "mydb";

    try {
        $connexion = new PDO("mysql:host=$host;dbname=$base_de_donnees", $utilisateur, $motdepasse);

        // Configuration pour afficher les erreurs PDO
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $connexion;
    } catch (PDOException $e) {
        die("Échec de la connexion : " . $e->getMessage());
    }

?>