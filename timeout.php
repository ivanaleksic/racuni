<?php
/**
    if ($_SESSION['session'] > $_SESSION['inactive']) {
        $_SESSION['active'] = 0;
        session_destroy();
        header("location:login_page.php");
        exit();
    } else {
        $_SESSION['active'] = 1;
        exit();
    }

 * Check is session expired
 *
 * @return bool
 */
function is_timeout() {
/*    if (isset($_SESSION['time'])) {*/
    $_SESSION['session'] = time() - $_SESSION['time'];
    if ($_SESSION['session'] > $_SESSION['inactive']) {
        return true;
    } else {
        return false;
    }
}
/*}*/
?>