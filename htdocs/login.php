<?php
session_start();
session_gc();
$userid = $_POST['userid'];

$dsn = 'mysql:dbname=userlist;host=mysql';
$user = 'root';
$password = 'password';
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true
);

try {
    $pdo = new PDO($dsn, $user, $password, $options);
} catch(PDOException $e){
    exit('データベースに接続出来ませんでした。'.$e->getMessage());
}

$sql = 'select * from user where userid = :userid';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':userid', $userid);
$stmt->execute();
$userInfo = $stmt->fetch();

if(password_verify($_POST['password'], $userInfo['password'])){

    $_SESSION['userid'] = $userInfo['userid'];
    $_SESSION['admin'] = $userInfo['admin'];

    $msg = 'SUCCESS！';
    $link = '<p class="link"><a href="home.php" class="text-warning">ホーム画面</a>にすすむ</p>';
    if($userInfo['admin'] === '1'){
        $link = '<p class="link"><a href="home-admin.php" class="text-warning">ホーム画面</a>にすすむ</p>';
    }

}else{

    $msg = 'Wrong Password or UserID!';
    $link = '<p class="link"><a href="login-form.php" class="text-warning">ログイン画面</a>に戻る</p>';

}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width,initial-scale=1"/>
<meta name="description" content="説明文"/>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<title>Login</title>
<style>
body {
    background-color:#f5f5f5;
}
.msg {
    text-align: center;
    font-size: 75px;
    color: #778899;
}
.link {
    color: #778899;
}
</style>
</head>
<body>
<div class="container">
<div class="row justify-content-center">
    <div class="col-md-6 my-5">
        <h1 class="msg"><?php echo $msg; ?></h1>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-sm-6 mt-5" id="link">
        <?php echo $link; ?>
    </div>
</div>
</div>
</body>
</html>
