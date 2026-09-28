<?php
// Initialize the session.
session_start();

// Unset all session variables.
$_SESSION = array();

// REVISED: Deletes the session cookie from the browser.
//          Another step to avoid cookies being exploited by not allowing browsers to retain them.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();

    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Destroy the server-side session.
session_destroy();

// Redirect to login page.
header("location: login.php");
exit;
?>