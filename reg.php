<?php
    session_start();
    ?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Регистрация</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <?php
    require "header.php"
    ?>


<section class="d-flex justify-content-center mt-5">

        <div class="auth-box flex-column">
            <div class="authTitle">
                <h1>Регистрация</h1>
            </div>
          <form method="post" class="auth-form" action = "reg_controller.php">
            <input name="regEmail" type="email" size="15" maxlength="15" class="auth-input" required placeholder="Ваша почта"><br>
            <input name="regPassword" type="password" size="15" maxlength="15" class="auth-input" required placeholder="Ваш пароль"><br>
            <input name="fio" type="text" size="15" maxlength="32" class="auth-input" required placeholder="Ваше ФИО"><br>
              <div class="btn submit mx-auto">
                  <input type="submit" name="reg" value="Зарегистрироваться" class="auth-submit btn btn-info">
              </div>
          </form>
</div>
</section>
    <?php
    include_once 'footer.php'
    ?>
    </body>
    </html>