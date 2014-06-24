<?php
$con=mysqli_connect("localhost","root","","racuni");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// escape variables for security
$dat_izm = mysqli_real_escape_string($con, $_POST['dat_izm']);
$partner_id = mysqli_real_escape_string($con, $_POST['partner_id']);
$racun_no = mysqli_real_escape_string($con, $_POST['racun_no']);
$status = mysqli_real_escape_string($con, $_POST['status']);
$dat_zad = mysqli_real_escape_string($con, $_POST['dat_zad']);
$dat_val = mysqli_real_escape_string($con, $_POST['dat_val']);
$iznos_zad = mysqli_real_escape_string($con, $_POST['iznos_zad']);
$pop_tip = mysqli_real_escape_string($con, $_POST['pop_tip']);
$pop_izn = mysqli_real_escape_string($con, $_POST['pop_izn']);
$pop_din = mysqli_real_escape_string($con, $_POST['pop_din']);
$tr_no = mysqli_real_escape_string($con, $_POST['tr_no']);
$mod_no = mysqli_real_escape_string($con, $_POST['mod_no']);
$poz_no = mysqli_real_escape_string($con, $_POST['poz_no']);

$sql="INSERT INTO zaduzenja(dat_izm, partner_id, racun_no, status, dat_zad,	dat_val, iznos, pop_tip, pop_izn, pop_din, tr_no, mod_no, poz_no)
      VALUES ('$dat_izm', '$partner_id', '$racun_no', '$status','$dat_zad', '$dat_val', '$iznos_zad', '$pop_tip', '$pop_izn',
		'$pop_din',	'$tr_no', '$mod_no', '$poz_no')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}

mysqli_close($con);
$_SESSION['time'] = time();
header('Location: racun.html');
exit();
?>
