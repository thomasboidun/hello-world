<?php
function show_pkm_list()
{
  $pokemons = get_all_pokemons();
  require 'views/list.view.php';
}

function export_pkm_list()
{
  $pokemons = get_all_pokemons();

  $pdf = new FPDF();

  $pdf->AddPage();

  $pdf->SetFont('Arial', 'B', 16);

  $pdf->Cell(45, 10, 'Pokemons List:');

  $pdf->Ln();

  $pdf->SetFont('Arial', '', 12);

  foreach ($pokemons as $pokemon) {
    $pdf->Cell(50, 10, '- ' . $pokemon['name'] . ':');
    $pdf->Image($pokemon['artwork'], null, null, -150);
    $pdf->Ln(10);
  }

  $pdf->Output();
}

function show_pkm_detail($id)
{
  $pokemon = get_pokemon_by_id($id);
  require 'views/detail.view.php';
}

function show_not_found()
{
  header('HTTP/1.1 404 Not Found');
  require 'views/not-found.view.php';
}

function show_pkm_form($id = null)
{
  if ($id) {
    $pokemon = get_pokemon_by_id($id);
  } else {
    $pokemon = null;
  }

  require 'views/pkm-form.view.php';
}

function edit_pkm($data)
{
  $pokemon = pokemon_factory($data);
  $result = update_pokemon($pokemon);
}

function add_pkm($data)
{
  $pokemon = pokemon_factory($data);
  $result = create_pokemon($pokemon);
}
