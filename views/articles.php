<!DOCTYPE html>
<html>
<head>
    <meta charset="utf8">
    <title>My Blog</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
</head>

<body>
  <div class = "container">
  <h1 ><a class = "blog" href = "../index.php"> My Blog </a></h1>
      <a class = "links" href = "admin"> Admin panel </a>
      <a class = "links" id = "register" href = "register"> Sign up </a>
      <a class = "links" id="login" href = "../register/login.php"> Log in </a>
   <div>
     
     
     <?php


          foreach ($articles as $a): 
       ?>
       <div class = "article">
           <h3>
               <a class = "titles" href = "article.php?id=<?=$a['id']?>"><?=$a['title']?></a>
           </h3>
           <h5><span class="glyphicon glyphicon-time"></span> <em>Posted: <?=$a['date']?></em></h5>
           <img src="<?=$a['image']?>" alt="">
                    
           <p><?=articles_intro($a['content'])?>...</p>
        </div>
        <?php 
          
          endforeach; 
    
       ?>
        

  
  
  <ul class="pagination">
  <li><a href="#">&laquo;</a></li>
  <li><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
  <li><a href="#">&raquo;</a></li>
</ul>
  
   </div>
      
  
   <footer>
       <p class="panel-footer">MyBlog 2017</p>
   </footer>
    </div>

  
</body>
</html>
