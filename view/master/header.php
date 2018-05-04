<!DOCTYPE html>
<html lang="en">
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To Do List</title>
</head>
<body>
    <nav>
        <div class="nav-wrapper container">
            <a href="#" class="brand-logo">To Do List</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="index.php">Home</a></li>
                <?php if(!$authStatus): ?>
                    <li><a href="index.php?page=login">Login</a></li>
                    <li><a href="index.php?page=register">Register</a></li>
                <?php else: ?>
                    <li><a href="index.php?action=logout">Logout</a></li>
                    <?php echo "<li><b>Welcome, ".$_SESSION['login']['username']."</b></li>"; ?>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
