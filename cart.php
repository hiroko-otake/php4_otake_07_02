<?php
session_start();
//----------------------------------------------------
//1．SESSIONからカートを取得
//※カートSESSION: array([0]=item,[1]=value,[2]=num,[3]=fname);
//----------------------------------------------------
$view ='';
//$_SESSION["cart"]のデータを取得
foreach($_SESSION["cart"] as $key => $value){
      $view .='<li class="cart-list">';
      $view .='<p class="cart-thumb"><img src="./img/'.$value[3].'" width="80"></p>';
      $view .='<h2 class="cart-title">'.$value[0].'</h2>';
      $view .='<p class="cart-price">¥'.$value[1].'</p>';
      $view .='<p class="cart-number">'.$value[2].'</p>';
      $view .='<a href="cartremove.php?id='.$key.'" class="btn-delete">削除</a>'; //$key
      $view .='</li>';
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <!--header-->
  <header class="header">
    <h1 class="site-title">NIKO-NIKO Second-hand bookstore</h1>
  </header>
  <!--end header  -->

  <div class="outer_cart">
    <h1 class="page-title">買い物かご</h1>
    <div class="wrapper wrapper-main flex-parent">
      <main class="wrapper-main">
        <ul class="label-list">
          <li class="label-item">商品写真</li>
          <li class="label-item">商品名</li>
          <li class="label-item">単価</li>
          <li class="label-item">数量</li>
          <li class="label-item">削除</li>
        </ul>
        <ul class="cart-products" style="">
        <?php
          //表示
          echo $view;
        ?>
        </ul>
        <ul class="btn-list">
          <li class="btn-item btn-buy"><a href="index.php">買い物を続ける</a></li>
          <li class="btn-item btn-calculate"><a onclick="alert('外部決済サイトに移動...');">注文手続きへ</a></li>
        </ul>
      </main>
    </div>
  </div>

  <!--footer-->
  <footer class="footer">
    <div class="wrapper wrapper-footer">

    </div>
    <p class="copyrights"><small>copyrights NIKO-NIKO Second-hand bookstore All RIghts Reserved.</small></p>
  </footer>
  <!--end footer-->

<script src="http://code.jquery.com/jquery-3.0.0.js"></script>
</body>
</html>
