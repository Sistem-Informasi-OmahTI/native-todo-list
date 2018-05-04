<?php

    if($authStatus)
        header("location: index.php");

    if(isset($_POST["register"])){
        $errors = [];

        $username = $_POST["username"];
        $password = $_POST["password"];

        $checkUser = $conn->prepare("select 1 from users where username = :username");
        $checkUser->bindParam(":username",$username);
        $checkUser->execute();

        // Validasi User
        if($checkUser->fetchColumn())
            $errors["taken"] = "Username telah terdaftar";
        if($username == "")
            $errors["username"] = "Username tidak boleh kosong";
        if($password == "")
            $errors["password"] = "Password tidak boleh kosong";
        
        if(!empty($errors)){
            header("location: index.php?page=register&errors=".base64_encode(urlencode(serialize($errors))));
            exit();
        }
            
        $passwordHash = password_hash($password,PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $passwordHash);
        $stmt->execute();

        $userstmt = $conn->prepare("SELECT * FROM users where username = :username");
        $userstmt->bindParam(':username', $username);
        $userstmt->execute();

        $_SESSION["login"] = [
            "username" => $username,
        ];

    }

    header("location: index.php");
    exit();

?>