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
    <title>Book Viewer</title>
    <link rel="stylesheet" href="../css/profile.css">
</head>
<body>
    <header>
        <div >
            <a href="index.php" class="back-btn">Back</a>
        </div>
        <div class="logo">
            <div class="word">

                <span id= "std-word" >STUDENT</span>
                <span id="lib-word">LIBRARY</span>

            </div>
        </div>
    </header>

    <div>
        <div class="container">
            <div class="col2">
                <div class="member-info">Member Info</div>
                <table>
                    <tr>
                        <td class="mem-attr">
                            Name
                        </td>
                        <td class="attr-val">
                            <?php
                            
                            echo $_SESSION['admin_name']
                            
                            ?>
                        </td>
                        <td class="mem-attr">
                            E-Mail
                        </td>
                        <td class="attr-val">
                        <?php
                            include'Configuration.php';

                            if(isset($_SESSION['admin_name'])){

                                $query = "SELECT email FROM user_form WHERE name= '".$_SESSION['admin_name']."'";     

                                $result = mysqli_query($conn, $query);

                                while($row = mysqli_fetch_assoc($result)){ 

                                echo $row['email'];

                                }

                            }
                        ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="mem-attr">
                            Age
                        </td>
                        <td class="attr-val">
                        <?php
                            include'Configuration.php';

                            if(isset($_SESSION['admin_name'])){

                                $query = "SELECT age FROM user_form WHERE name= '".$_SESSION['admin_name']."'";     

                                $result = mysqli_query($conn, $query);

                                while($row = mysqli_fetch_assoc($result)){ 

                                echo $row['age'];

                                }

                            }
                        ?>
                        </td>
                        <td class="mem-attr">
                            Gender
                        </td>
                        <td class="attr-val">
                        <?php
                            include'Configuration.php';

                            if(isset($_SESSION['admin_name'])){

                                $query = "SELECT gender FROM user_form WHERE name= '".$_SESSION['admin_name']."'";     

                                $result = mysqli_query($conn, $query);

                                while($row = mysqli_fetch_assoc($result)){ 

                                echo $row['gender'];

                                }

                            }
                        ?>
                        </td>
                    </tr>
                </table>
                <br><br>
            </div>
        </div>
    </div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</html>