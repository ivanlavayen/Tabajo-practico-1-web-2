<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class LibrosView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }

    function showLibros($libros, $generos,$administradorIsLogged) {
        $titulo = "Lista de Libros";
        // asigno variables al tpl smarty
        $this->smarty->assign('titulo', $titulo);
        $this->smarty->assign('libros', $libros);
        $this->smarty->assign('generos', $generos);
        $this->smarty->assign('administradorIsLogged',$administradorIsLogged);

        // mostrar el tpl
        $this->smarty->display('librosList.tpl');
    }

    function showLibro($libro,$administradorIsLogged){
        $titulo = "Resumen de Libro";
        $this->smarty->assign('titulo', $titulo);
        $this->smarty->assign('libro', $libro);
        $this->smarty->assign('administradorIsLogged',$administradorIsLogged);
        $this->smarty->display('libroDetail.tpl');
    }

    function showFormAddBook($generos){
        $accion = "Mandar_BD";
        $titulo = "Alta de Libros";
        $boton = "Guardar";
        $this->smarty->assign('titulo', $titulo);
        $this->smarty->assign('boton', $boton);
        $this->smarty->assign('accion', $accion);
        $this->smarty->assign('generos', $generos);
        $this->smarty->display('formAddBook.tpl');
    }

    function showFormUpdateBook($generos, $libro, $generoLibro){
    
        $accion = "Modificar_Registro";
        $titulo = "Modificacion de Libro";
        $boton = "Modificar";
        $this->smarty->assign('titulo', $titulo);
        $this->smarty->assign('boton', $boton);
        $this->smarty->assign('accion', $accion);
        $this->smarty->assign('generos', $generos);
        $this->smarty->assign('generoLibro', $generoLibro);
        $this->smarty->assign('libro', $libro);
        $this->smarty->display('formAddBook.tpl');
    }

    function showLibrosFiltrados($libros, $generos, $administradorIsLogged){
        $titulo = "Lista de Libros por Genero: ";
        // asigno variables al tpl smarty
        $this->smarty->assign('titulo', $titulo);
        $this->smarty->assign('administradorIsLogged',$administradorIsLogged);
        $this->smarty->assign('libros', $libros);
        $this->smarty->assign('generos', $generos);

        // mostrar el tpl
        $this->smarty->display('librosList.tpl');
    }
}