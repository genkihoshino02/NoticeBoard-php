<?php 
require_once('dbc.php');

// 名前空間の表示設定



$blogData = getAllBlog();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>list of blog</title>
</head>
<body>
    <h2>ブログ一覧</h2>
    <p><a href="./form.html">新規作成</a></p>
    <table>
        <tr>
            <th>No.</th>
            <th>タイトル</th>
            <th>カテゴリ</th>
        </tr>
        <?php foreach($blogData as $column): ?>
        <tr>
            <td><?php echo $column['id'];?> </td>
            <td><?php echo $column['title'];?> </td>
            <td><?php echo setCategoryName($column['category']);?> </td>
            <td><a href="./detail.php?id=<?php echo $column['id']; ?>"> Detail </a> </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
