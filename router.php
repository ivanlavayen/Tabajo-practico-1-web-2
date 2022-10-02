<?php
require_once ('./templates/home.tpl');
require_once ('app/controllers/librosController.php');

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'Home'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion Ej: dev/juan --> ['dev', juan]
$params = explode('/', $action);

// instancio el unico controller que existe por ahora
$librosController = new LibrosController();


// tabla de ruteo
switch ($params[0]) {
    case 'Home':
        'home.tpl';
        break;
    case 'Libros':
        $librosController->showAllLibros();
        break;
    case 'Ver_Libro':
        // obtengo el parametro de la acción
        $id = $params[1];
        $librosController->showLibro($id);
        break;
    case 'Agregar_Libro':
        // obtengo el parametro de la acción
        $librosController->showFormAddLibro();
        break;
    case 'Mandar_BD':
        // obtengo el parametro de la acción
        $librosController->saveNewLibro();
        break;
    case "Editar_Libro":
        $id = $params[1];
        $librosController->showFormUpdateLibro($id);
        break;
    case "Eliminar_Libro":  
        $id = $params[1];
        $librosController->deleteLibro($id);
        break;
    case "Modificar_Registro":  
        $librosController->updateLibro();
        break;
    case "Filtrar":  
        $librosController->filtarLibrosPorGenero();
        break;

    default:
        echo('404 Page not found');
        break;
}
