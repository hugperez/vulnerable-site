<?php
$servername = "localhost";
$username = "user"; 
$password = "pass"; 
$dbname = "vuln";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/styles.css">
    <title>Site vulnérable</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

    <div class="topnav">
        <h1>XSS - niveau 3</h1>
        <a href="/index.php">Accueil</a>
        <a href="4.php">Niveau 4</a>
        <a href="2.php">Niveau 2</a>
        <a href="1.php">Niveau 1</a>
    </div>

    <div class="content">
        <form class="login-form" action="" method="POST">
            <label for="username">Pseudo :</label>
            <input type="text" id="username" name="username">
            <label for="comment">Commentaire :</label>
            <textarea id="comment" name="comment"></textarea>

            <?php 
            if (isset($_POST['submit'])) {
                $username = $_POST['username'];
                $comment = $_POST['comment'];
                
                $stmt = $conn->prepare("INSERT INTO xss3 values (?, ?)");
                $stmt->bind_param("ss", $username, $comment);
                $stmt->execute();
                echo '<label class="success">Le commentaire a été enregistré avec succès.</label>';
            }
            ?>
            <input type="submit" name="submit" value="Soumettre" class="btn">
        </form>

        <form class="login-form" style="margin-top: 20px;" method="POST" action="">
            <?php
                if (isset($_POST['delete'])) {
                    $sql = "TRUNCATE TABLE xss3";
                    if ($conn->query($sql) === TRUE) {
                        echo '<label class="success">La table des commentaires a été effacée avec succès.</label>';
                    }
                }
            ?>
            <input type="submit" name="delete" value="Effacer la table des commentaires">
        </form>

        <?php 
        $sql = "SELECT * FROM xss3";
        $result = $conn->query($sql);
        $comments = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $comments[] = $row;
            }
        }
        $conn->close();
        ?>

        <h2>Commentaires :</h2>
        <?php foreach ($comments as $comment) : ?>
            <div class="comment">
                <p><strong><?php echo $comment['username']; ?></strong> a dit :</p>
                <p><?php echo htmlentities($comment['comment']); ?></p>
            </div>
            <hr>
        <?php endforeach; ?>
    </div>
    
</body>
</html>