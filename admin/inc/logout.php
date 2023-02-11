<?php
session_start();
unset($_SESSION['admin_connected']);
session_destroy();
header("Location: ../index.php?logout=success");