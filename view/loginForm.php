
<title>Авторизация</title>
<div class="container">
<form action="loginUserForm" method="post">
<!--   --><?php //echo($data); ?>
   <h4>Авторизация</h4>
    <?php if(isset($_SESSION["doneLog"])){ ?><div class="alert alert-success" role="alert"> <?php echo $_SESSION["doneLog"]; ?> </div><?php }?>
    <?php if(isset($_SESSION["errLog"])){ ?><div class="alert alert-danger" role="alert"> <?php echo $_SESSION["errLog"]; ?> </div><?php }
    unset($_SESSION['doneLog']);
    unset($_SESSION['errLog']); ?>
    <input type="text" name="login" class="form-control" placeholder="login" required>
    </br>
    <input type="text" name="pass" class="form-control" placeholder="pass" required>
    </br>


<button class="btn btn-lg btn-primary btn-block" type="sumit">Войти</button>
    <a href="registration" class="btn btn-lg btn-primary btn-block" type="sumit">Регистрация</a>


</form>
</div>