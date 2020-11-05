<?php

//最初にSESSIONを開始！！ココ大事！！
session_start();

if (!isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid'] != session_id()) {
  exit('LOGIN Error');
} elseif($_SESSION["kanri_flg"] == 0) {
  header('Location: item_list.php');
} else {
  header('Location: ../ums/us_list_view.php');
}