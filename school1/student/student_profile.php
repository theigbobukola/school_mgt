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
        <link href="../font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="style2.css" rel="stylesheet" type="text/css"/>
        <style>
            #tableCon{
                margin: 20px;
            }
            table{
                width:300px;
                font-family: "Lato", sans-serif;
            }
            td{
                padding: 8px;
            }
            td:first-child{
                font-weight: bold;
            }
            #changeP{
                padding:8px;
                border:none;
                background:#15b410;
                
            }
            #profUp{
                padding:8px;
                border:none;
                background:#e31029;
                color:white;
                
            } 
            button:hover{
                opacity: 0.8;
            }
            #formCon{
                width:50%;
                display: none;
            }

            input{
                padding:8px;
                width:80%;
                margin: 7px 0px;
            }
        </style>

    </head>
    <body>
        <header>
            <h3>Teckn Craft</h3>
        </header>
        <div id="menu">
            <span>User: <?php echo $_SESSION['name']; ?></span>
            <a href="student_dashboard.php">Dashboard</a>
            <a href="student_profile.php" class="active">Profile</a>
            <a href="student_result.php">Check Result</a>
            <a href="student_community.php">Community</a>
            <a href="logout.php">Logout</a>
        </div>
        
        <div id="view">
            
            <div id="tableCon">
                <table>
                     <tr>
                        <td>Photo</td>
                        <td>
                            <div 
                            style="border:1px solid #666;
                            width:100px; 
                            height:100px;">
                                <img 
                               src="<?php if($_SESSION['photo']!="") echo "../".$_SESSION['photo']; ?>"
                               width="100" height="100">
                            </div>    
                        </td>
                    </tr>                    
                    <tr>
                        <td>Full Name</td>
                        <td><?php echo $_SESSION['name']; ?></td>
                    </tr>
                    
                    <tr>
                        <td>Gender</td>
                        <td><?php echo $_SESSION['gender']; ?></td>
                    </tr>
                    <tr>
                        <td>Age</td>
                        <td><?php echo $_SESSION['age']; ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?php echo $_SESSION['email']; ?></td>
                    </tr>                   
                </table>
                <div id="btn">
                <button id="changeP">Change Password</button>
                <button id="profUp">Update profile</button>
                </div>
        <script>
                    document.getElementById('changeP').addEventListener('click',function(){
                        document.getElementById('formCon').style.display = "block";
                    })
                    document.getElementById('profUp').addEventListener('click', function(){
                        location.assign('profile_update.php');
                        
                    })
        </script>
                <div id="formCon">
                    <form method="post" enctype="multipart/form-data">
                        <input type="password" name="pass" placeholder="Enter New Password">
                        <input type="password" name="cpass" placeholder="Confirm New Password">
                        <span class="fa fa-eye-slash" style="font-size:18px;"></span>
                        <input type="submit" value="Change Password" name="updateP">
                    </form>
                    <?php
                    require '../includes/parameters.php';
                        if(isset($_POST['updateP'])){
                            if($link = mysqli_connect($host, $user, $password, $database)){
                            $pass = $_POST['pass'];
                            $query = "update students set password = '$pass'";
                                if(mysqli_query($link, $query)){
                                    echo '<script>alert("Update Successful")</script>';
                                }else{
                                    echo '<script>alert("Update Not Successful")</script>';
                                }
                            }else{
                                echo '<script>alert("Could not connect database")</script>';
                            }
                        }
                    ?>
                </div>
            </div>
            
        </div>
        
    </body>
</html>
