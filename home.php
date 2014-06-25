<?php
session_start();
include('timeout.php');
if(is_timeout()){
    session_destroy();
    header("location:login.php");
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
//Main funciton for the Page layout
function layout($page_id)
{
    switch($page_id) {
        default: //Default, ie when the page_id does not match with predefined cases
            echo '<h2>Welcome to the home page</h2>';
            echo '<p>This is the home page...</p>';
        case '': //When it is null
            echo '<h2>Welcome to the home page</h2>';
            echo '<p>This is the home page...</p>';
            break;
        case 'zaduzenja':
            include('zaduzenja.php');
            break;
        case 'uplate':
            include('uplate.php');
            break;
        case 'partneri':
            include('partneri.php');
    }
}
?>

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

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
<div id="container" style="position:relative;width:1000px;text-align:center;margin:0 auto;overflow:hidden;margin:0px auto;">
    <div id="header" style="background-color:#D8D8D8;line-height:40px;">
        <h2 style="margin-bottom:0;">Title</h2>
    </div>
    <div id="menu" style="background-color:#E8E8E8;height:520px;width:200px;float:left;text-align:left;padding:12px 12px;">
        <ul type="none">
            <li>
                <?php
                include 'db_connect.php';
                $sql=mysql_query("SELECT id, naziv FROM partneri");

                if(mysql_num_rows($sql)) {
                    $select= '<select id="partner_id" name="partner_id" class="dropdown">';
                    while( $rs=mysql_fetch_array($sql)) {
                        $select.='<option value='.$rs['id'].'>'.$rs['naziv'].'</option>';
                    }
                }
                $select.='</select>';
                echo $select;
                ?>
                <br>
            </li>
            <li>
                <a href="home.php?page=zaduzenja" class="btn btn-xs">Zaduženja</a><br /><a href="home.php?page=uplate" class="btn btn-xs">Uplate</a><br /><a href="home.php?page=partneri" class="btn btn-xs">Partneri</a>
            </li>
        </ul>
    </div>

    <div id="content" style="background-color:#FFFFFF;height:520px;width:650px;float:left;padding:12px 12px;">
        <?php
        if(isset($_GET['page']))
        {
        $page_id = $_GET['page']; //Get the request URL
        layout($page_id); //Call the function with the argument
        }
        ?>
    </div>

    <div id="footer" style="background-color:#D8D8D8;clear:both;text-align:center;vertical-align:middle;line-height:40px;">
        <a href="#" class="btn btn-xs btn-success">Copyright © Ivan Aleksić</a>
    </div>

</div>
-->
</div>





</body>
</html>

