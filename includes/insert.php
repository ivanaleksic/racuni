<?php
session_start();
/*    $con=mysqli_connect("localhost","root","","racuni");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to Mysqli: " . mysqli_connect_error();
}*/
include('mysqli_connect.php');
// escape variables for security
//Upis u zaduzenja

$dat_izm = date("Y-m-d H:i:s");
/*    $dat_izm = mysqli_real_escape_string($con, $_POST['dat_izm']);*/
$partner_zad = mysqli_real_escape_string($con, $_POST['partner_zad']);
$racun_zad = mysqli_real_escape_string($con, $_POST['racun_zad']);
$status = mysqli_real_escape_string($con, $_POST['status']);
$dat_zad = mysqli_real_escape_string($con, $_POST['dat_zad']);
$dat_val = mysqli_real_escape_string($con, $_POST['dat_val']);
$iznos_zad = mysqli_real_escape_string($con, $_POST['iznos_zad']);
$pop_tip = mysqli_real_escape_string($con, $_POST['pop_tip']);
$pop_izn = mysqli_real_escape_string($con, $_POST['pop_izn']);
$pop_din = mysqli_real_escape_string($con, $_POST['pop_din']);
$tr_no1 = mysqli_real_escape_string($con, $_POST['tr_no1']);
$tr_no2 = mysqli_real_escape_string($con, $_POST['tr_no2']);
$tr_no3 = mysqli_real_escape_string($con, $_POST['tr_no3']);
$tr_no = $tr_no1."-".$tr_no2."-".$tr_no3;
$mod_no = mysqli_real_escape_string($con, $_POST['mod_no']);
$poz_no = mysqli_real_escape_string($con, $_POST['poz_no']);

$dat_zad = date("Y-m-d", strtotime($dat_zad));
$dat_val = date("Y-m-d", strtotime($dat_val));

$sqli="INSERT INTO zaduzenja (dat_izm, partner_id, racun_no, status, dat_zad, dat_val, iznos_zad, pop_tip, pop_izn, pop_din, tr_no, mod_no, poz_no)
      VALUES ('$dat_izm', '$partner_id', '$racun_no', '$status','$dat_zad', '$dat_val', '$iznos_zad', '$pop_tip', '$pop_izn', '$pop_din',	'$tr_no', '$mod_no', '$poz_no')";
if (!mysqli_query($con,$sqli)) {
    die('Error: ' . mysqli_error($con));
}
//Upis u uplate
$dat_izm = date("Y-m-d H:i:s");
$partner_id = mysqli_real_escape_string($con, $_POST['partner_zad']);
$racun_no = mysqli_real_escape_string($con, $_POST['racun_zad']);
$dat_upl = mysqli_real_escape_string($con, $_POST['dat_upl']);
$iznos_upl = mysqli_real_escape_string($con, $_POST['iznos_upl']);

$dat_upl = date("Y-m-d", strtotime($dat_upl));

$sql="INSERT INTO uplate (dat_izm, partner_id, racun_no, dat_upl, iznos_upl)
      VALUES ('$dat_izm', '$partner_id', '$racun_no', '$dat_upl', '$iznos_upl')";

if (!mysqli_query($con,$sql)) {
    die('Error: ' . mysqli_error($con));
}
// Slanje podataka nazad u formular
$_SESSION['partner_zad'] = $partner_zad;
$_SESSION['racun_zad'] = $racun_zad;
$_SESSION['status'] = $status;
$dat_zad = date("d.m.Y.", strtotime($dat_zad));
$_SESSION['dat_zad'] = $dat_zad;
$dat_val = date("d.m.Y.", strtotime($dat_val));
$_SESSION['dat_val'] = $dat_val;
$_SESSION['iznos_zad'] = $iznos_zad;
$_SESSION['pop_tip'] = $pop_tip;
$_SESSION['pop_izn'] = $pop_izn;
$_SESSION['pop_din'] = $pop_din;
$_SESSION['tr_no1'] = $tr_no1;
$_SESSION['tr_no2'] = $tr_no2;
$_SESSION['tr_no3'] = $tr_no3;
$_SESSION['mod_no'] = $mod_no;
$_SESSION['poz_no'] = $poz_no;
$dat_upl = date("d.m.Y.", strtotime($dat_upl));
$_SESSION['dat_upl'] = $dat_upl;
$_SESSION['iznos_upl'] = $iznos_upl;
// Izlaz
mysqli_close($con);
header('Location: /racuni/main.php?page=racuni');
exit();
?>