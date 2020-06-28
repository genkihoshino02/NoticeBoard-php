<?php
        require_once('./blog.php');
    
        $blog=new Blog();
        $id=$_GET['id'];
        $result=$blog->getById($id);

        $id=$result['id'];
        $title=$result['title'];
        $content=$result['content'];
        $category=(int)$result['category'];
        $publish_status=(int)$result['publish_status'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blogform for Editting</title>
</head>
<body>
    <h2>Blog Form for Editting</h2>
    <form action="./blog_update.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id ?>">
        <p>blog title:</p>
        <input type="text" name="title" value="<?php echo $title ?>">
        <p>blog cntents:</p>
        <textarea name="content" id="content" cols="30" rows="10">
            <?php echo $content ?>
        </textarea>

        <br>
        <p>category</p>
        <select name="category">
            <option value="1" <?php if($category===1) echo "selected"?>>Daily</option>
            <option value="2"  <?php if($category===2) echo "selected"?>>programming</option>
        </select>
        <br>
        <input type="radio" name="publish_status" value="1" <?php if($publish_status===1) echo "checked"?>>Publish
        <input type="radio" name="publish_status" value="2" <?php if($publish_status===2) echo "checked"?>>Unpublish
        <br>
        <input type="submit" value="submit">
    </form>

    <br>

    <a href="index.php">Back</a>
</body>
</html>