<?php

@include 'Configuration.php';

session_start();

if(!isset($_SESSION['admin_name'])){

    header('location:login.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Website</title>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
    <div class="body">
        <header>
            <div class="logo">
                <span id= "std-word" >STUDENT</span>
                <span id="lib-word">LIBRARY</span>
            </div>
            <nav>
                <ul class="nav_links">
                    <li id="homeBtn"><a href="index.php">Home</a> </li>
                    <li id="membersBtn"><a href="members.php">Members</a></li>
                </ul>
            </nav>
            <div class="buttons">
                <a  href="logout.php"><button class="logout">Logout</button></a>
                <a href="adminprofile.php"><img src="../images/profile.png" class="profile" alt=""></a>
            </div>
        </header>
        <div class="landing">
            <p id="landingText"><span>Looking for a book?</span> We have it all here!</p>
        </div>
        <div class="searchFormClass">
            <form id="searchForm" autocomplete="off">
                <input type="text" id="search_query" name="search_query" placeholder="Search for a book...">
                <input type="submit" id="searchBtn" value="Search">
            </form>
        </div>
        <div id="output">
            <div class="cards">
                
            </div>
        </div>
    </div>
    

</body>
<script src="../scripts/index.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


</html>