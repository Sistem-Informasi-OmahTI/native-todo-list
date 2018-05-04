<?php
    if($authStatus)
        header("location: index.php");
        
    include __DIR__ . "/master/header.php";

?>

<div class="container">
    <div class="row">
        <div class="col s12">
            <br>
            <div class="card-panel white">
                <h4>Form Registrasi</h4>
                <form action="index.php?action=register" method="POST">
                    Username: <input type="text" name="username"><br>
                    Password: <input type="password" name="password">
                    <input class="btn" type="submit" name="register" value="register">
                    <?php if(isset($_GET['errors'])): ?>
                        <?php $errorsArray = unserialize(urldecode(base64_decode($_GET['errors']))); ?>
                        <?php foreach($errorsArray as $error): ?>
                            <?php echo "<p>$error</p>"; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    include __DIR__ . "/master/footer.php";
?>