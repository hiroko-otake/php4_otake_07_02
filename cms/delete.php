<?php
session_start();
require_once("../funcs.php");

//1.GETでidを取得
$id = $_GET['id'];

// ログインチェク処理
sessionCheck();

//2.DB接続
$pdo = db_conn();

//3.UPDATE gs_an_table SET ....; で更新(bindValue)
$sql = 'DELETE FROM ec_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', h($id), PDO::PARAM_INT);    //更新したいidを渡す
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);

}else{
  //select.phpへリダイレクト
  header("Location: item_list.php");
  exit;
}
?>
