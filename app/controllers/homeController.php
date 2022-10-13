<?php

require_once 'app/views/homeView.php';


class HomeController {
    
    private $homeView;
    
    public function __construct() {
       
        $this->homeView = new HomeView();
        
    }

    function showHome(){

        $this->homeView->showHome();
    }

}