<!DOCTYPE html>

<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
  <link rel="stylesheet" href="../views/assets/styles/style.css">
  <?php if($styles) print $styles ?>
</head>

<body>
  <main>
    <?= $content ?>
  </main>
</body>
</html>