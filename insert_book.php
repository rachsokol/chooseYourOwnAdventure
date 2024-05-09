<?php
session_name('story'); 
session_start();
require("cfd.php");
require("header.php");
if(isset($_SESSION['USERNAME'])){
    function new_book($db){
        ?>
        <form method="post">
           Name of Book: <input type="text" name="book_name">
           <input type="submit" name="book">
        </form>
        <?
       if($_POST['book']){
           $book = $_POST['book_name'];
           $sql = "INSERT INTO book (name) VALUES ('".$book."');";
           $res = mysqli_query($db,$sql) or die(mysqli_error($db). "<br>".$sql);
       }
       
    }
new_book($db);
    
    

}//end login check
//require("footer.php");
?>