<?php 
  $title = 'Page not found';
?>

<?php ob_start(); ?>

<div id="not-found">
  <h1>Page not found</h1>
  <p>Return at <a href="index.php" title="Go home">home</a>!</p>
</div>

<?php
  $content = ob_get_clean();
?>

<?php include 'main.view.php';
