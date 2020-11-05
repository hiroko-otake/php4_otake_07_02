<?php
session_start();

require_once("funcs.php");

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
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<li class="products-item">';
    $view .= '<a href="item.php?id='.$result["id"].'">';
    $view .= '<p class="products-thumb"><img src="./img/'.$result["fname"].'" width="60" class="book_thumb"></p>';
    $view .= '<h3 class="products-title">'.$result["item"].'</h3>';
    $view .= '<p class="products-price">' . '¥' .$result["value"].'</p>';
    $view .= '</a>';
    $view .= '</li>';
  }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/jquery.bxslider.css">
</head>
<body>
  <header class="header">
  <h1 class="site-title">NIKO-NIKO Second-hand bookstore</h1>
      <a href="cart.php" class="btn btn-cart"><img src="images/common/icon-cart.png" alt="カート"></a>
  </header>

  <div class="outer">
    <div class="wrapper wrapper-main flex-parent">

      <main class="wrapper-main">

        <!--商品リスト-->
        <ul class="products-list">
            <?php echo $view; ?>
        </ul>
        <!--end 商品リスト-->

        <!--ページャー-->
        <ul class="pager clearfix">
          <li class="pager-item"><a href="#">1</a></li>
          <li class="pager-item"><a href="#">2</a></li>
          <li class="pager-item"><a href="#">3</a></li>
          <li class="pager-item"><a href="#">4</a></li>
          <li class="pager-item"><a href="#">5</a></li>
          <li class="pager-item"><a href="#">最後へ</a></li>
        </ul>
        <!--end ページャー-->
      </main>
    </div>
  </div>

  <!--footer-->
  <footer class="footer">
    <div class="wrapper wrapper-footer">
        <p class="copyrights"><small>copyrights NIKO-NIKO Second-hand bookstore All RIghts Reserved.</small></p>
        <div  class="login"><a href="login_check.php" style="color:white;">管理者画面にログイン</a></div>
    </div>
  </footer>
  <!--end footer-->

<script src="http://code.jquery.com/jquery-3.0.0.js"></script>
<script src="js/jquery.bxslider.min.js"></script>
<script>
  $(".bxslider").bxSlider({auto:true,options:3000});
</script>
</body>
</html>
