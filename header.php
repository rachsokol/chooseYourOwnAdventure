<?php
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Choice Based Story Game">
    <meta name="author" content="Rachel Sokol">
    <title>Choose Your Own Adventure</title>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<link href='https://unpkg.com/css.gg@2.0.0/icons/css/bookmark.css' rel='stylesheet'>
<style>
  .gg-bookmark,
.gg-bookmark::after {
 display: block;
 box-sizing: border-box;
 border-top-right-radius: 3px
}

.gg-bookmark {
 color:blue;
 border: 2px solid;
 border-bottom: 0;
 border-top-left-radius: 3px;
 overflow: hidden;
 position: relative;
 transform: scale(var(--ggs,1));
 width: 14px;
 height: 16px
}

.gg-bookmark::after {
 content: "";
 position: absolute;
 width: 12px;
 height: 12px;
 border-top: 2px solid;
 border-right: 2px solid;
 transform: rotate(-45deg);
 top: 9px;
 left: -1px
} 
  caption {font-size:20pt;text-align:center;}
  body {font-family: lobster; font-size:14pt;background-color:#829191;
  }
  main { width: 40%; margin: auto; padding: 10px;}
  .cover {
  background: linear-gradient(to right, rgb(1, 50, 32) 3px, rgba(255, 255, 255, 0.5) 5px, rgba(255, 255, 255, 0.25) 7px, rgba(255, 255, 255, 0.25) 10px, transparent 12px, transparent 16px, rgba(255, 255, 255, 0.25) 17px, transparent 22px);
  box-shadow: 0 0 5px -1px black, inset -1px 1px 2px rgba(255, 255, 255, 0.5);
  margin: auto;
  border-radius: 5px;
  width: 389px;
  height: 500px;
}


  
  .container {
      position: relative;
  }
  .center {
  position: absolute;

  left: 50%;
 

}
  .button {
      text-align: center;
  }
  input{width:60%;}
  aside { text-align: right;}
  h1 {text-align: center; font-family:lobster;}
  h2{text-align:center;}
  h3{text-align:center;}
  img {border: 5px #FF5733 solid;border-radius:10px;}
  th, td {border: black 2px solid; margin:auto;}
  table{border: black 2px solid; background-color:#b3a99d;}
  a:link{ color:#493a21}
  a:visited{color:#493a21}
  a:hover{ color:black}
  a:active {color:#493a21}
  #fancyfont {font-family:cursive;}
  #sources {border: 2px #000000 solid; border-radius:10px;padding:5px;}
  #color {border: 2px #669175 solid;}
  #backgroundcolor {background-color:#669175;}
  
    header, nav, main, footer, aside, figure { display: block; }
  @media (min-width: 600px) {
  header { grid-area: header; }
  nav { grid-area: nav; }
  main { grid-area: main; }
  aside {grid-area: aside; }
  footer { grid-area: footer; }
  #wrapper { display: grid;
  grid-template:
  "header header"
  "nav nav"
  "main aside"
  "footer footer" 
/ 55% }
}
@media (min-width: 1024px) {
header { grid-area: header; }
nav { grid-area: nav; }
main { grid-area: main; }
aside { grid-area: aside; }
footer { grid-area: footer; }
#wrapper { margin: auto; max-width: 1200px; display: grid;
grid-template:
"header header header"
"nav nav nav"
"main main aside"
"footer footer footer"
/ 150px; } 
}

  </style>
  </head>
  <body>
   <nav style="background-color:#4C5B61" class="navbar navbar-expand-lg navbar-nav justify-content-center">
    <ul class="navbar-nav  mt-2 mt-lg-0 ">
        <li class="nav-item">
        <a style="font-size:25px;font-family: 'Bruno Ace SC', cursive; color:white;" class="navbar-brand" href="#">Choose Your Own Adventure</a>
        </li>
      <li class="nav-item">
        <a style="color:white;" class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a style="color:white;" class="nav-link" href="books.php">Books</a>
      </li>
        <?
                if(isset($_SESSION['USERNAME'])){
                    echo "<li class=\"nav-item\">";
                    echo "<a style=\"color:white;\"class=\"nav-link\" href='logout.php'>Logout</a>";
                    echo "</li>";
                }else{
                    echo "<li class=\"nav-item\">";
                    echo "<a style=\"color:white;\" class=\"nav-link\" href='login.php'>Login</a><br>";
                    echo "</li>";
                    echo "<li class=\"nav-item\">";
                    echo "<a style=\"color:white;\" class=\"nav-link\" href='register.php'>Register</a>";
                    echo "<li>";
                    
                }//end if
                ?>
      
                </ul>
     
</nav>
