<?php
session_start();
session_gc();

$max = 20;

$count = 0;

$userid = $_SESSION['userid'];



if(!(empty($userid))){
    $msg = 'User List';
    $link = '<p><a href="logout.php" class="text-warning">ログアウト</a>する</p>';

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
    while($row = $stmt->fetch()){
        $userlist[] = $row;
    }
    //全体のデータ数
    $rowCount = $stmt->rowCount();
    //トータルページ数
    $pageCount = ceil($rowCount / $max);

    //現在のページ数
    if(empty($_GET['pageid'])){
        $pageNow = 1;
    }else{
        $pageNow = $_GET['pageid'];
    }
    //配列の何番目から表示するか
    $start = ($pageNow - 1) * $max;

    //表示する範囲で配列を抽出
    $displayList = array_slice($userlist, $start, $max, true);

}else{
    $msg = 'Login failed!';
    $link = '<p><a href="login-form.php" class="text-warning">ログイン</a>してください</p>';

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
#image {
    font-size: 25px;
    color: #778899;
}
#link {
    color: #778899;
}
#form-file {
    font-size: 25px;
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
<?php  if(!($msg === 'Login failed!')):?>
<div class="row justify-content-center">
    <div class="list-group my-5">
        <a href="home-admin.php" class="list-group-item list-group-item-action">Home</a>
        <a href="" class="list-group-item list-group-item-action active">User List</a>
    </div>
</div>
<div class="row justify-content-center">
    <table class="table table-striped">
    <thead>
    <tr>
        <th>username</th>
        <th>email</th>
        <th>admin</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach($displayList as $user): ?>
            <tr>
                <?php 
                echo '<td>'.$user['userid'].'</td>';
                echo '<td>'.$user['email'].'</td>';
                echo '<td>'.$user['admin'].'</td>';
                ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
</div>
<?php  endif;?>
<div class="row justify-content-center">
    <div class="col-sm-6 mt-5" id="link">
        <?php
        if($pageNow > 1){
            $i = $pageNow - 1;
            echo '<a href="user-list.php?pageid='.$i.'">前へ</a>'.'　';
        }else{
            echo '前へ　';
        }

        for($i = 1; $i <= $pageCount; $i++){ // 最大ページ数分リンクを作成
            if ($i == $pageNow) { // 現在表示中のページ数の場合はリンクを貼らない
                echo $pageNow.'　'; 
            } else {
                echo '<a href="user-list.php?pageid='.$i.'">'.$i.'</a>'.'　';
            }
        }
        if($pageCount > $pageNow){
            $i = $pageNow + 1;
            echo '<a href="user-list.php?pageid='.$i.'">次へ</a>'.'　';
        }else{
            echo '次へ　';
        }

        ?>
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
