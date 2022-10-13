<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class HomeView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }

    function showHome() {
        $titulo = "Home";
        // asigno variables al tpl smarty
        $this->smarty->assign('titulo', $titulo);

        // mostrar el tpl
        $this->smarty->display('home.tpl');
    }

}