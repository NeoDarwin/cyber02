<?php
require_once 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "Accès refusé. Vous devez être connecté.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $targetDir  = __DIR__ . '/images/';
    $fileName   = basename($_FILES['file']['name']);
    $targetFile = $targetDir . $fileName;

    if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
        $productName = $_POST['product_name'] ?? 'Produit';
        $price       = $_POST['price'] ?? 0;

        $sql = "INSERT INTO products (product_name, image_path, price) 
                VALUES (:pname, :ipath, :price)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':pname' => $productName,
            ':ipath' => 'images/' . $fileName,
            ':price' => $price
        ]);

        echo "Fichier uploadé avec succès : <a href='images/$fileName' target='_blank'>$fileName</a><br>";
        echo "<a href='index.php'>Retour à la Home</a>";
    } else {
        echo "Erreur lors de l'upload.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploader un fichier</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 50px;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 350px;
            margin: auto;
        }
        input[type="text"], input[type="file"] {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background: #007BFF;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background: #0056b3;
        }
        a {
            text-decoration: none;
            color: #007BFF;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Uploader un fichier ou une image</h1>
        <form method="POST" action="upload.php" enctype="multipart/form-data">
            <label>Nom du produit (optionnel) :</label><br>
            <input type="text" name="product_name"><br>

            <label>Prix (optionnel) :</label><br>
            <input type="text" name="price"><br>

            <label>Fichier :</label><br>
            <input type="file" name="file"><br><br>

            <button type="submit">Uploader</button>
        </form>
        <p><a href="index.php">Retour à la Home</a></p>
    </div>
</body>
</html>