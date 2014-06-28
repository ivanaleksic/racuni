<?php
// Konekcija sa bazom
include('mysqli_connect.php');
// Escape variables for security
$dat_izm = date("Y-m-d H:i:s");
$racun_no = mysqli_real_escape_string($con, $_POST['racun_no']);
$dat_upl = mysqli_real_escape_string($con, $_POST['dat_upl']);
$iznos_upl = mysqli_real_escape_string($con, $_POST['iznos_upl']);

$dat_upl = date("Y-m-d", strtotime($dat_upl));

// Upis u uplate
$sql="INSERT INTO uplate (dat_izm, racun_no, dat_upl, iznos_upl)
      VALUES ('$dat_izm', '$racun_no', '$dat_upl', '$iznos_upl')";
// Greska
if (!mysqli_query($con,$sql)) {
    die('Error: ' . mysqli_error($con));
}
// Izlaz
mysqli_close($con);
header('Location: /racuni/main.php?page=racuni');
exit();
?>