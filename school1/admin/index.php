<?php
    session_start();
    ob_start();
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
        <link href="../css styles/style1.css" rel="stylesheet" type="text/css"/>
        
        <title></title>
        <style>
            form{
                width:60%;
                margin: 50px;
                border: 1px solid #666;
                border-radius: 10px;
                padding: 50px;
            }
            input,label{
                width: 100%;
                padding: 10px;
                box-sizing: border-box;
                margin-bottom: 10px;
            }

            #submit{
                border: none;
                background:#009933;
                color: white;
                font-weight: bold;
            }
            span{
                display: block;
            }
      
        </style> 
    </head>
    <body>
        <header>
                <div id="logo">
                <h2>Tekno-Craft</h2>
            </div>
            <ul id="menu">
                <li><a href="../index.php">Home</a></li>
                <li><a href="../contact us.php">Contact Us</a></li>
                <li><a href="../register.php">Register</a></li>
                <li><a href="student_login.php">Student Login</a></li>
            </ul>
        </header>    
        <form method="post" enctype="multipart/form-data" 
              onsubmit="return validate()">
            <h3 style="text-align:center;color:#666">Admin Panel</h3>
            <label>USERNAME</label>
            <input type="text" placeholder="ENTER USERNAME" name="user" id="user" required="required">
            <label>PASSWORD</label>
            <input type="password" placeholder="ENTER PASSWORD" name="pass" id="pass" required="required">
            <input type="submit" name="submit" id="submit" value="LOGIN">
        <?php
        require '../includes/parameters.php';
        define("username", "admin");
        define("password", "admin");
        if($_SERVER['REQUEST_METHOD']=="POST"){            
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                
                         if($user!=username && $pass!=password){
                            echo "<span 
                                style='display:block;
                                       padding:10px;
                                       color:white;
                                       text-align:center;
                                       font-weight:bold;
                                       background:red;'>
                                           NO SUCH USER</span>";
                         }
                         else{
                             $_SESSION['user']=$user;
                            header("location:admin_dashboard.php");
                        }

        }
        ?>            
        </form>

    </body>
</html>
