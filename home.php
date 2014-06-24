<?php
session_start();
$_SESSION['session'] = time() - $_SESSION['time'];
if ($_SESSION['session'] > $_SESSION['inactive']) {
    $_SESSION['active'] = 0;
    session_destroy();
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="racuni.css" type="text/css">

    <script type="text/javascript">
        $(function() {
            $( ".datepicker" ).datepicker({ dateFormat: "yy-mm-dd", changeMonth: true, changeYear: true, yearRange:'-15:+5' }).val()
        })
    </script>
</head>

<body>
<div style="position:relative;width:100%;text-align:center;margin:0;overflow:hidden;">

    <!--<div style="position:relative;width:800px;margin:0 auto;overflow:hidden;margin:2em auto;">
    -->
        <div id="container" style="position:relative;width:1000px;margin:0 auto;overflow:hidden;margin:2em auto;">

            <div id="header" style="background-color:#D8D8D8;height:40px;line-height:40px;">
                <h2 style="margin-bottom:0;">Title</h2>
            </div>

            <div id="menu" style="background-color:#E8E8E8;height:480px;width:350px;float:left;text-align: left;">
                <br />
                <ul type="none">
                    <li>
                        <input type="radio">Plaćeni računi</input>
                    </li>
                    <li>
                        <input type="radio">Neplaćeni računi</input>
                    </li>
                    <li>
                        <p>Even more text that demonstrates how lines can span multiple lines</p>
                    </li>
                </ul>
            </div>

            <div id="content" style="background-color:#FFFFFF;height:480px;width:650px;float:left;">
                <br />
                <?php
                include 'db_connect.php';
                //query
                $sql = mysql_query("select zaduzenja.*,partneri.naziv, statusi.status from zaduzenja inner join partneri on zaduzenja.partner_id = partneri.id inner join statusi on zaduzenja.status = statusi.id");
                echo "<table id='tabela'>";
                echo "<tr><th>Račun No.</th><th>Korisnik</th><th>Status</th></td>";
                if(mysql_num_rows($sql)) {
                    while($row = mysql_fetch_assoc($sql)) {
                        $racun_no = $row['racun_no'];
                        $naziv = $row['naziv'];
                        $status = $row['status'];
                        echo "<tr><td style='width:70px;'>".$racun_no."</td><td style='width:120px;'>".$naziv."</td><td style='width:100px;text-align:center;'>".$status."</td></tr>";
                    }
                }
                echo "</table>";
                ?>
            </div>

            <div id="footer" style="background-color:#D8D8D8;clear:both;text-align:center;vertical-align:middle;height:40px;line-height:40px;">
                Copyright © Ivan Aleksić
            </div>

        </div>
    <!--</div>
    -->
</div>





</body>
</html>

