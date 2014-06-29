<?php
/**
 * Provera da li je sesija istekla
 * @return bool
 */
function is_timeout() {
    $_SESSION['session'] = time() - $_SESSION['time'];
    if ($_SESSION['session'] > $_SESSION['inactive']) {
        return true;
    } else {
        return false;
    }
}
?>