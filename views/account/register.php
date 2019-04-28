<?php
?>

<div class="form-wrapper text-center">
    <form class="form-signin" action="register.php" method="post">
        <img class="mb-4" src="assets/img/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Регистрация</h1>

        <label for="inputName" class="sr-only">Имя</label>
        <input  type="text" id="inputName" class="form-control" placeholder="Имя" name="get_name">

        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email"  name="get_email" >

        <label for="inputPassword" class="sr-only">Пароль</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Пароль" name="get_password">

        <button class="btn btn-lg btn-primary btn-block" type="submit">Зарегистрироваться</button>
        <a href="login-form.php">Войти</a>
        <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
    </form>
</div>

