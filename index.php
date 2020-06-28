<?php 
require_once('blog.php');
ini_set('display_errors','On');
// 名前空間の表示設定

$blog= new Blog();
// var_dump($dbc);
$blogData = $blog->getAll();
function h($s){
    return htmlspecialchars($s,ENT_QUOTES,"UtF-8");
}
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
            
            <th>タイトル</th>
            <th>カテゴリ</th>
            <th>投稿日時</th>
        </tr>
        <?php foreach($blogData as $column): ?>
        <tr>
            
            <td><?php echo h($column['title']) ;?> </td>
            <td><?php echo h($blog->setCategoryName($column['category']));?> </td>
            <td><?php echo h($column['post_at']);?> </td>
            <td><a href="./detail.php?id=<?php echo $column['id']; ?>"> Detail </a> </td>
            <td><a href="./update_form.php?id=<?php echo $column['id']; ?>"> Edit </a> </td>
            <td><a href="./blog_delete.php?id=<?php echo $column['id']; ?>"> Delete </a> </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
