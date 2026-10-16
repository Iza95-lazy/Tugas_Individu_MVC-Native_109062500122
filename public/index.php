<?php
// Panggil konfigurasi database dan model/controller dasar
require_once '../config/database.php';
require_once '../app/models/Film.php';
require_once '../app/controllers/FilmController.php';

// Tangkap parameter 'action' dari URL (default ke 'index')
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$controller = new FilmController();

switch ($action) {
    case 'index':
    default:
        $controller->index();
        break;
    // Nanti aksi create, edit, delete akan kita arahkan ke sini di tahap berikutnya
}

switch ($action) {
    case 'create':
        $controller->create();
        break;

    case 'edit':
        $controller->edit();
        break;

    case 'delete':
        $controller->delete();
        break;

    case 'index':
    default:
        $controller->index();
        break;
    
}
