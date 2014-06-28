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
/****************************************
 *Different page through Same PHP script using URL Variables by GET method
 *@author: Swashata Ghosh
 *@email: swashata4u@gmail.com
 *@copyright: inTechgrity.com
 *@license: Use wherever you want however you can.
 *****************************************/
function layout($page_id)
{
    switch($page_id) {
        default: //Default, kada page_id nije ispravan
            echo '<h3>Welcome to the home page</h3>';
            echo '<p>This is the home page...</p>';
        case '': //Kada je prazno
            echo '<h3>Under construction...</h3>';
            echo '<p></p>';
            break;
        case 'zaduzenja':
            include('includes/zaduzenja.php');
            break;
        case 'uplate':
            include('includes/uplate.php');
            break;
        case 'racuni':
            include('racuni.php');
            break;
        case 'partneri':
            include('includes/partneri.php');
    }
}
?>

<!DOCTYPE html>
<html lang="sr" xmlns="http://www.w3.org/1999/html">
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
            $( ".datepicker" ).datepicker({ dateFormat: "dd.mm.yy."/*"yy-mm-dd"*/, changeMonth: true, changeYear: true, yearRange:'-15:+15' }).val()
        })
        $(window).resize(function(){
            var height="";
            height=$(window).height() - 150;
            $("#content").css('height',height);
            $("#content").css('max-height',height);
            $("#sidebar").css('height',height);
        });
        $(window).load(function(){
            var height="";
            height=$(window).height() - 150;
            $("#content").css('height',height);
            $("#content").css('max-height',height);
            $("#sidebar").css('height',height);
        });
    </script>
</head>

<body>
<div id="container" style="position:relative;width:1100px;margin: 20px auto 0;overflow:hidden;">
    <div id="header" style="background-color:#D8D8D8;line-height:12px;margin:0 auto;padding:6px 12px;text-align: center;">
        <?php
        include('includes/mysql_connect.php');
        $sql=mysql_query("SELECT id, naziv FROM partneri");

        if(mysql_num_rows($sql)) {
            $select= '<select id="partner_id" name="partner_id" class="dropdown" style="height:20px;">';
            while( $rs=mysql_fetch_array($sql)) {
                $select.='<option value='.$rs['id'].'>'.$rs['naziv'].'</option>';
            }
        }
        $select.='</select>';
        echo $select;
        ?>
    </div>

<!--    <div id="header" style="background-color:#FFFFFF;line-height:20px;margin:0 auto;padding:6px 12px;border:1px solid #D8D8D8;">

    </div>-->

    <div id="sidebar" style="background-color:#D8D8D8;overflow:auto;width:150px;float:left;text-align:left;padding:12px 12px;border-left:1px solid #D8D8D8;">
        <a href="main.php" class="btn btn-xs btn-default">Go to Home page</a><br />
        <br />
        <a href="main.php?page=zaduzenja" class="btn btn-xs">Zaduženja</a><br />
        <a href="main.php?page=" class="btn btn-xs">Novo zaduženje</a><br />
        <a href="main.php?page=uplate" class="btn btn-xs">Uplate</a><br />
        <a href="main.php?page=" class="btn btn-xs">Nova uplata</a><br />
        <a href="main.php?page=partneri" class="btn btn-xs">Partneri</a><br />
        <a href="main.php?page=racuni" class="btn btn-xs">Računi</a><br />
    </div>

    <div id="content" style="background-color:#FFFFFF;overflow:auto;width:950px;padding:12px 12px;border-right:1px solid #D8D8D8;">
        <?php
        if(isset($_GET['page']))
        {
            $page_id = $_GET['page']; //Get the request URL
            layout($page_id); //Call the function with the argument
        }
        ?>
    </div>

    <div id="footer" style="background-color:#D8D8D8;clear:both;text-align:center;vertical-align:middle;line-height:40px;">
        <a href="main.php" class="btn btn-xs btn-info">Copyright © Ivan Aleksić</a>
    </div>
</div>
</div>

</body>
</html>