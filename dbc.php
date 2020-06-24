<?php 
// グローバル関数に\を付ける
// namespace Blog\Dbc;
// 関数一つ一つに機能のみを持たせる

// データベース接続
// 引数：なし　返り血：接続結果
function dbConnect(){
    $dsn = 'mysql:host=localhost;dbname=bolg_php;charset=utf8';
    $user='blog_user';
    $pass='0205fzny';

    try{
    $dbh=new \PDO($dsn,$user,$pass,[
        \PDO::ATTR_ERRMODE =>\PDO::ERRMODE_EXCEPTION,
    ]);


    } catch(PDOException $e){
        echo '接続失敗'.$e->getMessage();
        exit();
    };

        return $dbh;
}

// 2. データを取得する
// 引数：なし　返り血：取得したデータ

function getAllBlog(){
    $dbh=dbConnect();
    // echo '接続成功';
    $sql='SELECT*FROM blog';
    $stmt=$dbh->query($sql);
    $result=$stmt->fetchall(\PDO::FETCH_ASSOC);
    return $result;
    
    //接続終了
    $dbh = null; 
}

$blogData=getAllBlog();

function setCategoryName($category){
    if($category==='1'){
        return 'programming';
    }else if($category==='2'){
        return 'daily';
    }else{
        return 'other';
    }
}

// 引数；$ID

function getBlog($id){
    if(empty($id)){
        exit('IDが不正です。');
    }
    
    
    
    $dbh=dbConnect();
    // SQL準備- プレースホルダー
    $stmt = $dbh->prepare('SELECT * FROM blog Where id=:id');
    $stmt->bindValue(':id',(int)$id,\PDO::PARAM_INT);
    
    // SQL実行
    $stmt->execute();
    // 結果の取得
    $result=$stmt->fetch(\PDO::FETCH_ASSOC);
    
    if(!$result){
        exit('ブログがありません');
    }
    return $result;
}
?>

