<?php 
// ログイン済みかテェックし、未ログインであれば
if (!isset($_SESSION['user_id'])) {
    header("Location:signin.php");
    exit();
  }
?>