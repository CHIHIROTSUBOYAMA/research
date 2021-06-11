<?php
try {
    $db = new PDO('mysql:dbname=lemon322_wp1;host=183.181.83.211;charset=utf8mb4',"lemon322_wp1","03Chichichichi22");
} catch (PDOException $e) {
    print("DB接続エラー：" . $e->getMessage());
}
error_reporting();