<?php 
  $title = 'Page inconnue';
  $styles = "";
?>

<?php ob_start(); ?>

<div id="not-found">
  <h1>Page inconnue</h1>
  <p><a href="/index.php/list" title="Retourner à l'accueil.">Retourner à l'accueil.</a></p>
</div>

<?php
  $content = ob_get_clean();
?>

<?php include 'main.view.php';
