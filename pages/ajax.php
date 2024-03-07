<?php
session_start();
ob_start();
if(!empty($_POST)){
    if(isset($_POST['action'])){
        $action = $_POST['action'];

        switch($action){
            case 'exit':
                if(isset($_SESSION['id_user'])){
                    unset($_SESSION['id_user']);
                }
                if(isset($_SESSION['username'])){
                    unset($_SESSION['username']);
                }
                break;
            
        }
    }
}