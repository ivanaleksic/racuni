<?php
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

    $dat_zad = date("Y-m-d", strtotime($dat_zad));
    $dat_val = date("Y-m-d", strtotime($dat_val));

    $sqli="INSERT INTO zaduzenja (dat_izm, partner_id, racun_no, status, dat_zad, dat_val, iznos_zad, pop_tip, pop_izn, pop_din, tr_no, mod_no, poz_no)
          VALUES ('$dat_izm', '$partner_id', '$racun_no', '$status','$dat_zad', '$dat_val', '$iznos_zad', '$pop_tip', '$pop_izn', '$pop_din',	'$tr_no', '$mod_no', '$poz_no')";
    if (!mysqli_query($con,$sqli)) {
        die('Error: ' . mysqli_error($con));
    }

    // escape variables for security
    //Upis u uplate
    $dat_izm = date("Y-m-d H:i:s");
    $partner_id = mysqli_real_escape_string($con, $_POST['partner_id']);
    $racun_no = mysqli_real_escape_string($con, $_POST['racun_no']);
    $dat_upl = mysqli_real_escape_string($con, $_POST['dat_upl']);
    $iznos_upl = mysqli_real_escape_string($con, $_POST['iznos_upl']);

    $dat_upl = date("Y-m-d", strtotime($dat_upl));

    $sql="INSERT INTO uplate (dat_izm, partner_id, racun_no, dat_upl, iznos_upl)
          VALUES ('$dat_izm', '$partner_id', '$racun_no', '$dat_upl', '$iznos_upl')";

    if (!mysqli_query($con,$sql)) {
        die('Error: ' . mysqli_error($con));
    }
mysqli_close($con);
header('Location: /racuni/main.php?page=racuni');
exit();
?>