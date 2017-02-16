<?php

function articles_all($link){

    $stmt = $link->prepare("SELECT * FROM articles ORDER BY id DESC");
    if ($stmt->execute()){
        return $stmt->fetchAll();
    }


}
function articles_get($link, $id_article){

    $stmt = $link->prepare("SELECT * FROM articles WHERE id = $id_article");

    if ($stmt->execute(array())){

        return $stmt->fetch();

    }

}
function articles_new($link, $title, $date, $image, $content){
    $title = trim($title);
    $content = trim($content);

    $stmt = $link->prepare("INSERT INTO articles (title, date, image, content)              VALUES (:title, :date,  :image, :content)");

    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':content', $content);

      $title = $_POST['title'];
    $date = $_POST['date'];
    $image = $_POST['image'];
    $content = $_POST['content'];

    $stmt->execute();
  header ('Location: index.php');
 

}
function articles_edit($link, $id, $title, $date, $image, $content){
    $title = trim($title);
    $content = trim($content);
    $date = trim($date);
    $id = (int)$id;

        $stmt = $link->prepare("UPDATE articles SET title=:title, date=:date, image=:image, content=:content  WHERE id=$id");

      $stmt->bindParam(':title', $title);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':content', $content);

      $title = $_POST['title'];
    $date = $_POST['date'];
    $image = $_POST['image'];
    $content = $_POST['content'];

    $stmt->execute();
    header ('Location: index.php');

}
function articles_delete($link, $id){

     $stmt = $link->prepare("DELETE FROM articles WHERE id = $id");

    $stmt->execute();



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
