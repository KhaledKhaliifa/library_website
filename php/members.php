<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Website</title>
    <link rel="stylesheet" href="../css/index.css?v=<?php echo time(); ?>">
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
                <a href="profile.php"><img src="../images/profile.png" class="profile" alt=""></a>
            </div>
        </header>

        <div class="searchFormClass">
            <form id="deleteForm" autocomplete="off" action="delete.php" method="post">
                <input type="text" id="delete_query" name="search_query" placeholder="Remove a member...">
                <input type="submit" id="deleteBtn" name="deleteBtn" value="Remove">
                
            </form>
        </div>
        <div id="membersOutput">
            <table id="membersTable">
                <tr id="startRow">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Email</th>
                </tr>

                <div>
                    <?php
                            include'Configuration.php';

                            
                                $query = "SELECT * FROM user_form WHERE user_type = 'user'";     

                                $result = mysqli_query($conn, $query);

                                while($row = mysqli_fetch_assoc($result)){ 
                                    
                                echo 
                                "<tr><td>".$row['id'].
                                "</td><td>".$row['name'].
                                "</td><td>".$row['gender'].
                                "</td><td>".$row['age'].
                                "</td><td>".$row['email'].
                                "</td></tr>";

                                }
                        ?>
                    
                </div>
            </table>
        </div>
    </div>
    

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


</html>