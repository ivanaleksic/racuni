 <?php
    if(isset($_POST['submit'])) {
        include('includes/mysql_connect.php');
        //sha256 password enkripcija
        //Password funkcija (ne radi na svim verzijama MySQL-a)
        $user = mysql_real_escape_string($_POST['username']);
        $pass = hash('sha256', mysql_real_escape_string($_POST['password']));
        $sql = mysql_query("SELECT * FROM users WHERE username='$user' AND password='$pass' LIMIT 1");
        if(mysql_num_rows($sql) == 1) {
            $row = mysql_fetch_array($sql);
            session_start();
            $_SESSION['username'] = $row['username'];
            $_SESSION['inactive'] = 300; // Timeout u sekundama
            $_SESSION['time'] = time(); // Postavljanje trenutnog vremena za vreme starta sesije
            header("Location: home.php"); // Ako sesija nije istekla
            exit;
        } else {
            header("Location: login.php"); //Ako je sesija istekla
            exit;
        }
    } else {    //Ako nije bilo submita forma, idi na login stranu
        header("Location: login.php");
        exit;
    }
?> 