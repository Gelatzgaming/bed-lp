<?php
session_start();
session_destroy();
header("location: ../bedlp-login.php");?>