<?php
session_start();
// Konekcija sa bazom
include('mysqli_connect.php');
// Escape variables for security
$dat_izm = date("Y-m-d H:i:s");
$partner_upl = mysqli_real_escape_string($con, $_POST['partner_upl']);
$racun_upl = mysqli_real_escape_string($con, $_POST['racun_upl']);
$dat_upl = mysqli_real_escape_string($con, $_POST['dat_upl']);
$dat_upl = date("Y-m-d", strtotime($dat_upl));
$iznos_upl = mysqli_real_escape_string($con, $_POST['iznos_upl']);
// Upis u uplate
$sql="INSERT INTO uplate (dat_izm, racun_no, partner_id, dat_upl, iznos_upl)
      VALUES ('$dat_izm', '$racun_upl', '$partner_upl', '$dat_upl', '$iznos_upl')";
// Greska
if (!mysqli_query($con,$sql)) {
    die('Error: ' . mysqli_error($con));
}
// Slanje podataka nazad u formular
$_SESSION['partner_upl'] = $partner_upl;
$_SESSION['racun_upl'] = $racun_upl;
$dat_upl = date("d.m.Y.", strtotime($dat_upl));
$_SESSION['dat_upl'] = $dat_upl;
$_SESSION['iznos_upl'] = $iznos_upl;
// Izlaz
mysqli_close($con);
header('Location: /racuni/main.php?page=new-payment');
exit();
?>