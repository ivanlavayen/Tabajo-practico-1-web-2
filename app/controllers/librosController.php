<?php
require_once 'app/models/librosModel.php';
require_once 'app/models/generosModel.php';
require_once 'app/views/librosView.php';

class LibrosController {
    private $librosModel;
    private $generosModel;
    private $librosView;

    public function __construct() {
        $this->librosModel = new LibrosModel();
        $this->generosModel = new GenerosModel();
        $this->librosView = new LibrosView();
    }

    function showAllLibros() {
        $libros = $this->librosModel->getAll();
        $generos = $this->generosModel->getAll();
        $this->librosView->showLibros($libros, $generos);
    }

    function showLibro($id){
        $libro = $this->librosModel->getLibroById($id);
        $this->librosView->showLibro($libro);
    }

    function showFormAddLibro(){
        $generos = $this->generosModel->getAll();
        $this->librosView->showFormAddBook($generos);
    }

    function saveNewLibro(){
        $obra = $_POST['obra'];
        $autor = $_POST['autor'];
        $precio = $_POST['precio'];
        $genero = $_POST['genero'];
        if ((!empty($obra)) && (!empty($autor)) && (!empty($genero))) {
            $this->librosModel->saveRegister($obra, $autor, $precio, $genero);
            header("Location: " . BASE_URL . "Libros");
        }
        else {
            echo "DEBE COMPLETAR LOS CAMPOS CORRESPONDIENTES!!!";
        }
    }

    function deleteLibro($id){
        $this->librosModel->deleteLibroById($id);
        header("Location: " . BASE_URL . "Libros");
    }

    function showFormUpdateLibro($id){
        $generos = $this->generosModel->getAll();
        $libro = $this->librosModel->getLibroById($id);
        $id_genero = $libro->id_genero;
        $generoLibro = $this->generosModel->getGeneroById($id_genero); 
        $this->librosView->showFormUpdateBook($generos, $libro, $generoLibro);
    }
    
    function updateLibro(){
        $id = $_POST['id'];
        $obra = $_POST['obra'];
        $autor = $_POST['autor'];
        $precio = $_POST['precio'];
        $genero = $_POST['genero'];
        if ((!empty($obra)) && (!empty($autor)) && (!empty($genero))) {
            $this->librosModel->updateLibro($obra, $autor, $precio, $genero, $id);
            header("Location: " . BASE_URL . "Libros");
        }
        else {
            echo "DEBE COMPLETAR LOS CAMPOS CORRESPONDIENTES!!!";
        }
    }

    function filtarLibrosPorGenero(){
        $id_genero = $_POST['genero'];
        $libros = $this->librosModel->getLibroByIdGenero($id_genero);
        $generos = $this->generosModel->getAll();
        $this->librosView->showLibrosFiltrados($libros, $generos);
    }

  
}
