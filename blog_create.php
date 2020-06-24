<?php
require_once('./dbc.php');
$blogs =$_POST;

if(empty($blogs['title'])){
    exit('タイトルを入力して下さい');
}
if(mb_strlen($blogs['title'])>191){
    exit('191文字以下にしてください');
}
if(empty($blogs['content'])){
    exit('本文を入力してください');
}
if(empty($blogs['category'])){
    exit('カテゴリーは必須です');
}
if(empty($blogs['publish_status'])){
    exit('公開ステータスは必須です');
}

$sql='INSERT INTO
            blog(title,content,category,publish_status)
       VALUES
            (:title,:content,:category,:publish_status)';

$dbh=dbConnect();
$dbh->beginTransaction();
try{
    $stmt=$dbh->prepare($sql);
    $stmt->bindValue(':title',$blogs['title'],PDO::PARAM_STR);
    $stmt->bindValue(':content',$blogs['content'],PDO::PARAM_STR);
    $stmt->bindValue(':category',$blogs['category'],PDO::PARAM_INT);
    $stmt->bindValue(':publish_status',$blogs['publish_status'],PDO::PARAM_INT);
    $stmt->execute();
    $dbh->commit();
    echo 'ブログを投稿しました';
}catch(PDOException $e){
    $dbh->rollBack();
    exit($e);
}

?>