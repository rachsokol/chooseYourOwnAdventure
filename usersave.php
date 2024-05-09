<?php
session_name('story'); 
session_start();
require("cfd.php");
$title = "Home";
require("header.php");
if(isset($_SESSION['USERNAME'])){
    function save($db){
            $username = $_SESSION['USERNAME'];
            $sql = "select pid from user_choices where timestamp = (select MAX(timestamp) from user_choices where username = '$username')";
            $res = mysqli_query($db, $sql) or die(mysqli_error($db));
            $row = mysqli_fetch_assoc($res);
            $cpid = $row['pid'];
                
            $sql2 = $sql = "select content, pid from pages where pid = $cpid;";
            $res2 = mysqli_query($db, $sql2) or die(mysqli_error($db));
            while($row2 = mysqli_fetch_assoc($res2)){
                echo "<div style=\"border: 2px solid black; box-shadow: 3px 3px; background-color:#FFFCF4; margin-left:20%; margin-top:3%; margin-bottom:2%; padding:1%; height:40%; width:50%;\">";
                echo "<p>".$row2['content']. "</p>";
                echo choice($db);
                echo "</div>";
                $_SESSION['pid'] = $row2['pid'];
                $pid = $_SESSION['pid'];
               // $npid = $row2['npid'];
            }
        }//end save
  // global $pid; 
    function choice($db){
         $pid = $_SESSION['pid'];
          $sql = "select cid from choices where pid = $pid;";
          $res = mysqli_query($db, $sql) or die(mysqli_error($db));
          while($row = mysqli_fetch_assoc($res)){
                    $cid = $row['cid'];
                }//end while
           
        if($cid){
            ?>
            
           <div style="height:10%; width:20%;  margin-left:30%; margin-bottom:3%;">
            <form  method='POST' action='pages.php'>
                <h5>Make a choice: </h5>
                <select name="choice" id="choice">
               
                    <?
                    $sql = "select * from choices where pid = $pid;";
                    $res = mysqli_query($db, $sql) or die(mysqli_error($db));
                    while($row = mysqli_fetch_assoc($res)){
                        echo "<option value=".$row['cid'].">".$row['choice']."</option>";
                    }//end while
                ?>
                </select><br>
                <input class="button" type="submit" name="submit" value="Go"><br>
            </form>
            </div>
                <?
        }//end if
     else{
         ?>
         <script>
            
                location.reload();
            </script>
         <?
     }
        ?>
     <!--   <div style="height:10%; width:10%;  margin-left:30%; margin-bottom:3%;">
        <form method='POST' action='book.php'>
             <button style="width:70%;" id='restart' value="Restart">Restart</button>
        </form>
        </div>-->
     <?
    // }
   }//end choice*/
    
echo save($db);


}//end login check
//require("footer.php");
?>