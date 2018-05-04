<?php

    if(isset($_SESSION["login"])){
        $authStatus = true;
    }else{
        $authStatus = false;
    }

?>