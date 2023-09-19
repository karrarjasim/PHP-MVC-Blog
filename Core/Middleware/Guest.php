<?php 

namespace Core\Middleware;



class Guest {

    public function handel(){

        if($_SESSION['user'] ?? false) {
            header('Location: /');
            exit();
        }
    }
}