<?php
session_name('story'); 
session_start();
require("cfd.php");
$title = "Home";
if(isset($_SESSION['USERNAME'])){
    require("header.php");
function books($db, $id){
    $sql = "select name from book";
    $res = mysqli_query($db,$sql) or die(mysqli_error($db). "<br>".$sql);
    
    echo "<h2>Books:</h2>";

    while($row = mysqli_fetch_assoc($res)){
        echo "<div class=\"container \" >";
    echo "<div class=\"row\">";
        echo "<div class=\"col\">";
        echo "<form method=\"post\" class=\"cover\" style=\"border: 2px solid black; background-color:#669175; width:225px; height:250px;\">";
        echo "<h3>".$row['name']. "</h3>";
       // echo "<div class=\"center\">";
        echo "<h3><a class=\"btn btn-secondary button\" style=\"margin-top:100px;\" href=\"book.php\" name=\"go\" role=\"button\">Start Reading</a></h3>";
    }//end while
    $username = $_SESSION['USERNAME'];
    $sql = "select pid from user_choices where username = '$username';";
    $res = mysqli_query($db,$sql) or die(mysqli_error($db). "<br>".$sql);
    $row = mysqli_fetch_assoc($res);
    
        if (!empty($row)){
            
          echo "<h3><a class=\"btn btn-secondary button\" style=\"margin-bottom:px; \" href=\"usersave.php\" role=\"button\" name=\"continue\">Go to Bookmark</a></h3";  
        }

    echo "</form>";
   // echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
}//end books()
 books($db, 1);
}else{
    header("Location: " . $config_basedir );
}
?>