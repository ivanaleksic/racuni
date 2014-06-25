<?php
include 'db_connect.php';
$sql = mysql_query("select zaduzenja.*,partneri.naziv, statusi.status from zaduzenja inner join partneri on zaduzenja.partner_id = partneri.id inner join statusi on zaduzenja.status = statusi.id");
echo "<table id='tabela'>";
echo "<tr><th>Račun No.</th><th>Korisnik</th><th>Status</th></td>";
if(mysql_num_rows($sql)) {
    while($row = mysql_fetch_assoc($sql)) {
        $racun_no = $row['racun_no'];
        $naziv = $row['naziv'];
        $status = $row['status'];
        echo "<tr><td style='width:70px;'>".$racun_no."</td><td style='width:120px;'>".$naziv."</td><td style='width:100px;text-align:center;'>".$status."</td></tr>";
    }
}
echo "</table>";
?>