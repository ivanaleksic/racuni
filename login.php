<!DOCTYPE html>
<html lang="sr">
<head>
    <meta http-equiv="Content-Type"
          content="text/html;
          charset=utf-8">
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
            color: #D8D8D8;
            background : #c4c4c4;
            border-radius: 7px;
            -webkit-border-radius: 7px;
            -moz-border-radius: 7px;
        }
    </style>
</head>

<body>
    <div>
        <form class="login-form" action="verify.php" method="post">
            User Name:<br>
            <input type="text" name="username"><br><br>
            Password:<br>
            <input type="password" name="password"><br><br>
            <input type="submit" name="submit" value="Login"><input type="reset" value="Clear" style="margin-left:10px;">
        </form>
    </div>
</body>
</html>