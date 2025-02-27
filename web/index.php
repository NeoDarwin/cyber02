<?php
// Récupération des variables d'environnement définies dans docker-compose.yml
$dbHost = getenv('DB_HOST') ?: 'cyber1';
$dbName = getenv('DB_NAME') ?: 'admin';
$dbUser = getenv('DB_USER') ?: 'admin';
$dbPass = getenv('DB_PASSWORD') ?: 'P@$$w0rd';

// Connexion à la base de données
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// Vérifier si la connexion est établie
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données: " . $conn->connect_error);
}

// Si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // EXEMPLE VULNÉRABLE
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);
    echo "la requête est : $query <br>"; 
    // Préparation de la requête pour éviter les injections SQL
    // $stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
    // $stmt->bind_param("ss", $username, $password);    
    //$stmt->execute();
    //$result = $stmt->get_result();

    // Vérification des identifiants
    if ($result->num_rows > 0) {
        echo "<h2>Bienvenue, $username! Vous êtes authentifié.</h2>";
    } else {
        echo "<h2>Identifiants invalides. Veuillez réessayer.</h2>";
    }
    //$stmt->close();
} else {
    // Afficher le formulaire par défaut
    ?>
    <form method="POST">
        <label for="username">Nom d'utilisateur :</label><br/>
        <input type="text" name="username" id="username" /><br/><br/>

        <label for="password">Mot de passe :</label><br/>
        <input type="password" name="password" id="password" /><br/><br/>

        <input type="submit" value="Se connecter" />
    </form>
    <?php
}
?>
