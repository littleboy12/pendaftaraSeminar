<?php
session_start();
session_unset();
session_destroy();

header("Location: ../view/view_registration.php");
exit();
