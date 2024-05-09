<?php
session_name('story');
session_start();
require("cfd.php");
if (isset($_SESSION['USERNAME'])) {
require("header.php");
    
    function createBookmarkEle($db)
    {   
        ?>
                <button style="background: none; color: inherit; border: none; padding: 10px; font: inherit; cursor: pointer; outline: inherit;" id='bookmark' name="bookmark" value="bookmark" onclick="myAjax()"><i class="gg-bookmark"></i></button>
        <?
        
    }
    ?>
    <script>
    <?
        $choice = $_POST['choice'];
        $_SESSION['choice'] = $choice;
        $sql = "select p.content, p.pid, c.npid from pages p INNER JOIN choices c ON p.pid = c.npid where c.cid = $choice;";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));
        $row = mysqli_fetch_assoc($res);
        $p = $row['npid'];
        $_SESSION['p'] = $p;
            ?>
        function myAjax() {
            var pid = "<?echo $_SESSION['p'];?>";
            console.log(pid);
            var username = "<?echo $_SESSION['USERNAME'];?>";
      $.ajax({
          type: "POST",
          url: 'ajax.php',
          data:{pid: pid, username: username},
          dataType: 'json',
          success:function(response, data) {
             console.log("Data: " + data);
             alert(response.message);
          },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            alert("An error occurred. Please try again later.");
        }

      });
 }
    
    </script>
    <?
    // function bookmark($db)
    // {
    //     $pid = $_SESSION['pid'];
    //     $username = $_SESSION['USERNAME'];

    //     $sql = "insert into user_choices (username, pid) values('" . $username . "', " . $pid . ");";
    //     $res = mysqli_query($db, $sql) or die(mysqli_error($db));
    //     // $row = mysqli_fetch_assoc($res);
    //     // echo "<div style=\"margin-left:20%; margin-top:3%; margin-bottom:2%;width:50%;>";
    //     // echo "<h3 style=\"margin-top:2%\">*Bookmark has been added!*</h3>";
    //     // echo "</div>";
        
        
    // }//end bookmark
    
    
    
    function choice($db)
    {
        //global $pid, $cid;
        $pid = $_SESSION['pid'];
        $sql = "select cid from choices where pid = $pid;";
        //   $res1 = mysqli_query($db, $sql);
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));
        while ($row = mysqli_fetch_assoc($res)) {
            $cid = $row['cid'];
            $_SESSION['cid'] = $cid;
        }//end while

        if ($cid) {
            ?>
            <div style="height:10%; width:20%;  margin-left:30%; margin-bottom:3%;">
                <form method='POST'>
                    <h5>Choices: </h5>
                    <select name="choice" id="choice">

                        <?
                        $sql = "select cid, choice from choices where pid = $pid;";
                        $res = mysqli_query($db, $sql) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_assoc($res)) {
                            echo "<option value=" . $row['cid'] . ">" . $row['choice'] . "</option>";
                        }//end while
                        ?>
                    </select><br>
                    <input style="margin-top:3%;" class="button" type="submit" name="submit" value="Go"><br>
                </form>
            </div>
        <?
        }//end if
        else {
            ?>
            <div style="height:10%; width:10%;  margin-left:30%; margin-bottom:3%;">
                <form method='POST' action='book.php'>
                    <button style="width:72%;" id='restart' value="Restart">Restart</button>
                </form>
            </div>
        <?
        }
    }//end choice*/


    function page($db)
    {
        $choice = $_POST['choice'];
        $_SESSION['choice'] = $choice;
        $sql = "select p.content, p.pid, c.npid from pages p INNER JOIN choices c ON p.pid = c.npid where c.cid = $choice;";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));
        $row = mysqli_fetch_assoc($res);
        //echo "<p>" . $row['pid'] . "</p>";
        echo "<p>" . $row['content'] . "</p>";
        $_SESSION['pid'] = $row['pid'];
        $_SESSION['npid'] = $row['npid'];
        $npid = $_SESSION['npid'];

    }//end page
    
    // function title($db){
    //     $pid = $_SESSION['pid'];
    //     $sql4 = "select b.name from book b INNER JOIN pages p ON b.bid = p.bid WHERE p.pid = $pid;";
    //     $res4 = mysqli_query($db, $sql4) or die(mysqli_error($db));
    //     $row4 = mysqli_fetch_assoc($res4);
    //     $name = $row4['name'];
    //     echo "<h2>", $name, "</h2>";
    //     // if($res != true){
    //     //     echo "error";
    //     // }
    // }
    
    // if($_POST['bookmark']){
    //     bookmark($db);
    //      echo "<div style=\"margin-left:20%; margin-top:3%; margin-bottom:2%;width:50%;>";
    //     echo "<h3 style=\"margin-top:2%\">*Bookmark has been added!*</h3>";
    //     echo "</div>";
    // }
    
//   echo title($db);
echo "<div class=\"container\" style=\"width:50%;\">";
echo "<h2>Stranded</h2>";
echo "<div style=\"border: 2px solid black; box-shadow: 3px 3px; background-color:#FFFCF4; margin-top:3%; margin-bottom:2%; padding:1%; height:40%;\">";
   
    echo createBookmarkEle($db);
    
    if ($_POST['choice'] || $_POST['bookmark']) {
        page($db);
        choice($db);
        echo "</div>";
    }
    echo "</div>";
}else{
    header("Location: " . $config_basedir );
}//end login