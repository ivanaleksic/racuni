<?php
// Konekcija sa bazom
include('mysqli_connect.php');
// Escape variables for security
$dat_izm = date("Y-m-d H:i:s");
$partner_id = mysqli_real_escape_string($con, $_POST['partner_id']);
$racun_no = mysqli_real_escape_string($con, $_POST['racun_no']);
$status = mysqli_real_escape_string($con, $_POST['status']);
$dat_zad = mysqli_real_escape_string($con, $_POST['dat_zad']);
$dat_val = mysqli_real_escape_string($con, $_POST['dat_val']);
$iznos_zad = mysqli_real_escape_string($con, $_POST['iznos_zad']);
$pop_tip = mysqli_real_escape_string($con, $_POST['pop_tip']);
$pop_izn = mysqli_real_escape_string($con, $_POST['pop_izn']);
$pop_din = mysqli_real_escape_string($con, $_POST['pop_din']);
$tr_no_1 = mysqli_real_escape_string($con, $_POST['tr_no_1']);
$tr_no_2 = mysqli_real_escape_string($con, $_POST['tr_no_2']);
$tr_no_3 = mysqli_real_escape_string($con, $_POST['tr_no_3']);
$tr_no = $tr_no_1."-".$tr_no_2."-".$tr_no_3;
$mod_no = mysqli_real_escape_string($con, $_POST['mod_no']);
$poz_no = mysqli_real_escape_string($con, $_POST['poz_no']);

$dat_zad = date("Y-m-d", strtotime($dat_zad));
$dat_val = date("Y-m-d", strtotime($dat_val));

// Upis u zaduzenja
$sqli="INSERT INTO zaduzenja (dat_izm, partner_id, racun_no, status, dat_zad, dat_val, iznos_zad, pop_tip, pop_izn, pop_din, tr_no, mod_no, poz_no)
          VALUES ('$dat_izm', '$partner_id', '$racun_no', '$status', '$dat_zad', '$dat_val', '$iznos_zad', '$pop_tip', '$pop_izn', '$pop_din',	'$tr_no', '$mod_no', '$poz_no')";
// Greska
if (!mysqli_query($con,$sqli)) {
    die('Error: ' . mysqli_error($con));
}
// Izlaz
mysqli_close($con);
$_SESSION['time'] = time();
header('Location: /racuni/main.php?page=racuni');
exit();
?>
