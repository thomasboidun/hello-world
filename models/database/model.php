<?php
  function open_database_connection($file = 'my_setting.ini') {
    if (!$settings = parse_ini_file($file, TRUE)) throw new exception('Unable to open ' . $file . '.');

    $dns = $settings['database']['driver'] .
    ':host=' . $settings['database']['host'] .
    ((!empty($settings['database']['port'])) ? (';port=' . $settings['database']['port']) : '') .
    ';dbname=' . $settings['database']['schema'];
  
    return new PDO($dns, $settings['database']['username'], $settings['database']['password']);
  }

  function close_database_connection(&$link) {
    $link = null;
  }

  function get_all_pokemons() {
  $link = open_database_connection();

  $result = $link->query('SELECT * from pokemons;');

  $pokemons = array();

  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $pokemons[] = $row;
  }

  close_database_connection($link);

  return $pokemons;
  }

  function get_pokemon_by_id($id) {
  $link = open_database_connection();

  $query = 'SELECT * FROM pokemons WHERE id = :id';
  $statement = $link->prepare($query);
  $statement->bindValue(':id', $id, PDO::PARAM_INT);
  $statement->execute();

  $row = $statement->fetch(PDO::FETCH_ASSOC);

  close_database_connection($link);

  return $row;
  }
