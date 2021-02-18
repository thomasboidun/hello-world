<?php 
  ob_start(); 
  $pokemon = $db->get_pokemon_by_id($_GET['detail']);
?>

<div id="detail-view">
  <h1><?= $pokemon['name']; ?> detail works!</h1>
</div>

<?php 
  $content = ob_get_clean();
  print $content;