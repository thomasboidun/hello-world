<?php // Front Controller

// Dependencies loading
require_once 'vendor/autoload.php';

// Models
require_once 'models/type.model.php';
require_once 'models/pokemon.model.php';

// Database connection
require_once 'models/database/model.php';

// Actions
require_once 'controllers/controllers.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Router
switch ($uri) {
  case '/index.php/list':
    show_pkm_list();
    break;

  case '/index.php/list/list.pdf':
    export_pkm_list();
    break;

  case '/index.php/detail':
    if (isset($_GET) && isset($_GET['id']) && is_numeric($_GET['id'])) {
      show_pkm_detail($_GET['id']);
    } else {
      show_not_found();
    }
    break;

  case '/index.php/edit':
    if (isset($_GET) && isset($_GET['id']) && is_numeric($_GET['id'])) {
      show_pkm_form($_GET['id']);
    } else {
      show_not_found();
    }
    break;

  case '/index.php/add':
    show_pkm_form();
    break;

  default:
    show_pkm_list();
    break;
}

// Form actions
if (isset($_POST) && isset($_POST['form-id'])) {
  var_dump($_POST);
  switch ($_POST['form-id']) {
    case 'edit-pkm-form':
      edit_pkm($_POST);
      break;
    case 'add-pkm-form':
      add_pkm($_POST);
      break;

    default:
      # code...
      break;
  }
}
