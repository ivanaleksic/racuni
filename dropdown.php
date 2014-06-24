<?php
    include 'db_connect.php';
    $sql=mysql_query("SELECT id, naziv FROM partneri");
    if(mysql_num_rows($sql)) {
        $select= '<select name="partner_id">';
        while($rs=mysql_fetch_array($sql)) {
              $select.='<option value='.$rs['id'].'>'.$rs['naziv'].'</option>';
        }
    }
    $select.='</select>';
    echo $select;
?>



