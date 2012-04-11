<?php
if (!isset($_SESSION)) {
    session_start();
}
session_destroy();
session_unset();
header("Location: ../Views/sessaoCliente.php");
?>
