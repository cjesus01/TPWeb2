<?php
 class AuthHelper{
    protected function CheckLoggedIn(){
        session_start();
        if(isset($_SESSION['User'])){
            return true;
        }
        else{
           return false;
        }
    }
    protected function CheckLogout(){
        session_start();
        session_destroy();
        return false;
    }
    protected function ChecksessionStart(){
        if(isset($_SESSION['User'])){
            return true;
        }
        else{
            return false;
        }
    }
 }
?>