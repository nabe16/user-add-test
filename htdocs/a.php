<?php

$dsn = 'mysql:dbname=userlist;host=mysql';
$user = 'root';
$password  = 'password';
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true
);

try{
    $pdo = new PDO($dsn, $user, $password, $options);
}catch(PDOException $e){
    exit('データベースに接続できませんでした'.$e->getMessage());
}

$sql = 'select * from user';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$rowCount = $stmt->rowCount();

print_r($stmt);

while($row = $stmt->fetch()){
    $userlist[] = $row;
}



?>

