<?php
session_start();
include('timeout.php');
if(is_timeout()){
    session_destroy();
    header("location:login.php");
} else {
    $_SESSION['time'] = time();
}
?>

<?php

function layout($page_id) {
    switch($page_id) {
        default: //Default, kada page_id nije ispravan
            echo '<h3>Welcome to the home page</h3>';
            echo '<p>This is the home page...</p>';
        case '': //Kada je prazno
            echo '<h3>Under construction...</h3>';
            echo '<p></p>';
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
        case 'racuni':
            include('racuni.php');
            break;
        case 'partners':
            include('includes/partners.php');
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
                    $("#sidebar_1").slideToggle();
                });
            });

        </script>
    </head>
    <body>
        <div id="container" style="position:relative;width:1100px;margin: 20px auto 0;overflow:hidden;">
            <div id="header" style="background-color:#D8D8D8;line-height:12px;margin:0 auto;padding:6px 12px;text-align: left;">
                <button id="id_search_btn" class="btn btn-xs btn-default">Pretraga</button>
            </div>
            <div id="sidebar" style="background-color:#FFFFFF;overflow:auto;width:150px;float:left;text-align:left;padding:12px 12px; border-left:1px solid #D8D8D8;">
                <a href="main.php" class="btn btn-xs btn-default">Go to Home page</a><br />
                <br />
                <a href="main.php?page=bills" class="btn btn-xs">Zaduženja</a><br />
                <a href="main.php?page=new-bill" class="btn btn-xs">Novo zaduženje</a><br />
                <a href="main.php?page=payments" class="btn btn-xs">Uplate</a><br />
                <a href="main.php?page=new-payment" class="btn btn-xs">Nova uplata</a><br />
                <a href="main.php?page=partners" class="btn btn-xs">Partneri</a><br />
                <a href="main.php?page=racuni" class="btn btn-xs">Računi</a><br />
            </div>

            <div id="search" style="background-color:#D8D8D8;overflow:auto;width:950px;padding:12px 12px;border-left:1px solid #D8D8D8;border-right:1px solid #D8D8D8;display: none;">
                <?php
                include('includes/mysql_connect.php');
                //query
                $sql=mysql_query("SELECT id, naziv FROM partneri");

                if(mysql_num_rows($sql)) {
                    $select= '<select id="id_partner_search" name="partner_search" onclick="is_selected(this);" class="select_big" autofocus="1" style="width:150px; height: 22px; font-size:12px;">';
                    while( $rs=mysql_fetch_array($sql)) {
                        $select.='<option value='.$rs['id'].'>'.$rs['naziv'].'</option>';
                    }
                }
                $select.='</select>';
                echo $select;
                ?>
                <?php
                include('includes/mysql_connect.php');
                $sql=mysql_query("SELECT id, status FROM statusi");
                //query
                if(mysql_num_rows($sql)) {
                    $select= '<select id="id_status_search" name="status_search" class="select_big" style="width:180px; height: 22px; font-size:12px;">';
                    while( $rs=mysql_fetch_array($sql)) {
                        $select.='<option value='.$rs['id'].'>'.$rs['status'].'</option>';
                    }
                }
                $select.='</select>';
                echo $select;
                ?>
                <label>Od:</label>
                <input type="text"  id="id_dat_od" name="dat_od" class="input_big datepicker" autocomplete="off" style="width:80px;margin-left:0px;">
                <label>do:</label>
                <input type="text"  id="id_dat_do" name="dat_do" class="input_big datepicker" autocomplete="off" style="width:80px;margin-left:0px;">
                <label>god.</label>
                <button id="id_search_go" class="btn btn-xs btn-default">OK</button>
            </div>
            <div id="content" style="background-color:#FFFFFF;overflow:auto;width:950px;padding:12px 12px;border-left:1px solid #D8D8D8;border-right:1px solid #D8D8D8;">

                <?php
                if(isset($_GET['page']))
                {
                    $page_id = $_GET['page']; //Get the request URL
                    layout($page_id); //Call the function with the argument
                }
                ?>
            </div>
            <div id="footer" style="background-color:#D8D8D8;clear:both;text-align:center;vertical-align:middle;line-height:40px;">
                <a href="main.php" class="btn btn-xs btn-info">Copyright © Ivan Aleksić 2014.</a>
            </div>
        </div>
    </body>
</html>