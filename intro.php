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
    
    echo "<p>".$row['content']. "</p>";
    }//end while
}//end intro
// function choice($db, $id){
//     $sql = "select * from choices where pid = 2;";
//     $res = mysqli_query($db,$sql) or die(mysqli_error($db). "<br>".$sql);
// while($row = mysqli_fetch_assoc($res)){
//     echo "<form method=\"post\">";
//     echo "<div class=\"btn-group btn-group-toggle\" data-toggle=\"buttons\">
//   <label class=\"btn btn-secondary active\">
//     <input type=\"radio\" name=\"".$row['choice']."\" id=\"".$row['choice']."\" autocomplete=\"off\" >".$row['choice']."
//   </label>";
    
//     }//end while
//     echo "<input class=\"btn btn-primary\" type=\"submit\"value=\"Go\">";
//     echo "</form>";
// }//end choice
echo intro($db, 1);
?>
 <form  method='POST' action="pages.php">
    <select name="choice" id="choice">
    <?
    $sql = "select * from choices where pid = 1;";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));
        while($row = mysqli_fetch_assoc($res)){
            echo "<option value=".$row['cid'].">".$row['choice']."</option>";
        }//end while
    ?>
</select><br>
  <input type="submit" name="submit" value="Go"><br>
    </form>
<?
// echo choice($db, 1);
//$cid = $_POST['choice']; 
// if($_POST){
    
//     $sql = "insert into user_choices(cid, pid, username) values('".$cid."','2','".$_SESSION['USERNAME']."')";
    
//     if ( mysqli_query($db, $sql)){
//     echo "*Saved*";
//   }
//   else {mysqli_query($db,$sql) or die(mysqli_error($db). "<br>".$sql);}
// }//end if
    //"INSERT INTO product(pid, mfid, roast, weight) values('".$pid."', '".$mfid."', '".$roast."', ".$weight.")";
    //$sql = "select content from pages p INNER JOIN choices c ON p.pid = c.pid where $cid = c.cid;";
   // $res = mysqli_query($db,$sql) or die(mysqli_error($db). "<br>".$sql);
    
}else{
    header("Location: " . $config_basedir );
}//end login

?>