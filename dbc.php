<?php 
// グローバル関数に\を付ける
// namespace Blog\Dbc;
// 関数一つ一つに機能のみを持たせる
require_once('env.php');
Class Dbc 
{
        protected $table_name;

    
        // データベース接続
        // 引数：なし 返り血：接続結果
          protected function dbConnect(){
            $host=DB_HOST;
            $dbname=DB_NAME;
            $user=DB_USER;
            $pass=DB_PASS;
            $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
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

        public function getAll(){
            $dbh=$this->dbConnect();
            // echo '接続成功';
            $sql="SELECT*FROM $this->table_name";
            $stmt=$dbh->query($sql);
            $result=$stmt->fetchall(\PDO::FETCH_ASSOC);
            return $result;
            
            //接続終了
            $dbh = null; 
        }

        // $blogData=getAllBlog();

        

        // 引数；$ID

        public function getById($id){
            if(empty($id)){
                exit('IDが不正です。');
            }
            
            
            
            $dbh=$this->dbConnect();
            // SQL準備- プレースホルダー
            $stmt = $dbh->prepare("SELECT * FROM $this->table_name Where id=:id");
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

        public function delete($id){
            if(empty($id)){
                exit('IDが不正です。');
            }
            
            
            
            $dbh=$this->dbConnect();
            // SQL準備- プレースホルダー
            $stmt = $dbh->prepare("DELETE FROM $this->table_name Where id=:id");
            $stmt->bindValue(':id',(int)$id,\PDO::PARAM_INT);
            
            // SQL実行
            $stmt->execute();
            // 結果の取得
            echo 'ブログを削除しました';
            return $result;
        }

}
?>

