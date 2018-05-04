<?php
    if(!$authStatus)
        header("location: index.php");

    include __DIR__ . "/master/header.php";
    include __DIR__ . "/../controller/todo.php";
?>

    <div class="container">
        <div class="row">
            <div class="col s12">
                <br>
                <div class="card-panel white">
                    <h4>Halaman To Do List</h4> 
                    <form action="index.php?action=todo" method="POST">
                        <input type="text" name="content" placeholder="Add new list">
                        <button type="submit" name="addlist" class="btn waves-effect waves-light red"><i class="left material-icons">add</i>Add List</button>
                    </form>
                    <?php foreach($contents as $data): ?>
                        <?php echo "<p>>> ".$data['content']." << ( <a href='index.php?action=todo&method=delete&id=".$data['id']."'>DELETE</a> )</p>"; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    
<?php
    include __DIR__ . "/master/footer.php";
?>