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
            <a href="userIndex.php" class="back-btn">Back</a>
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
                        <td class="book-attr">
                            Name
                        </td>
                        <td class="attr-val">
                            ${title}
                        </td>
                        <td class="book-attr">
                            E-Mail
                        </td>
                        <td class="attr-val">
                            ${author}
                        </td>
                    </tr>
                    <tr>
                        <td class="book-attr">
                            Date of Birth
                        </td>
                        <td class="attr-val">
                            ${date}
                        </td>
                        <td class="book-attr">
                            Address
                        </td>
                        <td class="attr-val">
                            ${publisher}
                        </td>
                    </tr>
                    <tr>
                        <td class="book-attr">
                            Phone Number
                        </td>
                        <td class="attr-val">
                            ${pages}
                        </td>
                    </tr>
                </table>
                <br><br>
            </div>
        </div>
    </div>

</body>
<script src="../scripts/profile.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</html>