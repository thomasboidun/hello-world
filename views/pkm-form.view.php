<?php
if ($pokemon) {
  $title = "Editer un Pokémon - " . $pokemon->get_name();
  $form_id = "edit-pkm-form";
} else {
  $title  = "Ajouter un Pokémon";
  $form_id = "add-pkm_form";
}
$styles = "";
$types = get_all_types();
ob_start();
?>

<div id="pkm-form">
  <h1>
    <?php
    if ($pokemon) {
      print "Editer " . $pokemon->get_name();
    } else {
      print "Ajouter un Pokémon";
    }
    ?>
  </h1>

  <br>

  <form method="POST" id="<?= $form_id; ?>">
    <input type="hidden" name="form-id" value="<?= $form_id; ?>">

    <?php if ($pokemon) { ?>
      <input type="hidden" name="pkm-id" value="<?= $pokemon->get_id(); ?>">
    <?php } // end if 
    ?>

    <div class="input-wrapper">
      <label for="pkm-name">Nom du Pokémon:</label> <br>
      <input name="pkm-name" id="pkm-name" type="text" value="<?= $pokemon->get_name(); ?>" placeholder="Ex. Bulbizarre" required>
    </div>

    <br>

    <div class="input-wrapper">
      <label for="pkm-type-1">Premier type du Pokémon:</label> <br>
      <select name="pkm-type-1" id="pkm-type-1" require>
        <option value="null">Choisissez le 1er type du Pokémon</option>
        <?php foreach ($types as $type) { ?>
          <option value="<?= $type->get_id(); ?>" <?php if ($type->get_id() === $pokemon->get_type_1()->get_id()) print "selected"; ?>>
            <!-- <img class="pkm-type" src="<?= $type->get_icon(); ?>" alt="Type <?= $type->get_name(); ?>"> -->
            <?= $type->get_name(); ?>
          </option>
        <?php }; // end foreach 
        ?>
      </select>
    </div>

    <br>

    <div class="input-wrapper">
      <label for="pkm-type-2">Second type du Pokémon:</label> <br>
      <select name="pkm-type-2" id="pkm-type-2">
        <option value="null">Choisissez le 2nd type du Pokémon</option>
        <?php foreach ($types as $type) { ?>
          <option value="<?= $type->get_id(); ?>" <?php if ($type->get_id() === $pokemon->get_type_2()->get_id()) print "selected"; ?>>
            <!-- <img class="pkm-type" src="<?= $type->get_icon(); ?>" alt="Type <?= $type->get_name(); ?>"> -->
            <?= $type->get_name(); ?>
          </option>
        <?php }; // end foreach 
        ?>
      </select>
    </div>

    <br>

    <div class="input-wrapper">
      <label for="pkm-artwork">Artwork du Pokémon:</label> <br>
      <input name="pkm-artwork" id="pkm-artwork" type="url" value="<?= $pokemon->get_artwork(); ?>" placeholder="Ex. https://www.pokepedia.fr/images/thumb/e/ef/Bulbizarre-RFVF.png/250px-Bulbizarre-RFVF.png">
    </div>

    <br>

    <div class="input-wrapper">
      <label for="pkm-miniature">Miniature du Pokémon:</label> <br>
      <input name="pkm-miniature" id="pkm-miniature" type="url" value="<?= $pokemon->get_miniature(); ?>" placeholder="Ex. https://www.pokepedia.fr/images/4/4e/Miniature_001_LGPE.png">
    </div>

    <br>

    <button type="submit">
      <?php
      if ($pokemon) {
        print "Editer";
      } else {
        print "Ajouter";
      }
      ?>
    </button>
  </form>
</div>

<?php
$content = ob_get_clean();
include 'main.view.php';
