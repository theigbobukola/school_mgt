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
            <label>EMAIL</label>
            <input type="email" placeholder="ENTER EMAIL" name="email" id="email" required="required">
            <label>PASSWORD</label>
            <input type="password" placeholder="ENTER PASSWORD" name="pass" id="pass" required="required">
            <input type="submit" name="submit" id="submit" value="LOGIN">
        <?php
        require '../includes/parameters.php';
        if($_SERVER['REQUEST_METHOD']=="POST"){
            
            if($link = mysqli_connect($host, $user, $password, $database)){
                
                    $email = $_POST['email'];
                    $pass = $_POST['pass'];
                    $query = "select * from students
                             where email='$email' and password = '$pass'";

                    if($result = mysqli_query($link, $query)){
                         if(mysqli_num_rows($result)==0){
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
                            $row = mysqli_fetch_array($result);
                            $_SESSION['id'] = $row['student_id'];
                            $_SESSION['name'] = $row['name'];
                            $_SESSION['age'] = $row['age'];
                            $_SESSION['gender'] = $row['gender'];
                            $_SESSION['email'] = $row['email'];
                            $_SESSION['password'] = $row['password'];
                            $_SESSION['photo'] = $row['photo'];
                            header("location:student_dashboard.php");
                        }
                        
                    }else{'<script>alert("Query Error")</script>';}
            }
            else{
                echo '<script>alert("could not connect database")</script>';
            }
        }
        ?>            
        </form>

    </body>
</html>
