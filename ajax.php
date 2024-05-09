<?php
session_name('virtual_pet');
session_start();
require 'cfd.php';
//require 'pages.php';

header("Content-Type: application/json");

if(isset($_POST['pid'])) {
    $pid = intval($_POST['pid']);
    $username = $_POST['username'];

    $sql = "insert into user_choices (username, pid) values('".$username."', '.$pid.');";
    $res = mysqli_query($db, $sql) or die(mysqli_error($db));
    echo json_encode(["message" => "Bookmark has been saved!"]);
    exit;
}
?>