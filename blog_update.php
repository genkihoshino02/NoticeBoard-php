<?php
require_once('./blog.php');

$blogs =$_POST;





$blog=new Blog();
$blog->blogUpdate($blogs);
$blog->blogValidate($blogs);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
    <br>
    <a href="index.php">Back</a>
</body>
</html>