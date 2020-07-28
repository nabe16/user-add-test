<?php
session_start();
session_gc();

$tempfile = $_FILES['fname']['tmp_name'];
$filename = hash("md5", $FILES['fname']['name']);
$type = mb_strstr($_FILES['fname']['name'],'.');
$filepath = './image/'.$filename.$type;
$num = 1;

if(is_uploaded_file($tempfile)){
    
    if(file_exists($filepath)){

        while($num <= 200){
            $filepath = './image/'.$filename.'_'.$num.$type;
            if(file_exists($filepath)){
                $num++;
                continue;
            }else{
                break;
            }
        }
        if(move_uploaded_file($tempfile, $filepath)){
            $msg1 = $_FILES['fname']['name'];
            $msg2 = "アップロード完了しました";
        }else{
            $msg1 = 'アップロード出来ませんでした';
        }

    }else{
        if(move_uploaded_file($tempfile, $filepath)){
            $msg1 = $_FILES['fname']['name'].'のアップロード完了しました';
        }else{
            $msg1 = 'アップロード出来ませんでした';
        }
    }

}else{
    $msg1 = 'ファイルが選択されていません';
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
<title>Image Upload</title>
<style>
body {
    background-color:#f5f5f5;
}
.msg {
    text-align: center;
    font-size: 20px;
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
        <h1 class="msg"><?php echo $msg1; ?></h1>
        <h1 class="msg"><?php echo $msg2; ?></h1>
    </div>
</div>
<div class="row justify-content-center">
    <div class="list-group">
        <a href="home-admin.php" class="list-group-item list-group-item-action">Home</a>
        <a href="user-list.php" class="list-group-item list-group-item-action active">Image Upload</a>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-sm-6 mt-5" id="link">
        <p><a href="logout.php" class="text-warning">ログアウト</a>する</p>
    </div>
</div>
</div>
</body>
</html>
