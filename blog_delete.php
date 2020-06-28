<?php
    require_once('blog.php');
    $blog=new Blog();
    $result=$blog->delete($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>
<body>
    <a href="index.php">Back</a>
</body>
</html>