<?php
  // Database connexion
  require_once('./models/database/MyPDO.php');
  $db = new MyPDO();


  // Fake router
  if(isset($_GET) && isset($_GET['detail'])) {
    require_once('./views/detail.view.php');
  } else {
    require_once('./views/list.view.php');
  }

