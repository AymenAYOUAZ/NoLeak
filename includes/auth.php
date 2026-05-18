<?php
if(!function_exists('isLoggedIn')){
    function isLoggedIn(){
        if(isset($_SESSION['user_id'])){
            return true;
        }
        return false;
    }
}

if(!function_exists('requireLogin')){
    function requireLogin(){
        if(!isLoggedIn()){
            header("Location: /NoLeak/controllers/LoginController.php");
            exit();
        }
    }
}

if(!function_exists('currentUserId')){
    function currentUserId(){
        if(isset($_SESSION['user_id'])){
            return $_SESSION['user_id'];
        }
        return 0;
    }
}

if(!function_exists('e')){
    function e($valeur){
        return htmlspecialchars($valeur, ENT_QUOTES, 'UTF-8');
    }
}
?>
