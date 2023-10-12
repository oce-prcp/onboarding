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
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Logo -->
        <a class="navbar-brand" href="../onboarding/index.html">
          <img class="logo" src="../img/logo-cuisine.png">
        </a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="../onboarding/index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../onboarding/produit.html">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../onboarding/contact.html">Contact</a>
            </li>
          </ul>
          <!-- Search bar -->
          <form class="d-flex my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" id="btn-search" type="submit">Search</button>
          </form>
          <ul>
            <div class="form-check form-switch ms-auto mt-3 me-3">
                <label class="form-check-label ms-3 text-white" for="lightSwitch">
                  Changer le thème
                </label>
                <input class="form-check-input" type="checkbox" id="lightSwitch" />
              </div>
          </ul>
        </div>
      </nav>
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
    <div class="copyright-area">
      <div class="container">
        <div class="row">
          <div class="col-xl-6 col-lg-6 text-center text-lg-left">
            <div class="copyright-text">
              <p>Copyright &copy; 2023, All Right Reserved <a href="https://codepen.io/anupkumar92/">LearnCook</a></p>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6 d-none d-lg-block text-right">
            <div class="footer-menu">
              <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Terms</a></li>
                <li><a href="#">Privacy</a></li>
                <li><a href="#">Policy</a></li>
                <li><a href="#">Contact</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
</html>