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
   <h1><a class = "blog" href = "../index.php"> My Blog </a></h1>
    
   <div>
        <form method = "post" action = "index.php?action=<?=$_GET['action']?>&id=<?=$_GET['id']?>">
            
               <label>
                Name </label>
                <input type = "text" name = "title"  value="<?=$article['title']?>" class = "form-control" autofocus required>
            
           
            <label>
                Date </label>
                <input type = "date" name = "date"  value="<?=$article['date']?>" class = "form-control" required>
                
            <label>
                Image </label>
                <input type = "text" name = "image"  value="<?=$article['image']?>" class = "form-control" required>
            
            
            <label>
                Content </label> 
               <br>
                <textarea class "form-control"  name = "content" required><?=$article['content']?></textarea>
            
            <br><br>
            <input type = "submit" value="Save" class = "btn btn-primary">
           
        </form>
       <?php
            
        ?>
   
   <footer>
       <p>MyBlog 2017</p>
   </footer>
  </div> 
  
  
</body>
</html>
