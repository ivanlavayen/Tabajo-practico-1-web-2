<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class GenerosView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }

    

    function showGenero($id) {
        $titulo = "Resumen de Genero";
         // asigno variables al tpl smarty
        $this->smarty->assign('titulo', $titulo);
        $this->smarty->assign('genero', $id);
        // mostrar el tpl
        $this->smarty->display('generoDetail.tpl');
    }

    function showFormAddBook(){
        $titulo = "Alta de Libro";
        $this->smarty->assign('titulo', $titulo);

        $this->smarty->display('formAddBook.tpl');
    }

    function showGeneros($generos) {
        $titulo= "Lista de generos";
        $this->smarty->assign('titulo', $titulo);
        $this->smarty->assign('generos', $generos);
        $this->smarty->display('generosDisplay.tpl');
    }

    function showFormAddGenero(){
        $accion = "guardar_en_bd";
        $titulo = "Alta de genero";
        $boton = "Guardar";
        $genero= "genero";
        $this->smarty->assign('accion', $accion);
        $this->smarty->assign('titulo', $titulo);
        $this->smarty->assign('boton', $boton);
        $this->smarty->assign('genero', $genero);
        $this->smarty->display('formAddGeneros.tpl');  
    
    }

    function showFormActualizarGenero($genero){
        $accion = "Modificar_Registro_genero";
        $titulo = "Modificar genero";
        $boton = "Guardarrrr";
        $this->smarty->assign('accion', $accion);
        $this->smarty->assign('titulo', $titulo);
        $this->smarty->assign('boton', $boton);
        $this->smarty->assign('genero', $genero);
        $this->smarty->display('formAddGeneros.tpl');  
    }

    

}    