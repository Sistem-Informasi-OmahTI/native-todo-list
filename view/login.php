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
                    <h4>Form Login</h4>
                    <form action="index.php?action=login" method="POST">
                        Username: <input type="text" name="username"><br>
                        Password: <input type="password" name="password"><br>
                        <input class="btn" type="submit" name="login" value="login">
                        <?php if(isset($_GET['msg'])): ?>
                            <?php echo "<p>".base64_decode($_GET['msg'])."</p>"; ?>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php
    include __DIR__ . "/master/footer.php";
?>