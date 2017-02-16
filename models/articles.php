<?php

function articles_all($link){
   $query = "SELECT * FROM articles ORDER BY id DESC";

   $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));

    // from DB:
    $n = mysqli_num_rows($result);
    $articles = array();

    for ($i = 0; $i < $n; $i++)
     {
        $row = mysqli_fetch_assoc($result);
        $articles[] = $row;
    }

    return $articles;

}
function articles_get($link, $id_article){
    $query = sprintf("SELECT * FROM articles WHERE id
    =%d", (int)$id_article);
    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));
    $article = mysqli_fetch_assoc($result);

    return $article;


}
function articles_new($link, $title, $date, $image, $content){
    $title = trim($title);
    $content = trim($content);
  
    if ($title == '')
        return false;

    $t = "INSERT INTO articles (title, date, image, content) VALUES ('%s', '%s',  '%s', '%s')";

    $query = sprintf($t, mysqli_real_escape_string($link, $title),
                     mysqli_real_escape_string($link, $date),
                     mysqli_real_escape_string($link, $image),
                     mysqli_real_escape_string($link, $content));

    $result = mysqli_query($link, $query);

    if(!$result)
        die(mysqli_error($link));

    return true;


}
function articles_edit($link, $id, $title, $date, $image, $content){
    $title = trim($title);
    $content = trim($content);
    $date = trim($date);
    $id = (int)$id;
  
    if($title == '')
        return false;

    $sql = "UPDATE articles SET title = '%s', content = '%s', date='%s', image='%s' WHERE id='%d'";

    $query = sprintf($sql,
        mysqli_real_escape_string($link, $title),
        mysqli_real_escape_string($link, $content),
        mysqli_real_escape_string($link, $date),
        mysqli_real_escape_string($link, $image),
                     $id);
    $result = mysqli_query($link, $query);

    if(!$result)
        die(mysqli_error($link));

    return mysqli_affected_rows($link);


}
function articles_delete($link, $id){
    $id = (int)$id;
 
    if($id == 0)
        return false;

    $query = sprintf("DELETE FROM articles WHERE id='%d'", $id);
    $result = mysqli_query($link, $query);

    if(!$result)
        die(mysqli_error($link));

    return mysqli_affected_rows($link);




}

function articles_intro($text, $len = 440){
    return mb_substr($text, 0, $len);
}

function comments_all($link){

    $stmt = $link->prepare("SELECT * FROM comments ORDER BY id DESC");
    if ($stmt->execute()){
        return $stmt->fetchAll();
    }

}
function comments_get($link, $id_article){

    $stmt = $link->prepare("SELECT * FROM comments WHERE id_article = $id_article");

    if ($stmt->execute(array())){

        return $stmt->fetch();

    }

}
function comments_new($link, $name, $comment, $is_article){
    $name = trim($name);
    $comment = trim($comment);

    $stmt = $link->prepare("INSERT INTO comments (name, comment, id_article) VALUES ('$name', '$comment', $is_article)");

    return $stmt->execute();
}

function count_comments($link, $id_article){
     $stmt = $link->prepare("SELECT COUNT(*) FROM comments WHERE id_article = $id_article");

    if ($stmt->execute(array())){

        return $stmt->fetch();

    }
}
?>
