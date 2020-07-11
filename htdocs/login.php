<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<title>Login</title>
<style>
body {
    background-color:#f5f5f5;
}
.login {
    text-align: center;
    font-size: 150px;
    color: #a9a9a9;
}
#userid {
    font-size: 30px;
    color: #a9a9a9;
}
#password {
    font-size: 30px;
    color: #a9a9a9;
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

<form>
<div class="row justify-content-center">
    <div class="col-sm-6 m-2">      
            <div class="form-group">
                <label for="userId" id="userid">UserID</label>
                <input class="form-control" id="useId" placeholder="UserID">
            </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-sm-6 m-2">
            <div class="form-group">
                <label for="password" id="password">Password</label>
                <input class="form-control" placeholder="Password">
            </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-sm-6 m-2">
    <button type="submit" class="btn btn-warning">Submit</button>
    </div>
</div>
</form>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>

</html>

