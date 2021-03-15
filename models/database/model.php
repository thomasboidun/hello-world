<?php
function open_database_connection($file = 'my_setting.ini')
{
  if (!$settings = parse_ini_file($file, TRUE)) throw new exception('Unable to open ' . $file . '.');

  $dns = $settings['database']['driver'] .
    ':host=' . $settings['database']['host'] .
    ((!empty($settings['database']['port'])) ? (';port=' . $settings['database']['port']) : '') .
    ';dbname=' . $settings['database']['schema'];

  return new PDO($dns, $settings['database']['username'], $settings['database']['password']);
}

function close_database_connection(&$link)
{
  $link = null;
}

function pokemon_factory($data)
{
  $pokemon = new Pokemon();

  if (isset($data['pkm-id'])) $pokemon->set_id(intval($data['pkm-id'], 10));

  $pokemon->set_name($data['pkm-name']);
  $pokemon->set_type_1(intval($data['pkm-type-1'], 10));
  $pokemon->set_type_2(intval($data['pkm-type-2'], 10));
  $pokemon->set_artwork($data['pkm-artwork']);
  $pokemon->set_miniature($data['pkm-miniature']);

  return $pokemon;
}


function get_all_pokemons()
{
  $link = open_database_connection();

  $query = 'SELECT pkm.id, pkm.name, pkm.artwork, pkm.miniature, 
            t1.id AS type_1_id, t1.name AS type_1_name, t1.icon AS type_1_icon, 
            t2.id AS type_2_id, t2.name AS type_2_name, t2.icon AS type_2_icon 
            FROM pokemons pkm 
            JOIN types t1 ON pkm.type_1 = t1.id 
            JOIN types t2 ON pkm.type_2 = t2.id';

  $result = $link->query($query);

  $pokemons = array();

  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $type_1 = new Type($row['type_1_id'], $row['type_1_name'], $row['type_1_icon']);
    $type_2 = new Type($row['type_2_id'], $row['type_2_name'], $row['type_2_icon']);
    $pokemon = new Pokemon($row['id'], $row['name'], $type_1, $type_2, $row['artwork'], $row['miniature']);
    $pokemons[] = $pokemon;
  }

  close_database_connection($link);

  return $pokemons;
}

function get_pokemon_by_id($id)
{
  $link = open_database_connection();

  $query = 'SELECT pkm.id, pkm.name, pkm.artwork, pkm.miniature, 
            t1.id AS type_1_id, t1.name AS type_1_name, t1.icon AS type_1_icon, 
            t2.id AS type_2_id, t2.name AS type_2_name, t2.icon AS type_2_icon 
            FROM pokemons pkm 
            JOIN types t1 ON pkm.type_1 = t1.id 
            JOIN types t2 ON pkm.type_2 = t2.id WHERE pkm.id = :id';

  $statement = $link->prepare($query);
  $statement->bindValue(':id', $id, PDO::PARAM_INT);
  $statement->execute();

  $row = $statement->fetch(PDO::FETCH_ASSOC);

  close_database_connection($link);

  $type_1 = new Type($row['type_1_id'], $row['type_1_name'], $row['type_1_icon']);
  $type_2 = new Type($row['type_2_id'], $row['type_2_name'], $row['type_2_icon']);
  $pokemon = new Pokemon($row['id'], $row['name'], $type_1, $type_2, $row['artwork'], $row['miniature']);

  return $pokemon;
}

function update_pokemon($pokemon)
{
  // ...
}

function create_pokemon($pokemo)
{
  // ...
}

function get_all_types()
{
  $link = open_database_connection();

  $query = 'SELECT id, name, icon from types';

  $result = $link->query($query);

  $types = array();

  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $types[] = new Type($row['id'], $row['name'], $row['icon']);
  }

  close_database_connection($link);

  return $types;
}
