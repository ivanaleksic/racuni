<?php
    if ($_SESSION['session'] > $_SESSION['inactive']) {
        $_SESSION['active'] = 0;
        session_destroy();
        header("location:login_page.php");
        exit();
    } else {
        $_SESSION['active'] = 1;
        exit();
    }
/**
 * Check is session exiried
 *
 * @return bool
 */
function is_timeout()
    {
        $_SESSION['session'] = time() - $_SESSION['time'];
        if ($_SESSION['session'] > $_SESSION['inactive']) {
            return true;
        } else {
            return false;
        }
    }
?>