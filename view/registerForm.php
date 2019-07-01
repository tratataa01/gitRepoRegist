<title>Регистрация</title>
<div class="container">
<form action="register_user" method="post">

   <?php echo($data); ?>

   <h4>Регистрация</h4>

    <?php if(isset($_SESSION["done"])){ ?><div class="alert alert-success" role="alert"> <?php echo $_SESSION["done"]; ?> </div><?php }?>
    <?php if(isset($_SESSION["err"])){ ?><div class="alert alert-danger" role="alert"> <?php echo $_SESSION["err"]; ?> </div><?php }
    unset($_SESSION['done']);
    unset($_SESSION['err']); ?>

    <input type="text" name="login" class="form-control" placeholder="login" required>
    </br>
    <input type="text" name="pass" class="form-control" placeholder="pass" required>
    </br>
    <input type="text" name="email" class="form-control" placeholder="email" required>
    </br>
    <input type="text" name="city" class="form-control" placeholder="city" required>
</br>


<button class="btn btn-lg btn-primary btn-block" type="sumit">Регистрация</button>
    <a href="loginForm" class="btn btn-lg btn-primary btn-block" type="sumit">Авторизация</a>

</form>
</div>



