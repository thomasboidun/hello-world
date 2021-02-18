<div id="detail-view">
  <?php 
    $id = $_GET['detail'];
    $pokemon = $db->get_pokemon_by_id($id);
  ?>

  <h1><?= $pokemon['name']; ?> detail works!</h1>
</div>