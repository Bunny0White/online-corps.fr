<?php
session_start(); // Démarrer la session au début du fichier

// Si l'utilisateur est déjà connecté, redirigez-le vers son panel
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: /mon-panel');
    exit(); // Empêche l'exécution du reste du script après la redirection
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Online Corps - Connexion</title>
  <link rel="icon" href="/img/logo_transparent_flavion.png">
  <link rel="stylesheet" href="styles.css">
</head>

	<a href="#" class="logo" style="width: 50px;"><img src="/img/logo_transparent.png"></a>
  <nav class="navbar">
    <div class="nav-links ">
      <ul>
        <a class="text-l">Online Corps - Connexion</a>
        <li><a class="active" href="/" href="/">Accueil</a></li>
        <li><a href="http://food-anime.online-corps.fr" href="#recette">Food-Anime</a></li>
        <li><a class="active" href="/connexion" href="/connexion">Se connecter</a></li>
        <li><a class="active" href="/inscription" href="/inscription">S'inscrire</a></li>
      </ul>
    </div>
    <img src="./img/menu-btn.png" alt="menu hamburger" class="menu-hamburger">
  </nav>
<body>
  <div class="main-content">
    <h1 class="jomolhari-regular">Connexion à votre compte</h1>
    <form id="loginForm" onsubmit="validateForm(); return false;">
      <label for="username">Nom d'utilisateur:</label><br>
      <input type="text" id="username" name="username" required><br>
      <label for="password">Mot de passe:</label><br>
      <input type="password" id="password" name="password" required><br><br>
      <input type="submit" value="Se connecter" class="button-17">
    </form>
<br>
	<button class="button-17" onclick="location.href='/';">Retour</button>
    <p><a href="mot-de-passe-oublie" class="forgot-password">Mot de passe oublié</a></p>
    <div id="message" class="message"></div>
  </div>
  <header>
    <div>
      <br>
    </div>
  </header>

  
  <footer>
    <p>&copy; 2024 <a style="color: black;" href="/">online-corps.fr</a>. Tous droits réservés.</p>
  </footer>
  
</body>

  <script>
    const menuHamburger = document.querySelector(".menu-hamburger")
    const navLinks = document.querySelector(".nav-links")

    menuHamburger.addEventListener('click',()=>{
    navLinks.classList.toggle('mobile-menu')
    })
	
function validateForm() {
  var username = document.getElementById('username').value;
  var password = document.getElementById('password').value;
  var message = document.getElementById('message');

  if (!username || !password) {
    message.textContent = 'Veuillez entrer un nom d\'utilisateur et un mot de passe.';
    message.className = 'message error';
    return; // Arrêtez la fonction ici
  }

  // Envoyer les données au fichier PHP pour vérification
// Envoyer les données au fichier PHP pour vérification
fetch('../admin/login.php', { // Mettez à jour le chemin d'accès selon votre structure de répertoire
  method: 'POST',
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded',
  },
  body: 'username=' + encodeURIComponent(username) + '&password=' + encodeURIComponent(password)
})
.then(response => response.json())
.then(data => {
  if (data.success) {
    message.textContent = data.message + ' Vous allez être redirigé..';
    message.className = 'message success';
    setTimeout(function() {
      window.location.href = '/mon-panel/'; // Assurez-vous que ce chemin est correct
    }, 3000);
  } else {
    message.textContent = data.message;
    message.className = 'message error';
  }
})
.catch(error => {
  console.error('Erreur:', error);
  message.textContent = 'Erreur de connexion.';
  message.className = 'message error';
});
}



  </script>
</html>