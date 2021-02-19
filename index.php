<?php // Front Controller

  require_once 'models/database/model.php';
  require_once 'controllers/controllers.php';

  $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
  
  // Router
  switch ($uri) {
    case '/index.php/list':
      show_pkm_list();
      break;
      
    case '/index.php/detail':
      if(isset($_GET) && isset($_GET['id']) && is_numeric($_GET['id'])) {
        show_pkm_detail($_GET['id']);
      } else {
        show_not_found();
      }
      break;
    
    default:
      show_pkm_list();
      break;
  }