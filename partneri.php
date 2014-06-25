<?php
$_SESSION['session'] = time() - $_SESSION['time'];
if ($_SESSION['session'] > $_SESSION['inactive']) {
    session_destroy();
    echo '<script type="text/javascript">window.opener.location.href="login.php";window.close();</script>';
    echo '<script type="text/javascript">self.close();</script>';
    exit();
} else {
    include 'db_connect.php';
    //query
    $sql = mysql_query("SELECT * FROM partneri");
    echo "<table id='tbl_partneri'>";
    echo "<tr><th>ID</th><th>Naziv</th><th>Korisnik</th><th>Tekući račun</th><th>Model i poziv na broj</th></td>";
    $i = 0;
    if(mysql_num_rows($sql)){
        while($row = mysql_fetch_assoc($sql)){
            $id = $row['id'];
            $naziv = $row['naziv'];
            $korisnik = $row['korisnik'];
            $def_tr_no = $row['def_tr_no'];
            $def_mod_no = $row['def_mod_no'];
            $def_poz_no = $row['def_poz_no'];
            /*
            if ($i % 2 == 0) {
                echo "<tr class='tr.odd'><td style='width:30px;'>".$id."</td><td style='width:130px;'>".$naziv."</td><td style='width:130px;'>".$korisnik."</td><td style='width:150px;'>"
                .$def_tr_no."</td><td style='width:170px;'>".$def_mod_no." ".$def_poz_no."</td></tr>";
            } else {
                echo "<tr class='tr.even'><td style='width:30px;'>".$id."</td><td style='width:130px;'>".$naziv."</td><td style='width:130px;'>".$korisnik."</td><td style='width:150px;'>"
                .$def_tr_no."</td><td style='width:170px;'>".$def_mod_no." ".$def_poz_no."</td></tr>";
            }
            $i++;
            */
            echo "<tr class='table'><td style='width:30px;'>".$id."</td><td style='width:130px;'>".$naziv."</td><td style='width:130px;'>".$korisnik."</td><td style='width:150px;'>"
            .$def_tr_no."</td><td style='width:170px;'>".$def_mod_no." ".$def_poz_no."</td></tr>";
        }
    }
    echo "</table>";
}
?>