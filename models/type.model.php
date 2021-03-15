<?php
class Type
{
  private $id;
  private $name;
  private $icon;

  function __construct($id = null, $name = null, $icon = null)
  {
    $this->id = $id;
    $this->name = $name;
    $this->icon = $icon;
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

  public function set_icon($icon)
  {
    $this->icon = $icon;
  }

  public function get_icon()
  {
    return $this->icon;
  }
}
