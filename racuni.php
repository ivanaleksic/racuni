<!DOCTYPE html>
<html lang="sr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

    <link rel="stylesheet" href="resources/bootstrap.min.css">
    <link rel="stylesheet" href="resources/bootstrap-theme.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

    <link rel="stylesheet" href="resources/racuni.css" type="text/css">

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

        function submit_oba() {
            document.forms.unos_zad.submit();
            setTimeout(function(){document.forms.unos_upl.submit()},1000);
        }

        function clear_oba() {
            document.forms["unos_zad"].reset();
            document.forms["unos_upl"].reset();
        }
    </script>
</head>

<?php
/*function moja_funkcija($parm)
{
    return 'Moja funkcija koja se zove '.$parm;
}
*/?><!--
$jj=moja_funkcija('idemo kuci');
echo $jj;-->

<body>
    <div style="overflow:auto;height:430px;">
        <form name="unos_zad" action="includes/insert_zad.php" method="post">
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
                            $select= '<select id="partner_id" name="partner_id" class="select_big" autofocus="1" style="width:100%;display: inline-block;font-size:12px;margin-left:0px;">';
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
                        <input type="text" name="racun_no" class="input" style="width:80px;margin-left:0px;">
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
                            $select= '<select name="status" class="select_big" style="width:100%;display: inline-block;font-size:12px;margin-left:0px;">';
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
                    <input type="text" name="dat_zad" class="input_big datepicker" autocomplete="off" style="width:80px;margin-left:0px;">
                    <label class="label_s">god.</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label_wide">Datum valute: </label>
                    </td>
                    <td colspan="3" style="width:40px;text-align: left">
                    <input type="text" name="dat_val" class="input_big datepicker" autocomplete="off" style="width:80px;margin-left:0px;">
                    <label class="label_s">god.</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label_wide">Iznos zaduženja: </label>
                    </td>
                    <td colspan="3" style="width:40px;text-align: left">
                    <input type="text" name="iznos_zad" class="input" style="width:80px;margin-left:0px;text-align:right;">
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
                            $select= '<select name="pop_tip" class="select_big" style="width:100%;display: inline-block;font-size:12px;margin-left:0px;">';
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
                    <input type="text" name="pop_izn" class="input" style="width:80px;margin-left:0px;text-align:right;">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label_wide">Iznos popusta: </label>
                    </td>
                    <td colspan="3" style="width:40px;">
                    <input type="text" name="pop_din" class="input" style="width:80px;margin-left:0px;text-align:right;">
                    <label class="label_s">dinara</label>

                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label_wide">Broj tekućeg računa: </label>
                    </td>
                    <td style="width:35px;text-align: left">
                        <input type="text" name="tr_no_1" class="input" maxlength="3" onKeyup="autotab(this, document.unos_zaduzenja.poz_no)" size="2" style="width:100%;margin-left:0px;">
                    </td>
                    <td style="width:106px;text-align: left">
                        <input type="text" name="tr_no_2" class="input" onKeyup="autotab(this, document.unos_zaduzenja.poz_no)" size="2" style="width:100%;margin-left:0px;">
                    </td>
                    <td style="width:35px;text-align: right">
                        <input type="text" name="tr_no_3" class="input"  maxlength="2" style="width:100%;margin-left:0px;">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label_wide">Model i poziv na broj: </label>
                    </td>
                    <td style="width:35px;text-align: left">
                        <input type="text" name="mod_no" class="input" maxlength="2" onKeyup="autotab(this, document.unos_zaduzenja.poz_no)" size="2" style="width:100%;margin-left:0px;">
                    </td>
                    <td colspan="2" style="text-align: right">
                        <input type="text" name="poz_no" class="input" style="width:100%;margin-left:0px;">
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
        <form name="unos_upl" action="includes/insert_upl.php" method="post">
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
                            $select= '<select id="partner_id1" name="partner_id" class="select_big" autofocus="1" style="width:100%;display: inline-block;font-size:12px;margin-left:0px;">';
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
                    <input type="text" name="racun_no" class="input" style="width:80px;margin-left:0px;">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label_wide">Datum uplate: </label>
                    </td>
                    <td colspan="3" style="width:40px;text-align: left">
                    <input type="text" name="dat_upl" class="input_big datepicker" autocomplete="off" style="width:80px;margin-left:0px;">
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
                    <input type="text" name="iznos_upl" class="input" style="width:80px;margin-left:0px;text-align:right;">
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
        <input type="button" class="btn btn-xs btn-success" value="Sačuvaj sve" onClick="submit_oba()"> <input type="button" class="btn btn-xs btn-danger" value="Poništi sve" onClick="clear_oba()">
    <!--
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