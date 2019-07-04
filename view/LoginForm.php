<title>Authorization</title>
    <div class="container">
        <form action="loginUserForm" method="post"><br>
            <h4>Authorization</h4>
            <?php
        if(isset($_SESSION["doneLog"])){ ?>
            <div class="alert alert-success" role="alert">
            <?php echo $_SESSION["doneLog"]; ?>
            </div>
            <?php } ?><?php
        if(isset($_SESSION["errLog"])){ ?>
            <div class="alert alert-danger" role="alert">
            <?php echo $_SESSION["errLog"]; ?>
            </div><?php }
             echo $_SESSION["UserID"];"</br>";
             unset($_SESSION['doneLog']);
             unset($_SESSION['errLog']); ?>

            </br><input type="text" name="login" class="form-control" placeholder="login" required>
            </br><input type="text" name="pass" class="form-control" placeholder="pass" required>
            </br> <button class="btn btn-info" type="sumit">Login to account</button>
        </form>
</div>