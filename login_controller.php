<?php
session_start();
      if ((isset($_POST['email'])) && (isset($_POST['password'])))
      {
          $email = $_POST['email']; 
          $password=$_POST['password'];

          $email = stripslashes($email);
          $email = htmlspecialchars($email);
          $password = stripslashes($password);
          $password = htmlspecialchars($password);
          $email = trim($email);
          $password = trim($password);

          include("bd_connector.php");
          global $db;

          $result = mysqli_query($db,"SELECT * FROM user WHERE email='$email'");
          $myrow = mysqli_fetch_array($result);
          if (empty($myrow['email']))
          {
          echo "Извините, данного пользователя не существует";
          }
          else {
              if ($myrow['password']==$password) {
              $_SESSION['email']=$myrow['email']; 
              $_SESSION['id']=$myrow['id'];
              $_SESSION['FIO']=$myrow['FIO']; 
              header('Location: index.php');
              }
          else {
              echo "Извините, введённый вами email или пароль неверный.";
              }
          }
      }
      if (isset($_POST['outer']))
      {
          session_unset();
          header("Location: index.php");
      }