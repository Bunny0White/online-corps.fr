<?php
session_start();

// Redirige si l'utilisateur n'est pas connecté
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: ../connexion/');
    exit;
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Online Corps - Espace client</title>
  <link rel="icon" href="/img/logo_transparent_flavion.png">
  <link rel="stylesheet" href="styles.css">
</head>

    <a href="#" class="logo" style="width: 50px;"><img src="/img/logo_transparent.png"></a>
  <nav class="navbar">
    <div class="nav-links ">
      <ul>
        <a class="text-l">Online Corps - Espace client</a>
        <li><a class="active" href="/" href="/">Accueil</a></li>
        <li><a href="http://food-anime.online-corps.fr" href="#recette">Food-Anime</a></li>
        <li><a class="active" href="/connexion" href="/connexion">Espace client</a></li>
        <li><a class="active" href="logout.php" href="logout.php">Se déconnecter</a></li>
      </ul>
    </div>
    <img src="./img/menu-btn.png" alt="menu hamburger" class="menu-hamburger">
  </nav>
  
<div class="welcome-message">
  <h1>Vous êtes sur votre espace client, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
    <p>Pour vous déconnecter, cliquez-ici: <button onclick="event.preventDefault(); location.href='logout.php';" class="button-17">Se déconnecter</button></p>
</div>

<body>
  <header>
    <div>
      <br>
    </div>
  </header>

  
  <footer>
    <p>&copy; 2024 <a style="color: black;" href="/">online-corps.fr</a>. Tous droits réservés.</p>
  </footer>
  
</body>