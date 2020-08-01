<?php
include "_constantes.php";

header('Cache-Control: no cache');
$status_session = session_id();
if (empty($status_session)) {
    header("Location: " . DIR_ROOT . "login.php");
}
