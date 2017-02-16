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
  <a class = "blog" href = "../index.php" ><h1>My Blog</h1></a>
      <a class = "links" href = "index.php?action=add"> Add article </a><a class = "links"id="logout" href="logoutadmin.php">Log out</a>
   <div>
     <table class = "admin-table">
         <tr>
             <th>Data</th>
             <th>Title</th>
             <th></th>
             <th></th>
         </tr>
       <?php foreach ($articles as $a): ?>
        <tr>
             <td><?=$a['date']?></td>
             <td><?=$a['title']?></td>
             <td>
                 <a class = "edit" href = "index.php?action=edit&id=<?=$a['id']?>">Edit</a>
             </td>
             <td>
                 <a class = "edit" href = "index.php?action=delete&id=<?=$a['id']?>">Delete</a>
             </td>
            
        </tr>  
          <?php endforeach ?>
     </table>
       
   </div>
   <footer>
       <p>MyBlog 2017</p>
   </footer>
   
   
   </div>
  
</body>
</html>
