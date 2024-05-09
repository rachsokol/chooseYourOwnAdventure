<?php
session_name('story'); 
session_start();
session_destroy();
require("cfd.php");
header("Location: " . $config_basedir );
?>