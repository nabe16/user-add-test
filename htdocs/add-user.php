<?php
session_start();
session_gc();

?>
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
.adduser {
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
#email {
    font-size: 25px;
    color: #778899;
}
#admin {
    color: #778899;
}
</style>
</head>

<body>
<div class="container">
<div class="row justify-content-center">
    <div class="col-md-6 my-5">
        <h1 class="adduser">AddUser</h1>
    </div>
</div>
<form action="add-complete.php" method="post">
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
                <label for="email" id="email">Email-Adress</label>
                <input class="form-control" name="email" placeholder="Email-Adress">
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
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" name="admin" value="1">
                <label for="admin" class="form-check-label" id="admin">管理者ユーザー</label>
            </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-sm-6 my-2 mx-2">
        <button type="submit" class="btn btn-warning">Add User</button>
    </div>
</div>
</form>

</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
