<?php
    session_start();
    if($_SESSION['name']==""){
        header("location:student_login.php");
    }
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="style2.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <header>
            <h3>Teckn Craft</h3>
        </header>
        <div id="menu">
            <span>User: <?php echo $_SESSION['name']; ?></span>
            <a href="student_dashboard.php" class="active">Dashboard</a>
            <a href="student_profile.php">Profile</a>
            <a href="student_result.php">Check Result</a>
            <a href="student_community.php">Community</a>
            <a href="logout.php">Logout</a>
        </div>
        
        <div id="view">
            
        </div>
    </body>
</html>
