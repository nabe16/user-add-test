<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<meta name="description" content="説明文" />

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<title>Add User</title>
<style>
body {
    background-color:#f5f5f5;
}
.status {
    text-align: center;
    font-size: 75px;
    color: #778899;
}
.msg {
    font-size: 25px;
    color: #778899;
}
#link {
    color: #778899;
}
</style>
</head>

<body>
<?php
session_start();
session_gc();

//POSTデータを変数に格納
$userid = $_POST['userid'];
$email = $_POST['email'];
$pass = password_hash($_POST['password'],PASSWORD_DEFAULT);
$admin = $_POST['admin'];
if(empty($_POST['admin'])){
    $admin = 0;
}

//dsnの作成
$dsn = 'mysql:dbname=userlist;host=mysql';
$user = 'root';
$password = 'password';
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true
);

//PDO接続
try{
    //データベースへの接続
    $pdo = new PDO($dsn, $user, $password, $options);
}catch(PDOException $e){
    exit('データベースに接続できませんでした。'.$e->getMessege());
}

//db側のutf-8に設定
$stmt = $pdo->query('set names utf8');
if(!$stmt){
    $info = $pdo->errorInfo();
    exit($info[2]);
}

//userid重複チェック
$sql = 'select * from user where userid = "'.$userid.'"';
$stmt = $pdo->query($sql);
if(!$stmt){
    $info = $pdo->errorInfo();
    exit($info[1]);
}
$result = $stmt->fetch();

if(empty($result['userid'])){
    //レコード挿入
    $sql = 'insert into user(userid, email, password, admin) values(:userid, :email, :password, :admin)';
    $stml = $pdo->prepare($sql);
    $stml->bindValue(':userid', $userid);
    $stml->bindValue(':email', $email);
    $stml->bindValue(':password', $pass);
    $stml->bindValue(':admin', $admin);

    //execute エラー処理
    try {
        $result = $stml->execute();
        $status = 'Add Complete!';
        $msg = '新規登録が完了しました。';
        //SQL文の実行に失敗
        if(!$result){
            throw new Exception ('excute false'); 
        }else{
?>

<!--成功パターン-->
<div class="container">
<div class="row justify-content-center">
    <div class="col-md-6 my-5">
        <h1 class="status"><?php echo $status; ?></h1>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-sm-6 mt-2 mx-2">
        <p class="msg"><?php echo $msg; ?></p>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-sm-6 mt-5" id="link">
        <p><a href="login-form.php" class="text-warning">ログイン画面</a>に戻る</p>
    </div>
</div>
</div>

<?php
            exit;
        }
    } catch(Exception $e) {
            //email重複 登録失敗
            $status = 'FailedAddUser!!';
            $msg = 'すでに登録済のemailアドレスです。';
    }

}else{
    //UserID重複 登録失敗
    $status = 'FailedAddUser!!';
    $msg = 'すでに登録済のUserIDです。';
}

//データベースとの接続解除
$pdo = null;

?>

<!--失敗パターン-->
<div class="container">
<div class="row justify-content-center">
    <div class="col-md-6 my-5">
        <h1 class="status"><?php echo $status; ?></h1>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-sm-6 mt-2 mx-2">
        <p class="msg"><?php echo $msg; ?></p>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-sm-6 mt-5" id="link">
        <p><a href="adduser.php" class="text-warning">ユーザー追加画面</a>に戻る</p>
    </div>
</div>
</div>

</body>
</html>

