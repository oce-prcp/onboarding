<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LearnCook</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="../script.js" defer></script>
</head>
<body>
     <!-- Navbar -->
     <?php
      // VERIFIER LA CONNEXION EN TANT QUE ADMIN AVEC LE ROLE DE L'UTILISATEUR CONNECTE
     ?>
    <?php include '../src/navbar.php';?>
    <div class="container">
        <div class="title text-center mt-3">
            <h1>Listes des produits</h1>
            <p>Découvrez nos livres les plus succulants !</p>
        </div>
        <button class="btn btn-primary w-25 text-right">Ajouter un livre</button>
        <table class="table table-bordered mt-3">
          <thead>
            <tr>
              <th>ID</th>
              <th>Image</th>
              <th>Nom</th>
              <th>Prix</th>
              <th>Description</th>
              <th>Actions</th>
            </tr>
          </thead>
        <?php
          // lire le fichier data.json
          $data = file_get_contents('../data.json');
          // décoder le json en array php
          $products = json_decode($data, true);
          // parcourir le tableau
          foreach ($products[0] as $product) {
            // afficher les produits
            echo "<tbody>";
            echo "<tr>";
            echo "<td>".$product['id']."</td>";
            echo "<td><img src='".$product['imageurl']."' alt='produit' style='width:100px'></td>";
            echo "<td>".$product['name']."</td>";
            echo "<td>".$product['price']." €</td>";
            echo "<td>".substr($product['description'], 0, 50)."...</td>";
            echo "<td>
                    <a class='btn btn-primary' href='produit.php?id=".$product['id']."'>Edit</a>
                    <a class='btn btn-danger' href='produit.php?id=".$product['id']."'>Supprimer</a>
                  </td>";
            echo "</tr>"; 
            echo "</tbody>";
          }
        ?>
        </table>
      </div>
    </div>
    <?php include '../src/footer.php';?>
</body>
</html>