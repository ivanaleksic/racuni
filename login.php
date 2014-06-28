<!DOCTYPE html>
<html lang="sr">
<head>
    <meta http-equiv="Content-Type"
          content="text/html;
          charset=utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <style>
        div{
            position:absolute;
            width:350px;
            height:200px;
            z-index:15;
            top:35%;
            left:50%;
            margin:-100px 0 0 -150px;
            background: white
        }
        .login-form{
            width: 300px;
            margin: 0 auto;
            text-align: center;
            padding: 20px;
            color: darkslategrey;
            background : #c4c4c4;
            border-radius: 7px;
            -webkit-border-radius: 7px;
            -moz-border-radius: 7px;
        }
        .input-group-sm{
            color: darkslategray;
        }
    </style>
</head>

<body>
    <div>
        <form class="login-form" action="verify.php" method="post">
            Username:<br>
            <input type="text" name="username" style="color:darkslategray;" autofocus="1"><br><br>
            Password:<br>
            <input type="password" name="password" style="color:darkslategray;"><br><br>
            <input type="submit" name="submit" class="btn btn-xs btn-success" value="Login"><input type="reset" class="btn btn-xs btn-danger" value="Clear" style="margin-left:10px;">
        </form>
    </div>
</body>
</html>