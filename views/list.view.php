<?php 
  ob_start();  
  $pokemons = $db->get_all_pokemons();
?>

<div id="list-view">
  <h1>Pokemon list works!</h1>

  <table>
    <thead>
      <tr>
        <th>Artwork</th>
        <th>Name</th>
        <th>Type</th>
      </tr>
    </thead>

    <tbody>
    <?php foreach($pokemons as $pkm) { ?>
      <tr>
        <td>
          <img height="100" src="<?= $pkm['artwork'] ?>" alt="<?= $pkm['name'] ?> artwork">
        </td>
        <td>
          <a href="?detail=<?= $pkm['id'] ?>" title="<?= $pkm['name'] ?> detail">
            <?= $pkm['name'] ?>
          </a>
        </td>
        <td><?= $pkm['type_1'] ?> <?= $pkm['type_2'] ?></td>
      </tr>
    <?php }; // end foreach ?>
    </tbody>
  </table>
</div>

<?php
  $content = ob_get_clean();
  print $content;