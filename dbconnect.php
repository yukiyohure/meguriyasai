<?php
    $db = parse_url($_SERVER['CLEARDB_DATABASE_URL']);
    $db['dbname'] = ltrim($db['path'], '/');
    $dsn = "mysql:host={$db['host']};dbname={$db['dbname']};charset=utf8";
    $user = $db['user'];
    $password = $db['pass'];
    // $pdo = new PDO("mysql:dbname=meguriyasai;host=localhost;charset=utf8","root","");
    $dbh = new PDO($dsn,$user,$password,"");
    // SQL文にエラーがあった際、画面にエラーを出力する設定
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $dbh->query('SET NAMES utf8');//ここで指定するよりも$dsnの部分で指定したほうがいい。https://qiita.com/mpyw/items/b00b72c5c95aac573b71
?>
