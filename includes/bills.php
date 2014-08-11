<?php
include('mysql_connect.php');
$sql = mysql_query("select zaduzenja.*,partneri.naziv, statusi.status, popusti.pop_tip from
                    zaduzenja inner join partneri on zaduzenja.partner_id = partneri.id
                    inner join statusi on zaduzenja.status = statusi.id
                    inner join popusti on zaduzenja.pop_tip = popusti.id
                    order by zaduzenja.dat_zad");
echo "<table id='tabela' class='odd_even_table'>";
echo "<tr >
    <th style='width:60px;text-align: center;'>Račun No.</th>
    <th style='width:120px;text-align: center;'>Korisnik</th>
    <th style='width:120px;text-align: center;'>Status</th>
    <th style='width:65px;text-align: center;'>Datum zaduženja</th>
    <th style='width:65px;text-align: center;'>Datum valute</th>
    <th style='width:50px;text-align: center;'>Iznos zaduženja</th>
    <th style='width:110px;text-align: center;'>Vrsta popusta</th>
    <th style='width:20px;text-align: center;'>Pop</th>
    <th style='width:50px;text-align: center;'>Iznos popusta</th>
    <th style='width:120px;text-align: center;'>Tekući račun</th>
    <th style='width:150px;text-align: center;'>Model i poziv na broj</th>
    </td>";
if(mysql_num_rows($sql)) {
    while($row = mysql_fetch_assoc($sql)) {
        $racun_no = $row['racun_no'];
        $naziv = $row['naziv'];
        $status = $row['status'];
        $dat_zad = $row['dat_zad'];
        $dat_val = $row['dat_val'];
        $iznos_zad = $row['iznos_zad'];
        $pop_tip = $row['pop_tip'];
        $pop_izn = $row['pop_izn'];
        $pop_din = $row['pop_din'];
        $tr_no = $row['tr_no'];
        $mod_no = $row['mod_no'];
        $poz_no = $row['poz_no'];
    echo "<tr>
        <td>".$racun_no."</td>
        <td>".$naziv."</td>
        <td style='text-align:center;'>".$status."</td>
        <td>".$dat_zad."</td>
        <td>".$dat_val."</td>
        <td style='text-align:right;'>".$iznos_zad."</td>
        <td>".$pop_tip."</td>
        <td style='text-align:right;'>".$pop_izn."</td>
        <td style='text-align:right;'>".$pop_din."</td>
        <td>".$tr_no."</td>
        <td>".$mod_no." ".$poz_no."</td>
        </tr>";
    }
}
echo "</table>";
?>