<?php

    if(!$authStatus)
        header("location: index.php");

    if(isset($_POST["addlist"])){
        $errors = [];

        $content = $_POST["content"];

        if($content == ""){
            $errors["emptyContent"] = "Content masih kosong";
            $errorData = base64_encode(urlencode(serialize($errors)));
            header("location: index.php?page=todo&errors=$errorData");
            exit();
        }

        $getUser = $conn->prepare("SELECT id from users where username = :username");
        $getUser->bindParam(":username",$_SESSION["login"]["username"]);
        $getUser->execute();

        $id = $getUser->fetch()["id"];

        $insertList = $conn->prepare("insert into todos (user_id, content) values (:uid, :content)");
        $insertList->bindParam(":uid",$id);
        $insertList->bindParam(":content",$content);
        $insertList->execute();

        header("location: index.php?page=todo");
        exit();
    }elseif(isset($_GET["method"])){
        if($_GET["method"] == "delete" && isset($_GET["id"])){
            if($_GET["id"] == ""){
                $id = "0";
            }else{
                $id = $_GET["id"];
            }

            $deleteContent = $conn->prepare("delete from todos where id = :id");
            $deleteContent->bindParam(":id",$id);
            $deleteContent->execute();
        }

        header("location: index.php?page=todo");
        exit();
    }else{
        $getContent = $conn->prepare("SELECT * FROM users u INNER JOIN todos t on u.id = t.user_id where u.username = :username");
        $getContent->bindParam(":username",$_SESSION["login"]["username"]);
        $getContent->execute();

        $contents = $getContent->fetchAll();
    }
?>