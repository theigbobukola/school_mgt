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
                <form method="post" enctype="multipart/form-data">
                <table>
 
                    <tr>
                        <td>Full Name</td>
                        <td><input type="text" 
                          value="<?php echo $_SESSION['name']; ?>" 
                          name="fullname">
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Gender</td>
                        <td><input type="text" 
                          value="<?php echo $_SESSION['gender']; ?>" 
                          name="gender">
                        </td>                    
                    </tr>
                    <tr>
                        <td>Age</td>
                        <td><input type="text" 
                          value="<?php echo $_SESSION['age']; ?>" 
                          name="age">
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" 
                          value="<?php echo $_SESSION['email']; ?>" 
                          name="email">
                        </td>
                    </tr>                   
                </table>
                <div id="btn">
                    
                    <button type="submit" id="profUp" name="profUp">
                        Update profile
                    </button>
                    
                </div>
                    
                </form>
                
            </div>
            
        </div>
<?php
        require '../includes/parameters.php';
    if(isset($_POST['profUp'])){
        if($link = mysqli_connect($host, $user, $password, $database)){
            $id = $_SESSION['id'];
            $name = $_POST['fullname'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $query="update students set name='$name', 
            age='$age', gender='$gender',email='$email' 
                    where student_id='$id'" ;
            if(mysqli_query($link, $query)){
                           
                            $_SESSION['name'] = $name;
                            $_SESSION['age'] = $age;
                            $_SESSION['gender'] = $gender;
                            $_SESSION['email'] = $email;
                                         
                echo '<script>alert("Update Successful")</script>';
                header('location:student_profile.php');
            }
            else{
                echo '<script>alert("Update Not Successful")</script>';
            }
        }
    }
?>
    </body>
</html>
