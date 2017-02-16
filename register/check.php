<?

    $link = mysqli_connect('localhost', 'root', '', 'blog');
if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))
{
    $query = mysqli_query($link, "SELECT *,INET_NTOA(user_ip) AS user_ip FROM users WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");
    $userdata = mysqli_fetch_assoc($query);

    if(($userdata['user_hash'] !== $_COOKIE['hash']) or ($userdata['user_id'] !== $_COOKIE['id'])
 or (($userdata['user_ip'] !== $_SERVER['REMOTE_ADDR'])  and ($userdata['user_ip'] !== "0")))
    {
        setcookie("id", "", time() - 3600*24*30*12, "/");
        setcookie("hash", "", time() - 3600*24*30*12, "/");
        print "Hmmmm, something wrong:( ";
    }
    else
    {
      //  print "Hello, ".$userdata['user_login'].". It`s working!";
        include("intropage.php");
    }
}
else
{
    print "Cookie!";
}
?>
 <meta charset="utf-8">
 <link rel="stylesheet" href="style.css">