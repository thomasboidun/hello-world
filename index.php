<?php
    require_once('./database/MyPDO.php');
    $db = new MyPDO();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./assets/styles/style.css">
</head>
<body>
  <?php require_once('./assets/templates/main.php') ?>
</body>
</html>
