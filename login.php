<?php
    session_start();
?>
<html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Логин</title>
      <link rel="stylesheet" href="style.css">
    </head>
    <?php
      require 'header.php';
    ?>

    <section class="d-flex justify-content-center mt-5">

        <div class="auth-box flex-column ">
            <div class="authTitle">
                <h1>Вход</h1>
            </div>
          <form method="post" class="auth-form mb-0" action ="login_controller.php">
            <input type="text" name="email" value="" size="15" maxlength="15" class="auth-input" required placeholder="Email"><br>
            <input type="password" name="password" value="" size="15" maxlength="15" class="auth-input mb-3" required placeholder="Пароль"><br>
              <input type="submit" name="commit" value="Войти" class="auth-submit btn btn-info btn-block mb-2">
          </form>
            <a href="reg.php" class="auth-reg btn btn-info btn-block mx-auto">Зарегистрироваться</a>
      </div>   
    </section>

    <?php
    include_once 'footer.php'
    ?>
    </body>
</html>