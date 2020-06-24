<?php 
// 変数
const ID=1;
$title='test';
$content='this is test';
$publish_at='2020-06-20';
$tag=['PHP','programming'];
$status =true;

const ID2=2;
$title2='test2';
$content2='this is test2';
$publish_at2='2020-06-21';
$tag2=['PHP2','programming2'];
$status2 =true;

$i=0;
while($i<3){
    echo '<br>';
    $i++;
}

// 二つの記事データを配列に入れて、ループ処理で表示する。
$blog1=array(
    'id' => ID,
    'title'=>$title,
    'content'=>$content,
    'publish_at'=>$tag,
    'status'=>$status
);

// 配列の中からキーを指定する

echo $blog1['title'];

$i=0;
while($i<3){
    echo '<br>';
    $i++;
}

$blog2=[
    'id2' => ID2,
    'title2'=>$title2,
    'content2'=>$content2,
    'publish_at2'=>$tag2,
    'status2'=>$status2
];

// 多次元配列
$blogs=[$blog1,$blog2];


echo '<pre>';
var_dump($blogs);
echo '<pre>';



// foreach

// foreach($blog1 as $blog){
//     echo $blog;
// }





// key and value in foreach

foreach($blog2 as $key => $value){
    echo '<pre>';
    echo $key .':'. $value;
    echo '<pre>';
}


// 多次元配列Blogsを展開するには
foreach($blogs as $blog){
    foreach($blog as $value){
        echo '<pre>';
        echo  $value;
        echo '<pre>';
    }
}

// // 定数
// echo '<br>';



// echo ID;
// echo '<br>';
// echo $title;
// echo '<br>';
// echo $content;
// echo '<br>';
// echo $publish_at;
// echo '<br>';
// print_r($tag);

// // データ型
// var_dump($title);

// echo '<br>';
// echo "title:$title";
// echo '<br>';
// echo 'title:$title';
?>
