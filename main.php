<?php
    session_start();
    include('timeout.php');
    if(is_timeout()){
        session_destroy();
        header("location:login.php");
    } else {
        $_SESSION['time'] = time();
    }

function layout($page_id) {
    switch($page_id) {
        default: //Default, kada page_id nije ispravan
            include('includes/error 404.html');
            break;
        case 'bills':
            include('includes/bills.php');
            break;
        case 'new-bill':
            include('new-bill.php');
            break;
        case 'payments':
            include('includes/payments.php');
            break;
        case 'new-payment':
            include('new-payment.php');
            break;
        case 'partners':
            include('includes/partners.php');
            break;
        case 'racuni':
            include('racuni.php');
            break;
        case 'main': //Main page
            echo '<h4>Table with latest bills will be inserted here...</h4>';
    }
}
?>

<!DOCTYPE html>
<html lang="sr" xmlns="http://www.w3.org/1999/html">
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
                $( ".datepicker" ).datepicker({ dateFormat: "dd.mm.yy."/*"yy-mm-dd"*/, changeMonth: true, changeYear: true, yearRange:'-15:+15' }).val()
            });

            $(window).click(function() {
                $
                <?php $_SESSION['time'] = time(); ?>
            });

            $(window).load(function() {
                var height="";
                height=$(window).height() - 150;
                $("#content").css('height',height);
                $("#content").css('max-height',height);
                $("#sidebar").css('height',height);
            });

            $(window).resize(function() {
                var height="";
                height=$(window).height() - 150;
                $("#content").css('height',height);
                $("#content").css('max-height',height);
                $("#sidebar").css('height',height);
            });

            $(document).ready(function() {
                $("#id_search_btn").click(function() {
                    $("#search").slideToggle();
                });
            });

            setInterval(function() { // Popup za 30 sec do isteka sesije
                var text = 'Sesija će isteći za manje od 30 sekundi.\nDa li želiš da je produžiš?';
                window.alert(text);
                location.href = '';
            }, 270000);

        /*  var confirmed = window.confirm(text);
                 if (confirmed) {
                 location.href = '';
                 } else {
                 location.href = 'logout.php';
             }

            setInterval(function(){
                window.location = 'logout.php';
            }, 300000);
        */

        </script>
    </head>
    <body>
        <div id="container" style="position:relative;width:1100px;margin: 20px auto 0;overflow:hidden;">
            <div id="header" style="background-color:#D8D8D8;line-height:12px;margin:0 auto;padding:6px 12px;text-align: left;">
                <button id="id_search_btn" class="btn btn-xs btn-default">Pretraga</button>
            </div>
            <div id="search" style="background-color:#D8D8D8;overflow:auto;padding:2px 12px;border-left:1px solid #D8D8D8;border-right:1px solid #D8D8D8;display: none;">
                <table style="margin-left:138px;">
                    <tr>
                        <td>
                            <?php
                            include('includes/mysql_connect.php');
                            //query
                            $sql=mysql_query("SELECT id, naziv FROM partneri");

                            if(mysql_num_rows($sql)) {
                                $select= '<select id="id_partner_search" name="partner_search" onclick="is_selected(this);" class="select_big" autofocus="1" style="width:150px; height: 22px; font-size:12px;">';
                                $select.='<option value="0" disabled selected style="display:none;">--- izaberi partnera ---</option>';
                                while( $rs=mysql_fetch_array($sql)) {
                                    $select.='<option value='.$rs['id'].'>'.$rs['naziv'].'</option>';
                                }
                            }
                            $select.='</select>';
                            echo $select;
                            ?>
                        </td>
                        <td>
                            <select id="id_status_search"  name="status_search" class="select_big" style="width:170px; height: 22px; font-size:12px;">';
                                <option value="0" disabled selected style="display:none;">--- izaberi status računa ---</option>';
                                <option value="1">Svi računi</option>';
                                <option style="font-size:3px;" disabled></option>';
                                <option value="2">Neplaćeni računi</option>';
                                <option value="3">Neplaćeni u valuti</option>';
                                <option value="4">Neplaćeni sa kašnjenjem</option>';
                                <option style="font-size:3px;" disabled> </option>';
                                <option value="5">Plaćeni računi</option>';
                                <option value="6">Plaćeni u valuti</option>';
                                <option value="7">Plaćeni sa kašnjenjem</option>';
                            </select>
                        </td>
                        <td valign="bottom">
                            <label>Od:</label>
                        </td>
                        <td>
                            <input type="text"  id="id_dat_od" name="dat_od" class="input_big datepicker" autocomplete="off" style="width:80px;margin-left:0px;">
                        </td>
                        <td valign="bottom">
                            <label>do:</label>
                        </td>
                        <td>
                            <input type="text"  id="id_dat_do" name="dat_do" class="input_big datepicker" autocomplete="off" style="width:80px;margin-left:0px;">
                        </td>
                        <td valign="bottom">
                            <label>god.</label>
                        </td>
                        <td>
                            <button id="id_search_go" class="btn btn-xs btn-default">OK</button>
                        </td>
                    </tr>
                </table>
            </div>
            <div id="sidebar" style="background-color:#FFFFFF;overflow:auto;width:150px;float:left;text-align:left;padding:12px 12px;border-left:1px solid #D8D8D8;">
                <a href="main.php" class="btn btn-xs btn-default">Home Page</a><br />
                <br />
                <a href="main.php?page=bills" class="btn btn-xs">Zaduženja</a><br />
                <a href="main.php?page=new-bill" class="btn btn-xs">Novo zaduženje</a><br />
                <a href="main.php?page=payments" class="btn btn-xs">Uplate</a><br />
                <a href="main.php?page=new-payment" class="btn btn-xs">Nova uplata</a><br />
                <a href="main.php?page=partners" class="btn btn-xs">Partneri</a><br />
                <a href="main.php?page=racuni" class="btn btn-xs">Računi</a><br />
                <br />
                <a href="logout.php" class="btn btn-xs btn-default">Log out</a>
            </div>
            <div id="content" style="background-color:#FFFFFF;overflow:auto;width:950px;padding:12px 12px;border-left:1px solid #D8D8D8;border-right:1px solid #D8D8D8;">

                <?php
                if(isset($_GET['page']))
                {
                    $page_id = $_GET['page']; //Get the request URL
                    layout($page_id); //Pozivanje funkcije sa argumentom
                } else {
                    layout("main"); //Main strana
                }
                ?>
            </div>
            <div id="footer" style="background-color:#D8D8D8;clear:both;text-align:center;vertical-align:middle;line-height:40px;">
                <a href="main.php" class="btn btn-xs btn-info">Ivan Aleksić © 2014</a>
            </div>
        </div>
    </body>
</html>