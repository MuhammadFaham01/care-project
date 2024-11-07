<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['email'])) {
    // If logged in, log out the user
    session_unset(); // Clear all session variables
    session_destroy(); // Destroy the session
    echo "<script>location.href='login.php'</script>";
} else {
    // If not logged in, do nothing
    echo "<script>location.href='index.php'</script>";
}
?>
