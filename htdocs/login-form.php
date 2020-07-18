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
.login {
    text-align: center;
    font-size: 100px;
    color: #778899;
}
#userid {
    font-size: 25px;
    color: #778899;
}
#password {
    font-size: 25px;
    color: #778899;
}
#addUser {
    color: #778899;
}
</style>
</head>

<body>
<div class="container">
<div class="row justify-content-center">
    <div class="col-md-6 my-5">
        <h1 class="login">Login</h1>
    </div>
</div>
<form action="login.php" method="post">
<div class="row justify-content-center">
    <div class="col-sm-6 mt-2 mx-2">      
            <div class="form-group">
                <label for="userId" id="userid">UserID</label>
                <input class="form-control" name="userid" placeholder="UserID">
            </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-sm-6 mt-2 mx-2">
            <div class="form-group">
                <label for="password" id="password">Password</label>
                <input class="form-control" name="password" placeholder="Password">
            </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-sm-6 mt-2 mx-2">
    <button type="submit" class="btn btn-warning">Submit</button>
    </div>
</div>
</form>

<div class="row justify-content-center">
    <div class="col-sm-6 mt-5" id="addUser">
    <p>新規ユーザー登録は<a href="adduser.php" class="text-warning">こちら</a></p>
    </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>

