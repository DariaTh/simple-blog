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
   <h1><a class = "blog" href = "../index.php"> My Blog </a></h1>
    
   
   <div>
      
       <div class = "article">
           <h3 class = "titles">
               <?=$article['title']?>
           </h3>
           
            <h5><span class="glyphicon glyphicon-time"></span> <em>Posted: <?=$article['date']?></em></h5>
          <br>
           
           <img src="<?=$article['image']?>" alt="">
           
           <p><?=$article['content']?></p>
        </div>
        <br>
             
         <br>
       
      <?php
          $comment = comments_get($link, $_GET['id']);
            $comments = comments_all($link, $_GET['id']);
          
           foreach ($comments as $comment): 
       ?>
       
       <div class = "comment">
           <h4><?=$comment['name']?></h4>
          <p><?=$comment['comment']?> </p>
        </div>
        
        <?php         
          endforeach;    
       ?>
  
       
   </div>
   
   <footer>
       <p >MyBlog 2017</p>
   </footer>
   </div>
   
   
    <script src=""></script>
</body>
</html>
