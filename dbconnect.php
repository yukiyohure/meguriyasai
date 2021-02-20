<?php
    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $db_name = substr($url["path"], 1);
    $db_host = $url["host"];
    $user = $url["user"];
    $password = $url["pass"];
    $dsn = "mysql:dbname=".$db_name.";host=".$db_host.";charset=utf8mb4";
    $pdo=new PDO($dsn,$user,$password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    // $dbh->query('SET NAMES utf8');//ここで指定するよりも$dsnの部分で指定したほうがいい。https://qiita.com/mpyw/items/b00b72c5c95aac573b71
?>
