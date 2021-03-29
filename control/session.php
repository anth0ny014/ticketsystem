<?php

class UserSession{

    public function sessionStart(){

        session_start();

    }

    public function sessionDestroy(){

        session_destroy());

    }

    public function checkSession(){
        # Check Login Status
        if(!isset($_SESSION['login']) || $_SESSION['login'] == 0){
            $_SESSION['login'] = 0;
            $_SESSION['user_ad'] = 'Guest'; // AD user
            $_SESSION['user_name'] = 'Guest';
            $_SESSION['user_title'] = 'Guest';
            $_SESSION['user_email'] = "";
            $_SESSION['user_image'] = "";	
        }
    }
}


?>