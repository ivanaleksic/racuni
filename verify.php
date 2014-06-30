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
            // Brisanje session unos_zad form podataka
            $_SESSION['partner_zad'] = "0";
            $_SESSION['racun_zad'] = "";
            $_SESSION['status'] = "0";
            $_SESSION['dat_zad'] = "";
            $_SESSION['dat_val'] = "";
            $_SESSION['iznos_zad'] = "";
            $_SESSION['pop_tip'] = "0";
            $_SESSION['pop_izn'] = "";
            $_SESSION['pop_din'] = "";
            $_SESSION['tr_no1'] = "";
            $_SESSION['tr_no2'] = "";
            $_SESSION['tr_no3'] = "";
            $_SESSION['mod_no'] = "";
            $_SESSION['poz_no'] = "";
            // Brisanje session unos_upl form podataka
            $_SESSION['partner_upl'] = "0";
            $_SESSION['racun_upl'] = "";
            $_SESSION['dat_upl'] = "";
            $_SESSION['iznos_upl'] =  "";
            // Postavljanje username-a i timeout vremena
            $_SESSION['username'] = $row['username'];
            $_SESSION['inactive'] = 300;
            $_SESSION['time'] = time(); // Vreme starta sesije = Trenutno vreme
            header("Location: main.php"); // Ako sesija nije istekla
            exit;
        } else {
            header("Location: login.php"); //Ako je sesija istekla, idi na login stranu
            exit;
        }
    } else {    //Ako nije bilo submita forma, idi na login stranu
        header("Location: login.php");
        exit;
    }
?> 