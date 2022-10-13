<?php
class LoginHelper{

    function return_admin(){
            session_start();
            if(isset($_SESSION['esta_logeado'])){
                return $_SESSION['esta_logeado'];
             }
             else{
                 return false;
            }
            


    }


}