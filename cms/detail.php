<?php
session_start();
require_once("../funcs.php");

$id = $_GET['id'];

// ログインチェク処理
sessionCheck();

//1.  DB接続します
$pdo = db_conn();

//２．データ抽出SQL作成
$stmt = $pdo->prepare("SELECT * FROM ec_table WHERE id=" . $id);
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    sql_error($status);
} else {
   $result = $stmt->fetch();
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
  </header>
  <!-- end header-->

  <div class="outer_cms">

    <!--商品本情報-->
    <div class="wrapper wrapper-cms">
      <!--商品選択フォーム-->
      <form action="update_view.php" method="post" class="flex-parent cartin-area cms-area" enctype="multipart/form-data">
        <!--商品情報-->
        <p class="cms-thumb"><img src="https://placehold.jp/c9c9c9/ffffff/600×600.png?text=%E3%83%80%E3%83%9F%E3%83%BC%E7%94%BB%E5%83%8F" width="200"></p>
        <dl class="cms-list">
          <dt>画像</dt>
          <dd><input type="file" name="fname" class="cms-item" accept="image/*" value='./img/'<?= $result["fname"] ?>></dd>
          <dt>商品名</dt>
          <dd><input type="text" name="item" placeholder="商品名を入力" class="cms-item" value=<?= $result['item'] ?>></dd>
          <dt>金額</dt>
          <dd><input type="text" name="value" placeholder="金額を入力" class="cms-item" value=<?= $result['value'] ?>></dd>
          <dt>商品紹介文</dt>
          <dd><textarea name="description" id="" cols="30" rows="10" class="cms-item"><?= $result['description'] ?></textarea></dd>
          <dd><input type="hidden" name="id" value=<?= $result['id'] ?>></dd>
        </dl>
        <!--end 商品情報-->
        <ul class="btn-list btn-list__cms">
          <li class="">
            <a href="item_list.php" class="btn-back">戻る</a>
          </li>
          <li class="btn-calculate">
            <input type="submit" id="btn-update" value="登録">
          </li>
        </ul>
        </form>
        <!--end 商品選択フォーム-->
    </div>
    <!--end 商品本情報-->
  </div>

  <!--footer-->
  <footer class="footer">
    <div class="wrapper wrapper-footer">

    </div>
    <p class="copyrights"><small>copyrights NIKO-NIKO Second-hand bookstore All RIghts Reserved.</small></p>
  </footer>
  <!--end footer-->

<script src="http://code.jquery.com/jquery-3.0.0.js"></script>
<script>
//---------------------------------------------------
//画像サムネイル表示
//---------------------------------------------------
// アップロードするファイルを選択
$('input[type=file]').change(function() {
  //選択したファイルを取得し、file変数に格納
  var file = $(this).prop('files')[0];
  // 画像以外は処理を停止
  if (!file.type.match('image.*')) {
    // クリア
    $(this).val(''); //選択されてるファイルを空にする
    $('.cms-thumb > img').html(''); //画像表示箇所を空にする
    return;
  }
  // 画像表示
  var reader = new FileReader(); //1
  reader.onload = function() {   //2
    $('.cms-thumb > img').attr('src', reader.result);
  }
  reader.readAsDataURL(file);    //3
});
</script>
</body>
</html>
