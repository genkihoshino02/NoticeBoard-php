<?php

$blog=$_POST;

if($blog['publish_status']==='un_publish'){
    echo '公開中の記事がございません';
    return;
}
// if($blog['publish_status']==='publish'){

// foreach($blog as $key=>$value){
//     echo '<pre>';
//     echo $key.':'.htmlspecialchars($value,ENT_QUOTES,'UTF-8');
//     echo '<pre>';
// }
// }
// elseif($blog['publish_status']==='un_publish'){
//     echo '公開中の記事がございません';
// }
// else{
//     echo '記事がありません';
// }




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blog</title>
</head>
<body>
    <h2><?php echo htmlspecialchars($blog['title'],ENT_QUOTES,'UTF-8'); ?></h2>
    <p>Date:<?php echo htmlspecialchars($blog['post_at'],ENT_QUOTES,'UTF-8'); ?></p>
    <p>category:<?php echo htmlspecialchars($blog['category'],ENT_QUOTES,'UTF-8') ; ?>  </p>
    <hr>
    <p><?php echo nl2br(htmlspecialchars($blog['content'],ENT_QUOTES,'UTF-8')); ?>   </p>
</body>
</html>