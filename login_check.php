<?php

//最初にSESSIONを開始！！ココ大事！！
session_start();

if (!isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid'] != session_id()) {
  header('Location: login.php');
} else {
  header('Location: cms/item_list.php');
}