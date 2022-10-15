<?php

require_once ('app/controllers/librosController.php');
require_once ('app/controllers/homeController.php');
require_once ('app/controllers/generosController.php');
require_once ('app/controllers/loginController.php');

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'Home'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion 
$params = explode('/', $action);

// instancio los controller que existen en cada case para optimizar recursos.





switch ($params[0]) {
    // tabla de ruteo parte login
    case 'Home':
        $homeController = new HomeController();
        $homeController->showHome();
        break;
    case 'Login':
        $loginController = new LoginController();
        $loginController->openFormLoging();
        break;
    case 'validate':
        $loginController = new LoginController();
        $loginController->userValidate(); 
        break;
    case 'Logout':
        $loginController = new LoginController();
        $loginController->logout();
        break;  
        
    // tabla de ruteo parte libros    
    case 'Libros':
        $librosController = new LibrosController();
        $librosController->showAllLibros();
        break;
    case 'Ver_Libro':
        $librosController = new LibrosController();
        // obtengo el parametro de la acción para que me muestre ese libro
        $id = $params[1];
        $librosController->showLibro($id);
        break;
    case 'Agregar_Libro':
        $librosController = new LibrosController();
        $librosController->showFormAddLibro();
        break;
    case 'Mandar_BD':
        $librosController = new LibrosController();
        $librosController->saveNewLibro();
        break;
    case "Editar_Libro":
        $librosController = new LibrosController();
        $id = $params[1];
        $librosController->showFormUpdateLibro($id);
        break;
    case "Modificar_Registro": 
        $librosController = new LibrosController(); 
        $librosController->updateLibro();
        break;
    case "Filtrar": 
        $librosController = new LibrosController(); 
        $librosController->filtarLibrosPorGenero();
        break;
    case "Eliminar_Libro":  
        $librosController = new LibrosController();
        $id = $params[1];
        $librosController->deleteLibro($id);
        break;  
    // tabla de ruteo parte generos    
    case "Generos": 
        $generosController = new GenerosController(); 
        $generosController->showAllGeneros();
        break;
    case 'Agregar_Genero':
        $generosController = new GenerosController();
        $generosController->showFormAgregarGeneros();
        break;
    case 'guardar_en_bd':
        $generosController = new GenerosController();
        $generosController->saveNewGenero();
        break;
    case 'Ver_genero':
        $generosController = new GenerosController();
        $id = $params[1];
        $generosController->showGenero($id);
        break;
    case "Editar_genero":
        $generosController = new GenerosController();
        $id = $params[1];
        $generosController->showFormUpdateGenero($id);
        break;
    case "Modificar_Registro_genero":
        $generosController = new GenerosController();  
        $generosController->updateGenero();
        break;    
    case 'Eliminar_genero':
        $generosController = new GenerosController();
        $id = $params[1];
        $generosController->deleteGenero($id);
        break;
    default:
        echo('404 Page not found');
        break;
}
