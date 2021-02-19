<?php 
  $title = 'Pokemons List';
?>

<?php ob_start(); ?>

<div id="list-view">
  <h1>Pokemon list works!</h1>
  <p><a href="/index.php/list/list.pdf">Export list on .pdf file</a></p>
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
          <a href="/index.php/detail?id=<?= $pkm['id'] ?>" title="<?= $pkm['name'] ?> detail">
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
?>

<?php include 'main.view.php';
