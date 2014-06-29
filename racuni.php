<!--Zapamcene vrednosti formulara-->
<?php
/*unos_zad*/
$partner_zad = $_SESSION['partner_zad'];
$racun_zad = $_SESSION['racun_zad'];
$status = $_SESSION['status'];
$dat_zad = $_SESSION['dat_zad'];
$dat_val = $_SESSION['dat_val'];
$iznos_zad = $_SESSION['iznos_zad'];
$pop_tip = $_SESSION['pop_tip'];
$pop_izn = $_SESSION['pop_izn'];
$pop_din = $_SESSION['pop_din'];
$tr_no1 = $_SESSION['tr_no1'];
$tr_no2 = $_SESSION['tr_no2'];
$tr_no3 = $_SESSION['tr_no3'];
$mod_no = $_SESSION['mod_no'];
$poz_no = $_SESSION['poz_no'];
/*unos_upl*/
$partner_upl = $_SESSION['partner_upl'];
$racun_upl = $_SESSION['racun_upl'];
$dat_upl = $_SESSION['dat_upl'];
$iznos_upl = $_SESSION['iznos_upl'];
?>
<!DOCTYPE html>
<html lang="sr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="resources/bootstrap.min.css">
    <link rel="stylesheet" href="resources/bootstrap-theme.min.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="resources/racuni.css" type="text/css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">

    <script type="text/javascript">

        $(function() {
            $(".datepicker").datepicker({ dateFormat: "dd.mm.yy."/*"yy-mm-dd"*/, changeMonth: true, changeYear: true, yearRange: '-15:+15' }).val()
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

        function round(box) {
            var x = document.getElementById(box.id).value;
            var round_x = Number(x).toFixed(2);
            document.getElementById(box.id).value = round_x;
        }
        function submit_oba() {
            document.forms.unos_zad.submit();
            setTimeout(function(){document.forms.unos_upl.submit()},1000);
        }

        function clear_oba() {
            document.forms["unos_zad"].reset();
            document.forms["unos_upl"].reset();
        }

        $(document).ready(function() {
            /*
            * Popunjavanje formulara unos_zad
            */
            $("#id_partner_zad").val(<?php echo $partner_zad; ?>);
            $("#id_racun_zad").val("<?php echo $racun_zad; ?>");
            $("#id_status").val(<?php echo $status; ?>);
            $("#id_dat_zad").val("<?php echo $dat_zad; ?>");
            $("#id_dat_val").val("<?php echo $dat_val; ?>");
            $("#id_iznos_zad").val("<?php echo $iznos_zad; ?>");
            $("#id_pop_tip").val(<?php echo $pop_tip; ?>);
            $("#id_pop_izn").val("<?php echo $pop_izn; ?>");
            $("#id_pop_din").val("<?php echo $pop_din; ?>");
            $("#id_tr_no1").val("<?php echo $tr_no1; ?>");
            $("#id_tr_no2").val("<?php echo $tr_no2; ?>");
            $("#id_tr_no3").val("<?php echo $tr_no3; ?>");
            $("#id_mod_no").val("<?php echo $mod_no; ?>");
            $("#id_poz_no").val("<?php echo $poz_no; ?>");
            /*
            * Popunjavanje formulara unos_upl
            */
            $("#id_partner_upl").val(<?php echo $partner_upl; ?>);
            $("#id_racun_upl").val("<?php echo $racun_upl; ?>");
            $("#id_dat_upl").val("<?php echo $dat_upl; ?>");
            $("#id_iznos_upl").val("<?php echo $iznos_upl; ?>");
        });

    </script>
</head>

<?php
/*$racun_no_upl = $_SESSION['racun_no'];
$dat_upl = $_SESSION['dat_upl'];
$iznos_upl = $_SESSION['iznos_upl'];
    <script type="text/javascript">
    function upis_u_form_upis($racun_no_upl,$dat_upl,$iznos_upl) {
        document.getElementsByName('dat_upl').value = $iznos_upl;

    }
function moja_funkcija($parm)
{
    return 'Moja funkcija koja se zove '.$parm;
}
*/?>

<!--$jj=moja_funkcija('idemo kuci');
echo $jj;-->

<body>
    <div style="overflow:auto;height:440px;">
        <form name="unos_zad" action="includes/insert-bill.php" method="post">
            <table id="unos_zaduzenja" style="width:340px;float:left;margin-right:12px;" cellpadding="0" cellspacing="0">
                <th colspan="4" style="margin:0;padding:2px;text-align:center">
                    <h5><b>Podaci o zaduženju</b></h5>
                </th>
                <tr>
                    <td>
                        <label class="label_wide">Partner: </label>
                    </td>
                    <td colspan="3" style="width:140px;">
                        <?php
                        include('includes/mysql_connect.php');
                        //query
                        $sql=mysql_query("SELECT id, naziv FROM partneri");

                        if(mysql_num_rows($sql)) {
                            $select= '<select id="id_partner_zad" name="partner_zad" class="select_big" autofocus="1" style="width:100%;display: inline-block;font-size:12px;margin-left:0px;">';
                            while( $rs=mysql_fetch_array($sql)) {
                                $select.='<option value='.$rs['id'].'>'.$rs['naziv'].'</option>';
                            }
                        }
                        $select.='</select>';
                        echo $select;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label_wide">Broj računa: </label>
                    </td>
                    <td colspan="3" style="width:40px;text-align: left">
                        <input type="text" id="id_racun_zad" name="racun_zad" class="input" style="width:80px;margin-left:0px;text-align:center;">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label_wide">Status: </label>
                    </td>
                    <td colspan="3" style="width:140px;">
                        <?php
                        include('includes/mysql_connect.php');
                        //query
                        $sql=mysql_query("SELECT id, status FROM statusi");
                        if(mysql_num_rows($sql)) {
                            $select= '<select id="id_status" name="status" class="select_big" style="width:100%;display: inline-block;font-size:12px;margin-left:0px;">';
                            while($rs=mysql_fetch_array($sql)) {
                                $select.='<option value='.$rs['id'].'>'.$rs['status'].'</option>';
                            }
                        }
                        $select.='</select>';
                        echo $select;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label_wide">Datum zaduženja: </label>
                    </td>
                    <td colspan="3" style="width:40px;text-align: left">
                    <input type="text" id="id_dat_zad" name="dat_zad" class="input_big datepicker" autocomplete="off" style="width:80px;margin-left:0px;">
                    <label class="label_s">god.</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label_wide">Datum valute: </label>
                    </td>
                    <td colspan="3" style="width:40px;text-align: left">
                    <input type="text"  id="id_dat_val" name="dat_val" class="input_big datepicker" autocomplete="off" style="width:80px;margin-left:0px;">
                    <label class="label_s">god.</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label_wide">Iznos zaduženja: </label>
                    </td>
                    <td colspan="3" style="width:40px;text-align: left">
                    <input type="text" id="id_iznos_zad" name="iznos_zad" class="input"  onblur="round(this)" style="width:80px;margin-left:0px;text-align:right;">
                    <label class="label_s">dinara</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label_wide">Tip popusta: </label>
                    </td>
                    <td colspan="3" style="width:140px;">
                        <?php
                        include('includes/mysql_connect.php');
                        //query
                        $sql=mysql_query("SELECT id, pop_tip FROM popusti");
                        if(mysql_num_rows($sql)) {
                            $select= '<select id="id_pop_tip" name="pop_tip" class="select_big" style="width:100%;display: inline-block;font-size:12px;margin-left:0px;">';
                            while($rs=mysql_fetch_array($sql)) {
                                $select.='<option value='.$rs['id'].'>'.$rs['pop_tip'].'</option>';
                            }
                        }
                        $select.='</select>';
                        echo $select;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label_wide">Popust: </label>
                    </td>
                    <td colspan="3" style="width:40px;">
                    <input type="text" id="id_pop_izn" name="pop_izn" class="input" style="width:80px;margin-left:0px;text-align:right;">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label_wide">Iznos popusta: </label>
                    </td>
                    <td colspan="3" style="width:40px;">
                    <input type="text" id="id_pop_din" name="pop_din"1 onblur="round(this)" class="input" style="width:80px;margin-left:0px;text-align:right;">
                    <label class="label_s">dinara</label>

                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label_wide">Broj tekućeg računa: </label>
                    </td>
                    <td style="width:35px;text-align: left">
                        <input type="text" id="id_tr_no1" name="tr_no1" class="input" maxlength="3" onKeyup="autotab(this, document.unos_zaduzenja.poz_no)" size="2" style="width:100%;margin-left:0px;text-align:center;">
                    </td>
                    <td style="width:106px;text-align: left">
                        <input type="text" id="id_tr_no2" name="tr_no2" class="input" onKeyup="autotab(this, document.unos_zad.poz_no)" size="2" style="width:100%;margin-left:0px;text-align:center;">
                    </td>
                    <td style="width:35px;text-align: right">
                        <input type="text" id="id_tr_no3" name="tr_no3" class="input"  maxlength="2" style="width:100%;margin-left:0px;text-align:center;">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label_wide">Model i poziv na broj: </label>
                    </td>
                    <td style="width:35px;text-align: left">
                        <input type="text" id="id_mod_no" name="mod_no" class="input" maxlength="2" onKeyup="autotab(this, document.unos_zaduzenja.poz_no)" size="2" style="width:100%;margin-left:0px;text-align:center;">
                    </td>
                    <td colspan="2" style="text-align: right">
                        <input type="text" id="id_poz_no" name="poz_no" class="input" style="width:100%;margin-left:0px;text-align:center;">
                    </td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align: center">
                        <br/>
                    </td>
                </tr>
                    <tr>
                        <td colspan="4" style="text-align: center">
                            <input type="submit" class="btn btn-xs btn-success" value="Sačuvaj"> <input type="reset" class="btn btn-xs btn-danger" value="Poništi">
                        </td>
                </tr>
            </table>
        </form>
        <!--Unos zaduzenja-->
        <form name="unos_upl" action="includes/insert-payment.php" method="post">
            <table id="unos_zaduzenja" style="width:340px;" cellpadding="0" cellspacing="0">
                <th colspan="4" style="margin:0;padding:2px;text-align:center">
                        <h5><b>Podaci o uplati</b></h5>
                </th>
                <tr>
                    <td>
                        <label class="label_wide">Partner: </label>
                    </td>
                    <td colspan="3" style="width:140px;">
                        <?php
                        include('includes/mysql_connect.php');
                        //query
                        $sql=mysql_query("SELECT id, naziv FROM partneri");

                        if(mysql_num_rows($sql)) {
                            $select= '<select id="id_partner_upl" name="partner_upl" class="select_big" autofocus="1" style="width:100%;display: inline-block;font-size:12px;margin-left:0px;">';
                            while( $rs=mysql_fetch_array($sql)) {
                                $select.='<option value='.$rs['id'].'>'.$rs['naziv'].'</option>';
                            }
                        }
                        $select.='</select>';
                        echo $select;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label_wide">Broj računa: </label>
                    </td>
                    <td colspan="3" style="width:40px;text-align: left">
                    <input type="text" id="id_racun_upl" name="racun_upl" class="input" style="width:80px;margin-left:0px;">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label_wide">Datum uplate: </label>
                    </td>
                    <td colspan="3" style="width:40px;text-align: left">
                    <input type="text" id="id_dat_upl" name="dat_upl" class="input_big datepicker" autocomplete="off" style="width:80px;margin-left:0px;">
                    <label class="label_s">god.</label>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" style="width:40px;">
                        <?php

                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                        /*<label class="label_wide">Iznos za uplatu: </label>
                        </td>
                        <td colspan="3" style="width:40px;">
                            <input type="text" name="izn_za_upl" class="input" style="width:80px;margin-left:0px;text-align:right;border: none;">
                            <!--<label class="label_s">dinara</label>-->
                        </td>*/
                        ?>
                </tr>
                <tr>
                    <td>
                        <label class="label_wide">Iznos uplate: </label>
                    </td>
                    <td colspan="3" style="width:40px;text-align: left">
                    <input type="text" id="id_iznos_upl" name="iznos_upl" onblur="round(this)" class="input" style="width:80px;margin-left:0px;text-align:right;">
                    <label class="label_s">dinara</label>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align: center">
                        <br/>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align: center">
                        <input type="submit" class="btn btn-xs btn-success" value="Sačuvaj"> <input type="reset" class="btn btn-xs btn-danger" value="Poništi">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div style="text-align: center">
        <?php
        echo 'Partner ID: ' . $partner_zad .' racun: '. $racun_zad .' status ID: '. $status .' dat zad: '. $dat_zad .' dat val: '.
            $dat_val .' iznos: '. $iznos_zad .' pop ID: '. $pop_tip .' pop izn: '. $pop_izn .' pop din: '. $pop_din .' tr br: '.
            $tr_no1 .'-'. $tr_no2 .'-'. $tr_no3 .' mod i poz na br:'. $mod_no .' '. $poz_no;
        ?>
        <br />
        <?php
        echo 'Partner ID: ' . $partner_upl .' racun: '. $racun_upl .' dat upl: '. $dat_upl .' iznos: '. $iznos_upl;
        ?>
    <!--
        <input type="button" class="btn btn-xs btn-success" value="Sačuvaj sve" onClick="submit_oba()"> <input type="button" class="btn btn-xs btn-danger" value="Poništi sve" onClick="clear_oba()">

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
    -->
    </div>
</body>
</html>

<?php
// Brisanje session unos_zad form podataka
$_SESSION['partner_zad'] = "1";
$_SESSION['racun_zad'] = "";
$_SESSION['status'] = "1";
$_SESSION['dat_zad'] = "";
$_SESSION['dat_val'] = "";
$_SESSION['iznos_zad'] = "";
$_SESSION['pop_tip'] = "1";
$_SESSION['pop_izn'] = "";
$_SESSION['pop_din'] = "";
$_SESSION['tr_no1'] = "";
$_SESSION['tr_no2'] = "";
$_SESSION['tr_no3'] = "";
$_SESSION['mod_no'] = "";
$_SESSION['poz_no'] = "";
// Brisanje session unos_upl form podataka
$_SESSION['partner_upl'] = "1";
$_SESSION['racun_upl'] = "";
$_SESSION['dat_upl'] = "";
$_SESSION['iznos_upl'] =  "";
?>