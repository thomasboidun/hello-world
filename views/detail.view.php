<?php 
  $pokemon = get_pokemon_by_id($_GET['id']);
  $title = $pokemon['name'] . " details";
  ob_start();
?>

<div id="detail-view">
  <h1><?= $pokemon['name']; ?> detail works!</h1>
  <p>Return at <a href="/index.php/list" title="Go home">home</a>!</p>
  <img src="<?= $pokemon['artwork'] ?>" alt="<?= $pokemon['name'] ?> artwork">
</div>

<?php 
  $content = ob_get_clean();
  include 'main.view.php';