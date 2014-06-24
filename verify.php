 <?php
    if(isset($_POST['submit'])) {
        include 'db_connect.php';
        //Choose some sort of password encryption, I choose sha256
        //Password function (Not In all versions of MySQL).
        $user = mysql_real_escape_string($_POST['username']);
        $pass = hash('sha256', mysql_real_escape_string($_POST['password']));
        $sql = mysql_query("SELECT * FROM users WHERE username='$user' AND password='$pass' LIMIT 1");
        if(mysql_num_rows($sql) == 1) {
            $row = mysql_fetch_array($sql);
            session_start();
            $_SESSION['username'] = $row['username'];
            $_SESSION['fname'] = $row['first_name'];
            $_SESSION['lname'] = $row['last_name'];
            $_SESSION['logged'] = TRUE;
            $_SESSION['time'] = time();
            $_SESSION['inactive'] = 500; // Timeout in seconds
            $_SESSION['time'] = time(); // Setting current time as session start time
            header("Location: racuni.php"); // Modify to go to the page you would like
            exit;
        } else {
            header("Location: login.php");
            exit;
        }
    } else {    //If the form button wasn't submitted go to the index page, or login page
        header("Location: login.php");
        exit;
    }
?> 