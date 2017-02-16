<?php
//echo "Hello";
require_once("database.php");
require_once("models/articles.php");

$link = db_connect();
$articles = articles_all($link);
$comments = comments_all($link);

include("views/articles.php");



?>