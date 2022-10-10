<?php
require_once ('./templates/home.tpl');
require_once ('app/controllers/librosController.php');
require_once ('app/controllers/generosController.php');
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'Home'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion 
$params = explode('/', $action);

// instancio los controller que existen
$librosController = new LibrosController();
$generosController = new GenerosController();

// tabla de ruteo parte libros
switch ($params[0]) {
    case 'Home':
        echo "bienvenido a la libreria on line";

        break;
    case 'Libros':
        $librosController->showAllLibros();
        break;
    case 'Ver_Libro':
        // obtengo el parametro de la acción para que me muestre ese libro
        $id = $params[1];
        $librosController->showLibro($id);
        break;
    case 'Agregar_Libro':
        $librosController->showFormAddLibro();
        break;
    case 'Mandar_BD':
        $librosController->saveNewLibro();
        break;
    case "Editar_Libro":
        $id = $params[1];
        $librosController->showFormUpdateLibro($id);
        break;
    case "Modificar_Registro":  
        $librosController->updateLibro();
        break;
    case "Filtrar":  
        $librosController->filtarLibrosPorGenero();
        break;
    case "Eliminar_Libro":  
        $id = $params[1];
        $librosController->deleteLibro($id);
        break;  
    // tabla de ruteo parte generos    
    case "Generos":  
        $generosController->showAllGeneros();
        break;
    case 'Agregar_Genero':
        $generosController->showFormAgregarGeneros();
        break;
    case 'guardar_en_bd':
        $generosController->saveNewGenero();
        break;
    case 'Ver_genero':
        $id = $params[1];
        $generosController->showGenero($id);
        break;
    case "Editar_genero":
        $id = $params[1];
        $generosController->showFormUpdateGenero($id);
        break;
    case "Modificar_Registro_genero":
          
        $generosController->updateGenero();
        break;    
    case 'Eliminar_genero':
        $id = $params[1];
        $generosController->deleteGenero($id);
        break;
    default:
        echo('404 Page not found');
        break;
}
