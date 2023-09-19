<?php 

namespace Core\Middleware;

class Auth {

    public function handel(){
        
        if(! $_SESSION['user'] ?? false) {
            header('Location: /');
            exit();
        }
    }
}