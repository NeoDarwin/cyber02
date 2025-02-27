<?php
ob_start();  // Démarre la mise en mémoire tampon de sortie
session_start();-
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Site Marchand</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            text-align: center;
        }
        header {
            background: #333;
            color: white;
            padding: 15px 0;
            font-size: 1.5em;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            text-decoration: none;
            background: #007BFF;
            color: white;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .btn:hover {
            background: #0056b3;
        }
        .product {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            margin: 15px;
            display: inline-block;
            width: 250px;
            background: #fff;
            text-align: center;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
        }
        .product img {
            max-width: 100%;
            border-radius: 5px;
        }
        .product strong {
            display: block;
            font-size: 1.2em;
            margin-bottom: 5px;
        }
        .price {
            font-size: 1.1em;
            color: #28a745;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header>Bienvenue sur notre Mauvais Coin</header>
    <div class="container">
        
        <?php if (isset($_SESSION['user_id'])): ?>
            <p><a href="upload.php" class="btn">Uploader un fichier</a></p>
        <?php else: ?>
            <p><a href="login.php" class="btn">Se connecter</a> ou <a href="register.php" class="btn">Créer un compte</a></p>
        <?php endif; ?>
        
        <h2>Liste des produits</h2>
        
        <div class="products">
            <?php
            $sql = "SELECT * FROM products ORDER BY created_at DESC";
            $stmt = $pdo->query($sql);
            $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($items as $item) {
                echo "<div class='product'>";
                echo "<strong>" . htmlspecialchars($item['product_name']) . "</strong>";
                if ($item['image_path']) {
                    echo "<img src='" . htmlspecialchars($item['image_path']) . "' alt='img'>";
                }
                echo "<p class='price'>" . htmlspecialchars($item['price']) . " €</p>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
</body>
</html>