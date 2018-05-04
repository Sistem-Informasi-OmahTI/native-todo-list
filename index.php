<?php

    session_start();
    include __DIR__ . "/config/db.php";
    include __DIR__ . "/controller/auth.php";

    if(isset($_GET["page"])){
        $pageWhitelist = ["login","register","todo"];
        if(!in_array($_GET["page"], $pageWhitelist)){
            echo "Halaman tidak ditemukan";
        }else{
            include __DIR__ . "/view/" . $_GET["page"] . ".php";
        }
    }elseif(isset($_GET["action"])){
        $actionWhitelist = ["login","register","logout","todo"];
        if(!in_array($_GET["action"], $actionWhitelist)){
            echo "Aksi tidak ditemukan";
        }else{
            include __DIR__ . "/controller/" . $_GET["action"] . ".php";
        }
    }else{
        if($authStatus){
            include __DIR__ . "/view/todo.php";
        }else{
            include __DIR__ . "/view/login.php";
        }
    }

?>