<?php
$title = 'Pokémons';
$styles = '<link rel="stylesheet" href="../views/assets/styles/list.css">';
?>

<?php ob_start(); ?>

<div id="list-view">
  <h1>Pokémons</h1>
  <p><a class="btn-link" href="/index.php/list/list.pdf">Exporter la liste en .pdf</a></p>
  <table class="pkm-table">
    <thead>
      <tr>
        <th>Miniature</th>
        <th>Nom</th>
        <th>Type</th>
        <th>Actions</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($pokemons as $pkm) { ?>
        <tr>
          <td>
            <img class="pkm-miniature" src="<?= $pkm->get_miniature(); ?>" alt="<?= $pkm->get_name(); ?> miniature">
          </td>
          <td>
            <a href="/index.php/detail?id=<?= $pkm->get_id(); ?>" title="Voir les détails de <?= $pkm->get_name(); ?>">
              <?= $pkm->get_name(); ?>
            </a>
          </td>
          <td>
            <img class="pkm-type"class="pkm-type" src="<?= $pkm->get_type_1()->get_icon(); ?>" alt="Type <?= $pkm->get_type_1()->get_name(); ?>">
            <img class="pkm-type" class="pkm-type" src="<?= $pkm->get_type_2()->get_icon(); ?>" alt="Type <?= $pkm->get_type_2()->get_name(); ?>">
          </td>
          <td>
            <a href="/index.php/edit?id=<?= $pkm->get_id(); ?>" title="Editer <?= $pkm->get_name(); ?>" class="btn-link">Editer</a>
          </td>
        </tr>
      <?php }; // end foreach 
      ?>
    </tbody>
  </table>
</div>

<?php
$content = ob_get_clean();
?>

<?php include 'main.view.php';
