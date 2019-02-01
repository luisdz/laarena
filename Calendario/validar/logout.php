<?php
session_name('calendario');
@session_start(calendario);
session_destroy(calendario);
header("Location: ../login.php");
?>