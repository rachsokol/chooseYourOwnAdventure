<?php
session_name('story'); 
session_start();
require("cfd.php");
if(isset($_SESSION['USERNAME'])){
require("header.php");

function intro($db, $id){
    $sql = "select content from pages where pid = 1;";
    $res = mysqli_query($db,$sql) or die(mysqli_error($db). "<br>".$sql);
while($row = mysqli_fetch_assoc($res)){
    echo "<div style=\"border: 2px solid black; box-shadow: 3px 3px; background-color:#FFFCF4; margin-top:3%; margin-bottom:2%; padding:1%; height:40%;\">";
    echo "<p>".$row['content']. "</p>";
    ?>
    <div style="height:10%; width:20%;  margin-left:30%; margin-bottom:3%;">
 <form  method='POST' action="pages.php">
     <h5>Make a choice: </h5>
    <select name="choice" id="choice">
    <?
    $sql = "select * from choices where pid = 1;";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));
        while($row = mysqli_fetch_assoc($res)){
            echo "<option value=".$row['cid'].">".$row['choice']."</option>";
        }//end while
    ?>
</select><br>
  <input style="margin-top:3%;" class="button" type="submit" name="submit" value="Go"><br>
    </form>
    </div>
    <?
    echo "</div>";
    }//end while
}//end intro
echo "<div class=\"container\" style=\"width:50%;\">";
echo "<h2>Stranded</h2>";
intro($db, 1);
echo "</div>";
?>

<?
}else{
    header("Location: " . $config_basedir );
}//end login

?>