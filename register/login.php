<?php

// функція для генерація рандомного рядка
function generateCode($length=6) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];
    }
    return $code;
}

// $link=mysqli_connect("localhost", "mysql_user", "mysql_password", "testtable");
    $link = mysqli_connect('localhost', 'root', '', 'blog');
if(isset($_POST['submit']))
{
    // витягуємо з БД запис, який відповідає введеному логіну
    $query = mysqli_query($link,"SELECT user_id, user_password FROM users WHERE user_login='".mysqli_real_escape_string($link,$_POST['login'])."' LIMIT 1");
    $data = mysqli_fetch_assoc($query);

    // порівнюємо паролі
    if($data['user_password'] === md5(md5($_POST['password'])))
    {
        // генерація рандомного числа і його шифрування
        $hash = md5(generateCode(10));

        if(!empty($_POST['not_attach_ip']))
        {
            // якщо користувач вибрав привязку до IP
            // переводим IP в рядок
            $insip = ", user_ip=INET_ATON('".$_SERVER['REMOTE_ADDR']."')";
        }

        // запис в БД новий хеш авторизації і IP
        mysqli_query($link, "UPDATE users SET user_hash='".$hash."' ".$insip." WHERE user_id='".$data['user_id']."'");

        
        setcookie("id", $data['user_id'], time()+60*60*24*30);
        setcookie("hash", $hash, time()+60*60*24*30,null,null,null,true); 

        // переадресація на сторінку з перевіркою
        header("Location: check.php"); exit();
    }
    else
    {
        print "You entered an incorrect username / password";
    }
}
?>
<link rel="stylesheet" href="../style.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
 <meta charset="utf-8">
 
  <div class="regstr"> 
<h3 class="please">Please, enter your login and password:</h3><br>
<form method="POST">

<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input id="email" type="text" class="form-control" name="login" placeholder="Login">
  </div><br>
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    <input id="password" type="password" class="form-control" name="password" placeholder="Password">
  </div><br>

Do not attach to the IP <input type="checkbox" name="not_attach_ip"><br><br>


<input class="btn btn-primary" name="submit" type="submit" value="Log in">
</form>
</div>