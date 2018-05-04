<?php

    if($authStatus)
        header("location: index.php");

    if(isset($_POST["login"])){
        $username = $_POST["username"];
        $password = $_POST["password"];

        $passwordHash = password_hash($password,PASSWORD_DEFAULT);

        $loginstmt = $conn->prepare("SELECT * FROM users WHERE username = '$username' limit 1");
        //$loginstmt->bindParam(":username",$username);
        $loginstmt->execute();

        $dbHash = $loginstmt->fetch()["password"];

        if(password_verify($password, $dbHash)){
            $userstmt = $conn->prepare("SELECT * FROM users where username = '$username");
            //$userstmt->bindParam(':username', $username);
            $userstmt->execute();

            $_SESSION["login"] = [
                "username" => $username,
            ];
        }else{
            $message = base64_encode("Username/Password Salah");
            header("location: index.php?page=login&msg=$message");
            exit();
        }
    }else{
        header("location: index.php");
        exit();
    }

?>