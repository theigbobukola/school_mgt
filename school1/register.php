<?php //
//    session_start();
//    if($_SESSION['user']==""){
//        header("location:index.php");
//    }
//?>
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
        <link href="css styles/style1.css" rel="stylesheet" type="text/css"/>
        <style>
            #formCon{
                width:60%;
                margin: 50px;
                border: 1px solid #666;
                border-radius: 10px;
                padding: 50px;
            }
            input{
                width: 100%;
                padding: 10px;
                box-sizing: border-box;
                margin-bottom: 10px;
            }
            input[type='radio']{
                width:auto;
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
            #frm2{
                width:50%;
                float:left;
                height:150px
            }
            #imgCon{
                 width:40%;
                float:left; 
                height:150px;
                padding-left:25px;
            }
        </style>
    
    </head>
    <body>
        <header>
            <div id="logo">
                <h2>Tekno-Craft</h2>
            </div>
            <ul id="menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="contact us.php">Contact Us</a></li>
                <li><a href="register.php">Register</a></li>
                <li><a href="student/student_login.php">Student Login</a></li>
            </ul>
        </header>
        
        <div id="formCon">
            <form id="frm2" method="post" enctype="multipart/form-data">
                <input type="file" name="uploads">
                <input type="submit" name="uploadFile" value="Upload">                
            </form>
            <div id="imgCon">
                <?php
                     if(isset($_POST['uploadFile'])){
              $size = $_FILES['uploads']['size'];
              $name = $_FILES['uploads']['name'];
              $tmp = $_FILES['uploads']['tmp_name'];
              $location = 'uploaded files/'.$name;
              if(move_uploaded_file($tmp, $location)){
                  echo '<img src="'.$location.'" width="100" height="100">';
                  
              }
              else{
                  echo "<script>alert('upload failed')</script>";
              }
            }          
               ?> 
            
            </div>
            <form id="frm1" method="post" enctype="multipart/form-data" onsubmit="return validate()">
                
                <h3 style="color:#666; text-align:center;margin:10px 0px">
                    Complete Your Registration Here
                </h3>

                
                <input type="text" placeholder="ENTER FULL NAME" name="name" id="name">
                <span id="nE"></span>
                
                Male <input type="radio" name="gender" value="Male" checked="checked">
                Female <input type="radio" name="gender" value="Female">
                <span id="gE"></span>
                
                <input type="number" placeholder="ENTER AGE" name="age" id="age">
                <span id="aE"></span>
                
                <input type="email" placeholder="ENTER EMAIL" name="email" id="email">
                <span id="eE"></span>
                
                <input type="password" placeholder="ENTER PASSWORD" name="pass" id="pass">
                <span id="pE"></span>
                <input type="hidden" value="<?php echo $location; ?>" name="photo">
                <input type="submit" name="submit" id="submit" value="REGISTER">

            </form>
            
            
        </div>
 <?php
   require 'includes/parameters.php';
   
   if(isset($_POST['submit'])){
       if($link = mysqli_connect($host, $user, $password, $database)){
           echo "g";
           $name = $_POST['name'];
           $gender = $_POST['gender'];
           $age = $_POST['age'];
           $email = $_POST['email'];
           $pass = $_POST['pass'];
           $photo = $_POST['photo'];
            $query ="insert into students 
        values(NULL,'$name','$age','$gender','$email','$pass','$photo')";
            
            if(mysqli_query($link, $query)){
        header("location:index.php");
// echo "<span 
//     style='display:block;
//            padding:10px;
//            color:white;
//            text-align:center;
//            font-weight:bold;
//            background:red;'>
//                REGISTRATION COMPLETED</span>"; 
            }
       }
       else{
           echo 'could not connect to database';
       }
       
       
   }
 ?>
    </body>
</html>
<script>
var name = document.getElementById('name');
var gender = document.getElementById('gender');
var age = document.getElementById('age');
var email = document.getElementById('email');
var pass = document.getElementById('pass');

var ne = document.getElementById('nE');
var ge = document.getElementById('gE');
var ae = document.getElementById('aE');
var ee = document.getElementById('eE');
var pe = document.getElementById('pE');

function validate(){
    if(name.value==""){
        ne.innerHTML="please enter full name";
        ne.style.color= "red";
        ne.style.textAlign = "center"
        name.focus();
        name.style.border = "1px solid red";
        return false;
    }
    if(age.value==""){
        ae.innerHTML="please enter age";
        ae.style.color= "red";
        ae.style.textAlign = "center"
        age.focus();
        age.style.border = "1px solid red";
        return false;
    }
    if(email.value==""){
        ee.innerHTML="please enter email";
        ee.style.color= "red";
        ee.style.textAlign = "center"
        email.focus();
        email.style.border = "1px solid red";
        return false;
    }
    if(pass.value==""){
        pe.innerHTML="please enter password";
        pe.style.color= "red";
        pe.style.textAlign = "center"
        pass.focus();
        pass.style.border = "1px solid red";
        return false;
    }
}

name.addEventListener('keypress', function(){
    ne.innerHTML="";
    name.style.border = ""
});
email.addEventListener('keypress', function(){
    ee.innerHTML="";
    email.style.border = ""
});
age.addEventListener('keypress', function(){
    ae.innerHTML="";
    age.style.border = ""
});
pass.addEventListener('keypress', function(){
    pe.innerHTML="";
    pass.style.border = ""
});
</script>