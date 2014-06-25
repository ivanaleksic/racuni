<?php
session_start();
//if (isset($_SESSION['time'])) {
    /*$_SESSION['session'] = time() - $_SESSION['time'];
    if ($_SESSION['session'] > $_SESSION['inactive']) {
    	$_SESSION['active'] = 0;
        session_destroy();
        header("location:login.php");
    }*/
//}
include('timeout.php');
if(is_timeout()){
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
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="racuni.css" type="text/css">

    <script type="text/javascript">

        $(function () {
            $(".datepicker").datepicker({ dateFormat: "yy-mm-dd", changeMonth: true, changeYear: true, yearRange: '-15:+5' }).val()
        });

        function Partneri(url) {
            window.location.href = url;
        }

        function popUp(url) {
            var width  = 650;
            var height = 400;
            var left = (screen.width - 650) / 2;
            var top    = 200;
            var params = 'width='+width+', height='+height;
            params += ', top='+top+', left='+left;
            params += ', directories=no';
            params += ', location=no';
            params += ', menubar=yes';
            params += ', resizable=no';
            params += ', scrollbars=no';
            params += ', status=no';
            params += ', toolbar=no';
            window.open(url,'PHP Pop Up',params);
        }
    </script>
</head>
<!--
<?php /*function moja_funkcija($parm)
{
    return 'Moja funkcija koja se zove '.$parm;
}
*/?>
$jj=moja_funkcija('idemo kuci');
echo $jj;

-->
<body>
    <div style="float:left;width:400px;">
        <a herf="#" class="btn  btn-success">Button</a>
        <form id="unos_zad" action="insert.php" method="post" style="width:340px;font:Arial;">
            <div style="text-align:center;">
                <p style="text-align:center;">Podaci o zaduženju:</p>
            </div>
            <label class="label_wide">Datum izmene: </label>
            <input type="text" name="dat_izm" class="input_big datepicker" autocomplete="off">
            <br>
            <label class="label_wide">Partner: </label>
            <?php
                include 'db_connect.php';
                //query
                $sql=mysql_query("SELECT id, naziv FROM partneri");

                if(mysql_num_rows($sql)) {
                    $select= '<select id="partner_id" name="partner_id" class="select_big">';
                    while( $rs=mysql_fetch_array($sql)) {
                        $select.='<option value='.$rs['id'].'>'.$rs['naziv'].'</option>';
                    }
                }
                $select.='</select>';
                echo $select;
            ?>
            <br>
            <label class="label_wide">Broj računa: </label>
            <input type="text" name="racun_no" class="input_big">
            <br>
            <label class="label_wide">Status: </label>
            <?php
                include 'db_connect.php';
                //query
                $sql=mysql_query("SELECT id, status FROM statusi");
                if(mysql_num_rows($sql)) {
                    $select= '<select name="status" class="select_big">';
                    while($rs=mysql_fetch_array($sql)) {
                          $select.='<option value='.$rs['id'].'>'.$rs['status'].'</option>';
                    }
                }
                $select.='</select>';
                echo $select;
            ?>
            <br>
            <label class="label_wide">Datum zaduženja: </label>
            <input type="text" name="dat_zad" class="input_big datepicker" autocomplete="off">
            <br>
            <label class="label_wide">Datum valute: </label>
            <input type="text" name="dat_val" class="input_big datepicker" autocomplete="off">
            <br>
            <label class="label_wide">Iznos: </label>
            <input type="text" name="iznos_zad" class="input_big">
            <br>
            <label class="label_wide">Tip popusta: </label>
            <?php
                include 'db_connect.php';
                //query
                $sql=mysql_query("SELECT id, pop_tip FROM popusti");
                if(mysql_num_rows($sql)) {
                    $select= '<select name="pop_tip" class="select_big">';
                    while($rs=mysql_fetch_array($sql)) {
                        $select.='<option value='.$rs['id'].'>'.$rs['pop_tip'].'</option>';
                    }
                }
                $select.='</select>';
                echo $select;
            ?>
            <br>
            <label class="label_wide">Popust: </label>
            <input type="text" name="pop_izn" class="input_big">
            <br>
            <label class="label_wide">Iznos popusta: </label>
            <input type="text" name="pop_din" class="input_big">
            <br>
            <label class="label_wide">Tekući račun: </label>
            <input type="text" name="tr_no" class="input_big">
            <br>
            <label class="label_wide">Model i poziv na broj: </label>
            <input type="text" name="mod_no" class="input_small">
            <input type="text" name="poz_no" class="input_big" style="width:117px;margin-left:0px;">
            <br>
            <div style="text-align:center;">
                <p style="text-align:center;">Podaci o uplati:</p>
            </div>
            <label class="label_wide">Datum uplate: </label>
            <input type="text" name="dat_upl" class="input_big datepicker" autocomplete="off">
            <br>
            <label class="label_wide">Iznos: </label>
            <input type="text" name="iznos_upl" class="input_big">
            <br><br>
            <div style="text-align:center;">
                <input type="submit" value="Sacuvaj"><input type="reset" value="Ponisti">
            </div>
        </form>
    </div>
    <div style="overflow:auto;max-height:500px;float:left;width:300px;">
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
    <div>
        <input type=button onClick="parent.location='partneri.php'" value='parent button'>
        <input type=button onClick="location.href='partneri.php'" value='href button'>
        <input type="button" value="PopUp" onclick="popUp('partneri.php');" />
        <input type="button" value="Redirect" onclick="Partneri('partneri.php')" />
        <br/>
        <form action="partneri.php">
            <input type="submit" value="Partneri">
        </form>
        <br/>
        <input type=button onClick="parent.location='home.php'" value='Home page'>
    </div>
</body>
</html>