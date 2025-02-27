<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username    = $_POST['username'] ?? '';
    $password    = $_POST['password'] ?? '';
    $credit_card = $_POST['credit_card'] ?? '';

    // Insertion en clair
    $sql = "INSERT INTO users (username, password, credit_card) 
            VALUES (:username, :password, :credit_card)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':username' => $username,
        ':password' => $password,  // Stockage en clair!
        ':credit_card' => $credit_card
    ]);

    echo "Compte créé avec succès. <a href='login.php'>Se connecter</a>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <style>
body {
    font-family: Arial, sans-serif;
    background: linear-gradient(to right, #6a11cb, #2575fc);
    text-align: center;
    padding: 50px;
}

.container {
    background: white;
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
    width: 350px;
    margin: auto;
    text-align: center;
}

input[type="text"], input[type="password"] {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

button {
    background: #28a745;
    color: white;
    padding: 12px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    width: 100%;
    transition: background 0.3s;
}

button:hover {
    background: #218838;
}

a {
    text-decoration: none;
    color: #2575fc;
    font-weight: bold;
}

a:hover {
    text-decoration: underline;
}
    </style>
</head>
<body>
    <div class="container">
        <h1>Inscription</h1>
        <form method="POST" action="register.php">
            <label>Nom d'utilisateur :</label><br>
            <input type="text" name="username" required><br>

            <label>Mot de passe :</label><br>
            <input type="text" name="password" required><br>

            <label>Carte bancaire :</label><br>
            <input type="text" name="credit_card" placeholder="1234-5678-9012-3456"><br><br>

            <button type="submit">Créer un compte</button>
        </form>
        <p>Déjà inscrit ? <a href="login.php">Se connecter</a></p>
    </div>
</body>
</html>
