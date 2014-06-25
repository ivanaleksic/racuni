<?php
include 'db_connect.php';
$sql = mysql_query("select uplate.*,partneri.naziv from
                    uplate inner join partneri on uplate.partner_id = partneri.id
                    order by uplate.id");
echo "<table id='tabela'>";
echo "<tr >
    <th style='width:60px;text-align: center;'>Račun No.</th>
    <th style='width:110px;text-align: center;'>Korisnik</th>
    <th style='width:65px;text-align: center;'>Datum uplate</th>
    <th style='width:50px;text-align: center;'>Iznos uplate</th>
    </td>";
if(mysql_num_rows($sql)) {
    while($row = mysql_fetch_assoc($sql)) {
        $racun_no = $row['racun_no'];
        $naziv = $row['naziv'];
        $dat_upl = $row['dat_upl'];
        $iznos_upl = $row['iznos_upl'];
        echo "<tr>
        <td>".$racun_no."</td>
        <td>".$naziv."</td>
        <td>".$dat_upl."</td>
        <td style='text-align:right;'>".$iznos_upl."</td>
        </tr>";
    }
}
echo "</table>";
?>