<?php
/**
 * Zapamcene vrednosti formulara
 *
 */
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
                $(".datepicker").datepicker({
                    dateFormat: "dd.mm.yy."/*"yy-mm-dd"*/,
                    changeMonth: true,
                    changeYear: true,
                    yearRange: '-15:+15' }).val()
            });

            function round(box) {
                /*Fiksiranje na dve decimale*/
                var x = document.getElementById(box.id).value;
                if(x != "") {
                    var round_x = Number(x).toFixed(2);
                    document.getElementById(box.id).value = round_x;
                } else {
                    document.getElementById(box.id).value = "";
                }
            }

            document.ready=function() {
                /**
                 * Popunjavanje formulara sacuvanim vrednostima
                 * bre sumbita
                 */
                $("#id_partner_upl").val(<?php echo $partner_upl; ?>);
                $("#id_racun_upl").val("<?php echo $racun_upl; ?>");
                $("#id_dat_upl").val("<?php echo $dat_upl; ?>");
                $("#id_iznos_upl").val("<?php echo $iznos_upl; ?>");
                /**
                 * Disabled --- izaberi --- opcija u dropdown-u
                 * Disabled Submit form button bez izbora dropdown-a
                 */
                document.getElementById("id_partner_upl").options[0].disabled=true;
                document.getElementById("id_submit").disabled=true;
            }

            document.onchange=function() {
                /**
                 * Ako su popunjena sva obavezna polja
                 * Submit form button enabled
                 */
                var a = document.getElementById("id_partner_upl").value;
                var b = document.getElementById("id_racun_upl").value;
                var c = document.getElementById("id_dat_upl").value;
                var d = document.getElementById("id_iznos_upl").value;

                if(a != "0" && b != "" && c != "" && d != "") {
                    document.getElementById("id_submit").disabled=false;
                } else {
                    document.getElementById("id_submit").disabled=true;
                }
            }

        </script>
    </head>
    <body>
        <div style="overflow:auto;height:430px;">
            <form name="unos_upl" action="includes/insert-payment.php" method="post">
                <table id="unos_zaduzenja" style="width:340px;" cellpadding="0" cellspacing="0">
                    <th colspan="4" style="margin:0;padding:11px 0px 10px 0px;text-align:center;vertical-align: middle">
                        <b>UNOS NOVE UPLATE</b>
                    </th>
                    <tr>
                        <td>
                            <label class="label_wide">Partner <span style="color: red";>*</span></label>
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
                            <label class="label_wide">Broj računa <span style="color: red";>*</span></label>
                        </td>
                        <td colspan="3" style="width:40px;text-align: left">
                            <input type="text" id="id_racun_upl" name="racun_upl" class="input" style="width:80px;margin-left:0px;text-align:center">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="label_wide">Datum uplate <span style="color: red";>*</span></label>
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
                            <label class="label_wide">Iznos za uplatu</label>
                            </td>
                            <td colspan="3" style="width:40px;">
                                <input type="text" name="izn_za_upl" disabled="disabled" class="input" style="width:80px;margin-left:0px;text-align:right;border: none;" value="">
                                <label class="label_s">din.</label>
                            </td>
                            <?php

                            ?>
                    </tr>
                    <tr>
                        <td>
                            <label class="label_wide">Iznos uplate <span style="color: red";>*</span></label>
                        </td>
                        <td colspan="3" style="width:40px;text-align: left">
                            <input type="text" id="id_iznos_upl" name="iznos_upl" onblur="round(this)" class="input" style="width:80px;margin-left:0px;text-align:right;">
                            <label class="label_s">din.</label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align: center">
                            <br/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align: center">
                            <input type="submit" id="id_submit" class="btn btn-xs btn-success" value="Sačuvaj"> <input type="reset" class="btn btn-xs btn-danger" value="Poništi">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div style="text-align: left">
            <p>Polja označena sa <span style="color:red; font-weight: bold;">*</span> su obavezna.</p>
            <?php
            echo 'Partner ID: ' . $partner_upl .' racun: '. $racun_upl .' dat upl: '. $dat_upl .' iznos: '. $iznos_upl;
            ?>
        </div>
    </body>
</html>

<?php
/**
 * Brisanje session unos_upl form podataka
 *
 */
    $_SESSION['partner_upl'] = "0";
    $_SESSION['racun_upl'] = "";
    $_SESSION['dat_upl'] = "";
    $_SESSION['iznos_upl'] =  "";
?>