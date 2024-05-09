<?php 
$dbhost = "localhost";
$dbuser = "rsokol_story3user";
$dbpassword = "k&J5YdL+tlN*";
$dbdatabase = "rsokol_story3";
$config_basedir = "https://rssokol.com/PD/project/";//this line
$db = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbdatabase) or die("Error " . mysqli_error($db));
date_default_timezone_set('America/Chicago');
?>
