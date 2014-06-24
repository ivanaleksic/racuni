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
$dat_upl = mysqli_real_escape_string($con, $_POST['dat_upl']);
$iznos_upl = mysqli_real_escape_string($con, $_POST['iznos_upl']);

$sql="INSERT INTO uplate(dat_izm, partner_id, racun_no, dat_upl, iznos)
      VALUES ('$dat_izm', '$partner_id', '$racun_no', '$dat_upl', '$iznos_upl')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}

mysqli_close($con);
$_SESSION['time'] = time();
header('Location: racun.html');
exit();
?>

