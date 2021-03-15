<?php
class Pokemon
{
  private $id;
  private $name;
  private $type_1;
  private $type_2;
  private $artwork;
  private $miniature;

  function __construct($id = null, $name = null, $type_1 = null, $type_2 = null, $artwork = null, $miniature = null)
  {
    $this->id = $id;
    $this->name = $name;
    $this->type_1 = $type_1;
    $this->type_2 = $type_2;
    $this->artwork = $artwork;
    $this->miniature = $miniature;
  }

  public function set_id($id)
  {
    $this->id = $id;
  }

  public function get_id()
  {
    return $this->id;
  }

  public function set_name($name)
  {
    $this->name = $name;
  }

  public function get_name()
  {
    return $this->name;
  }

  public function set_type_1($type_1)
  {
    $this->type_1 = $type_1;
  }

  public function get_type_1()
  {
    return $this->type_1;
  }

  public function set_type_2($type_2)
  {
    $this->type_2 = $type_2;
  }

  public function get_type_2()
  {
    return $this->type_2;
  }

  public function set_artwork($artwork)
  {
    $this->artwork = $artwork;
  }

  public function get_artwork()
  {
    return $this->artwork;
  }

  public function set_miniature($miniature)
  {
    $this->miniature = $miniature;
  }

  public function get_miniature()
  {
    return $this->miniature;
  }
}
