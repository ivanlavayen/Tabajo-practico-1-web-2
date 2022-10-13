<?php

require_once 'app/models/generosModel.php';
require_once 'app/views/generosView.php';
require_once 'app/helpers/LoginHelper.php';
class GenerosController {
    
    private $generosModel;
    private $generosView;
    private $loginHelper;

    public function __construct() {
       
        $this->generosModel = new GenerosModel();
        $this->generosView = new GenerosView();
        $this->loginHelper= new LoginHelper();
    }

    function showAllGeneros() {
        
        $generos = $this->generosModel->getAll();
        $administradorIsLogged = $this->loginHelper->return_admin();
        $this->generosView->showGeneros($generos,$administradorIsLogged);
    }

    function showFormAgregarGeneros(){
        $generos = $this->generosModel->getAll();
        $this->generosView->showFormAddGenero($generos);
        }

    function saveNewGenero(){
        $genero = $_POST['genero'];
        if (!empty($genero)) {
            $this->generosModel-> saveGenero($genero);
            header("Location: " . BASE_URL . "Generos");
            
        }
        else {
            echo "DEBE COMPLETAR LOS CAMPOS CORRESPONDIENTES!!!";
        }
    }
     
    function showGenero($id){
        $genero = $this->generosModel->getGeneroById($id);
        $this->generosView->showGenero($genero);
        
    }  

    function showFormUpdateGenero($id){
        $genero = $this->generosModel->getGeneroById($id); 
        $this->generosView->showFormActualizarGenero($genero);
        
    }
        
    function deleteGenero($id){
        $this->generosModel->deleteGeneroById($id);
        header("Location: " . BASE_URL . "Generos");
    }
    
    function updateGenero(){
        $id= $_POST['id'];
        $genero = $_POST['genero'];
        if (!empty($genero)){
            $this->generosModel-> updateGenero($genero, $id);
            header("Location: " . BASE_URL . "Generos");
        }
        else {
            echo "DEBE COMPLETAR LOS CAMPOS CORRESPONDIENTES!!!";
        }
    }

}
