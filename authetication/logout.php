<?php
session_unset();
session_destroy();
setcookie(session_name(), '', time() - 42000, '/', '', true, true);
header("Location: /eduremun/authetication/login.php?error=Session Expired! Please login again.");
