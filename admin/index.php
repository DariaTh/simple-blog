<?php
ob_start();

    require_once("../database.php");
    require_once("../models/articles.php"); 
    
    $link = db_connect();

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        if (articles_new($link, $_POST['title'], $_POST['date'], $_POST['image'], $_POST['content'])){
            $articles = articles_all($link);
            include("../views/articles_admin.php");
        }
    else{
        include("../views/article_admin.php"); 
    }
    
        
    }
        
    else{ 
 /* */


    if(isset($_GET['action']))
        $action = $_GET['action'];
    else
        $action = "";


    if($action == "add"){
        //// 
        if(!empty($_POST)){
            articles_new($link, $id, $_POST['title'], $_POST['date'], $_POST['image'], $_POST['content']);
            header("Location: index.php");
        }
        
        ///
          include("../views/article_admin.php"); 
    }
         ////////////////////////////// edit 
    else if ($action == "edit"){
        if (!isset($_GET[id]))
            header("Location: index.php");
        $id = (int)$_GET['id'];
        
        if(!empty($_POST) && $id > 0){
            articles_edit($link, $id, $_POST['title'], $_POST['date'], $_POST['image'], $_POST['content']);
            header("Location: index.php");
        }
        
        $article = articles_get($link, $id);
        /////////////////////////////////
          include("../views/article_admin.php"); 
    }     
      //////////////////////delete
   else if($action == "delete"){
          $id = $_GET['id'];
          $article = articles_delete($link, $id);
          header("Location: index.php");
       
   }
         //
    else{
        $articles = articles_all($link);
        include("../views/articles_admin.php"); 
    }
        
    }


ob_end_flush();
    
?>
