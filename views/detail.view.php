<?php
$title = "Pokémons - " . $pokemon->get_name();
$styles = "";
ob_start();
?>

<div id="detail-view">
  <h1><?= $pokemon->get_name(); ?></h1>
  <img src="<?= $pokemon->get_artwork() ?>" alt="<?= $pokemon->get_name() ?> artwork">
  <br> <br>
  <p><a href="/index.php/list" title="Retourner à l'accueil.">Retourner à l'accueil.</a></p>
</div>

<?php
$content = ob_get_clean();
include 'main.view.php';
