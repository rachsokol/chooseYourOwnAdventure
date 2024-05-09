<?php
session_name('story'); 
session_start();
require("cfd.php");
$title = "Home";
require("header.php");
if(isset($_SESSION['USERNAME'])){
    
    ?>
    <div style="margin-left:25%; margin-right:25%;">
    <h1>Choose Your Own Adventure</h1>
    <p style="font-size:15pt;">This game allows the reader to be in control of the story. As you read through the story you get to choose what happens next. Be careful, sometimes your choices will lead to an unwanted ending.</p>
    <h2>How to play:</h2>
    
    <ul style="font-size:16pt;">
        <li>Select the book you would like to read. Then read each page and make a choice.</li>
        <li>Each choice you make will alter the story so choose carefully.</li>
        <li>If you need to save your place, there is a bookmark in the left-hand corner of each page.</li>
    </ul>
    </div>
    
    <?
}else{
?>
<div class="mx-auto mt-5 col-xl-4 col-lg-5 col-md-7 col-sm-8 col-xs-9"  >
	<form class="form-horizontal rounded p-4 " action='login.php' method='POST' id='otherlogin'>
		<fieldset>
			<legend>Please log in below</legend>
			<div class="form-group">
				<label class="col control-label" for="username">Username</label>  
				<div class="col">
					<input id="username" name="username" type="text" placeholder="username" class="form-control input-md" required="">   
				</div>
			</div>
			<div class="form-group">
				<label class="col control-label" for="password">Password</label>
				<div class="col">
					<input id="password" name="password" type="password" placeholder="password" class="form-control input-md" required="">
				</div>
			</div>
			<div class="form-group">
				<label class="col control-label" for="submit"></label>
				<div class="col">
					<input type='submit' id="submit" name="submit" class="btn btn-outline-dark" value='Login'>
				</div>
				</div>
		</fieldset>
	</form>
	</div>
<?

}//end login check
//require("footer.php");
?>
