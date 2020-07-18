<?php

session_start();
$_SESSION = array();
session_destroy();

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
        <h1 class="msg">LOGOUT!</h1>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-sm-6 mt-5" id="link">
        <p class="link"><a href="login-form.php" class="text-warning">ログイン画面</a>に戻る</p>
    </div>
</div>
</div>
</body>
</html>
