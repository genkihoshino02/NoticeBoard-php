<?php 
    
    require_once('./dbc.php');
    $id=$_GET['id'];
    $result=getBlog($id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>detail</title>
</head>
<body>
    <h2>blog detail</h2>
    <h3>title:<?php echo $result['title'] ?> </h3>
    <p>date:<?php echo $result['post_at'] ?> </p>
    <p>category:<?php echo setCategoryName($result['category']) ?> </p>
    <hr>
    <p>content:<?php echo $result['content'] ?> </p>
</body>
</html>