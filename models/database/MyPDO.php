<?php
class MyPDO {
    public function __construct() { }

    public function open_database_connection($file = 'my_setting.ini') {
      if (!$settings = parse_ini_file($file, TRUE)) throw new exception('Unable to open ' . $file . '.');
       
      $dns = $settings['database']['driver'] .
      ':host=' . $settings['database']['host'] .
      ((!empty($settings['database']['port'])) ? (';port=' . $settings['database']['port']) : '') .
      ';dbname=' . $settings['database']['schema'];
     
      return new PDO($dns, $settings['database']['username'], $settings['database']['password']);
    }

    public function close_database_connection(&$link) {
      $link = null;
    }

    public function get_all_pokemons() {
      $link = $this->open_database_connection();

      $result = $link->query('SELECT * from pokemons;');

      $pokemons = array();

      while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $pokemons[] = $row;
      }

      $this->close_database_connection($link);

      return $pokemons;
    }

    public function get_pokemon_by_id($id) {
      $link = $this->open_database_connection();

      $query = 'SELECT * FROM pokemons WHERE id = :id';
      $statement = $link->prepare($query);
      $statement->bindValue(':id', $id, PDO::PARAM_INT);
      $statement->execute();

      $row = $statement->fetch(PDO::FETCH_ASSOC);

      $this->close_database_connection($link);

      return $row;
    }
}
