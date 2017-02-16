<?php

 require_once("../database.php");
require_once("../models/articles.php");

$link = db_connect();
$article = articles_get($link, $_GET['id']);
$comment = comments_get($link, $_GET['id']);
$comments = comments_all($link, $_GET['id']);
// include("../views/article.php");

?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
</head>

<body>
  <div class = "container">
   <h1><a class = "blog" href = "intropage.php"> My Blog </a></h1>

   <div>

       <div class = "article">
           <h3 class="titles">
               <?=$article['title']?>
           </h3>

           <h5><span class="glyphicon glyphicon-time"></span> <em>Posted: <?=$article['date']?></em><br></h5>

           <img src="<?=$article['image']?>" alt="">

           <p><?=$article['content']?></p>
       </div>



             <br>
      <h4>Leave a Comment:</h4>

         <form method = "post">

               <label>
                Name </label>
                <input type = "text" name = "name"  value="" class = "form-control" autofocus required>

            <label>
                Comment </label>
               <br>                
              <textarea class "form-control"   name = "comment" required></textarea>
               <br>
            <input type = "submit" value="Send" class = "btn btn-primary">
            <input type="hidden" name="id_article" value=<?= $_REQUEST['id'] ?> />
        </form>
         <br>

      
      <?php
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            comments_new($link, $_POST['name'], $_POST['comment'], $_POST['id_article']);
        }
        
  ?>
  
      <?php
       
          foreach ($comments as $comment):
            if($comment['id_article'] = $_GET['id']){
             //   echo ($comment['id_article']);
       ?>
       
       <div class = "comment">
           <h4><?=$comment['name']?></h4>
          <p><?=$comment['comment']?> </p>
        </div>
        
        <?php         
          } endforeach;   
       
       ?>
    
   </div>

   <footer>
       <p>MyBlog 2017</p>
   </footer>

   </div>

    <script src=""></script>
</body>
</html>
