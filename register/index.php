<?php

    $link = mysqli_connect('localhost', 'root', '', 'blog');
if(isset($_POST['submit']))
{
    $err = [];

    // перевірка логіну
    if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login']))
    {
        $err[] = "Error"; // логін складається з букв англ алфавіту і цифр
    }

    if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30)
    {
        $err[] = "Error"; // мін -3, макс - 30 символів
    }

    // перевірка чи існує користувач з таким ім'ям
    $query = mysqli_query($link, "SELECT COUNT(user_id) FROM users WHERE user_login='".mysqli_real_escape_string($link, $_POST['login'])."'");
 /*   if(mysqli_num_rows($query) > 0)
    {
        $err[] = "Error"; // користувач існує
    }
*/
    // якщо немає помилок, користувач додається до бази
    if(count($err) == 0)
    {
        $login = $_POST['login'];

        // шифрування md5
        $password = md5(md5(trim($_POST['password'])));

        mysqli_query($link,"INSERT INTO users SET user_login='".$login."', user_password='".$password."'");
        header("Location: login.php"); exit();
    }
    else
    {
        print "<b>Smth wrong :( :</b><br>";
        foreach($err AS $error)
        {
            print $error."<br>";
        }
    }
}
?>
<link rel="stylesheet" href="../style.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
 <meta charset="utf-8">
 <div class="regstr"> 
 <h3 class="please">Please, enter your login and password:</h3>
<form method="POST">
<br>
<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input id="email" type="text" class="form-control" name="login" placeholder="Login">
  </div><br>
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    <input id="password" type="password" class="form-control" name="password" placeholder="Password">
  </div><br>

<input class="btn btn-primary" name="submit" type="submit" value="Sign up">
</form>
 </div>