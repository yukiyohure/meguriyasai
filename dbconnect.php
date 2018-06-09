<?php
    $pdo = new PDO("mysql:dbname=meguriyasai;host=localhost;charset=utf8","root","");
    // SQL文にエラーがあった際、画面にエラーを出力する設定
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $dbh->query('SET NAMES utf8');//ここで指定するよりも$dsnの部分で指定したほうがいい。https://qiita.com/mpyw/items/b00b72c5c95aac573b71
?>
