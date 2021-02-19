<?php
  function show_pkm_list() {
    $pokemons = get_all_pokemons();
    require 'views/list.view.php';
  } 

  function show_pkm_detail($id) {
    $pokemon = get_pokemon_by_id($id);
    require 'views/detail.view.php';
  }

  function show_not_found() {
    header('HTTP/1.1 404 Not Found');
    require 'views/not-found.view.php';
  }
