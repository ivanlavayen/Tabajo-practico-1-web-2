<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class GenerosView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }

    function showLibros($libros) {
        $titulo = "Lista de Libros";
        // asigno variables al tpl smarty
        $this->smarty->assign('titulo', $titulo);
        $this->smarty->assign('libros', $libros);

        // mostrar el tpl
        $this->smarty->display('librosList.tpl');
    }

    function showLibro($libro) {
        $titulo = "Resumen de Libro";
        $this->smarty->assign('titulo', $titulo);
        $this->smarty->assign('libro', $libro);

        $this->smarty->display('libroDetail.tpl');
    }

    function showFormAddBook(){
        $titulo = "Alta de Libro";
        $this->smarty->assign('titulo', $titulo);

        $this->smarty->display('formAddBook.tpl');
    }
}