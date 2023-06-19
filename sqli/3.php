<!DOCTYPE html>
<html lang="en">
<head>
  <title>CSS Template</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/styles.css">
  <title>Site vulnérable</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

  <div class="topnav">
    <h1>SQLi - niveau 3</h1>
    <a href="/index.php">Accueil</a>
    <a href="2.php">Niveau 2</a>
    <a href="1.php">Niveau 1</a>
  </div>

  <div class="content">
    <form class="login-form" action="" method="GET">
      <label for="recherche">Recherche :</label>
      <input type="text" id="recherche" name="recherche">

      <input type="submit" value="Rechercher" class="btn">
    </form>

    <?php
    $servername = "localhost";
    $username = "user"; 
    $password = "pass"; 
    $dbname = "vuln";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if (isset($_GET['recherche'])) {
      $search = $_GET['recherche'];

      $sql = "SELECT id, name, year, description FROM sqli3 WHERE name LIKE '%$search%'";
      $result = $conn->query($sql);
      $products = [];
      while ($row = $result->fetch_assoc()) {
          $products[] = $row;
      }
    }
    ?>

    <h2>Résultats :</h2>
    <?php foreach ($products as $product) : ?>
      <div class="comment">
        <p>Nom : <strong><?php echo $product['name']; ?></strong></p>
        <p>Année : <?php echo $product['year']; ?></p>
      </div>
      <hr>
    <?php endforeach; ?>

  </div>
</body>
</html>