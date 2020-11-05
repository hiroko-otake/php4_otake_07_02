<?php
session_start();
require_once("../funcs.php");

$str = "";
if($_SESSION['kanri_flg']==1){
  $str = '（スーパー管理者）';
}else{
  $str = '（一般管理者）';
}


// ログインチェク処理
sessionCheck();

//1.  DB接続します
$pdo = db_conn();

//２．データ抽出SQL作成
$stmt = $pdo->prepare("SELECT * FROM ec_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false) {
 //execute（SQL実行時にエラーがある場合）
 $error = $stmt->errorInfo();
 exit("ErrorQuery:".$error[2]);

} else {
 //Selectデータの数だけ自動でループしてくれる
 while( $res = $stmt->fetch(PDO::FETCH_ASSOC)){
      $view .= '<li class="cart-list">';
      $view .= '<p class="cart-thumb"><img src="../img/'.$res["fname"].'" width="100"></p>';
      $view .= '<h2 class="cart-title">'.$res["item"].'</h2>';
      $view .= '<p class="cart-price">¥'.$res["value"].'</p>';
      $view .= '<a class="btn-detail" href="detail.php?id='. $res["id"]. '">更新</a>';
      $view .= '<a class="btn-delete" href="delete.php?id='. $res["id"]. '">'. (($_SESSION['kanri_flg']==1)? '削除':'') .'</a>';
      $view .= '</li>';
 }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/style.css">
</head>
<body class="cms">
  <!--header-->
  <header class="header">
      <h1 class="site-title">NIKO-NIKO Second-hand bookstore</h1>
      <div  class="logout"><a href="../logout.php" style="color:white;">ログアウト</a></div>
  </header>
  <!--end header  -->

  <div class="outer">
    <h1 class="page-title page-title__cms">＜在庫管理画面＞ 【<?php echo $_SESSION["name"] ?>さん<?php echo $str ?>でログインしています】</h1>
    <div class="wrapper wrapper-main flex-parent">
      <main class="wrapper-main">
        <ul>
            <?php echo $view; ?>
        </ul>
      </main>
    </div>
  </div>

  <!--footer-->
  <footer class="footer">
      <div class="wrapper wrapper-footer">
        <p class="copyrights"><small>copyrights NIKO-NIKO Second-hand bookstore All RIghts Reserved.</small></p>
        <div class="btns">
            <div  class="login_2"><a href="item.php" style="color:white;">在庫の追加</a></div>
            <div  class="login_2"><a href="login_check.php" style="color:white;">ユーザー管理</a></div>
            <div  class="login_2"><a href="../index.php" style="color:white;">ショップに戻る</a></div>
            </div>
      </div>
  </footer>
  <!--end footer-->

<script src="http://code.jquery.com/jquery-3.0.0.js"></script>
</body>
</html>
