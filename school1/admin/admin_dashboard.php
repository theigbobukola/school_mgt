<?php
    session_start();
    if($_SESSION['user']==""){
        header("location:index.php");
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

        <link href="style3.css" rel="stylesheet" type="text/css"/>
        <style>
            table{
                border-collapse: collapse;
                width:70%;
                margin: 20px;
            }
            thead{
                background: black;
                color: white;
            }
            thead th{
                padding: 10px;
            }
            tbody td{
                padding: 8px;
            }
        </style>

    </head>
    <body>
        <header>
            <h3>Teckn Craft</h3>
        </header>
        <div id="menu">
            <span>User: Admin</span>
            <a href=admin_dashboard.php" class="active">Dashboard</a>
            <a href="submit_result.php">Check Result</a>
            <a href="student_community.php">Community</a>
            <a href="logout.php">Logout</a>
        </div>
        
        <div id="view">
            <div id="tableCon">
            <table border="1">
                <thead>
                    <tr>
                        <th>FULL NAME</th>
                        <th>AGE</th>
                        <th>GENDER</th>
                        <th colspan="3">EMAIL</th>
                        
                    </tr>
                </thead>
                
                <tbody id="records">
            <?php
    require '../includes/parameters.php';
    if($link=  mysqli_connect($host, $user, $password, $database)){
        $query="select * from students";
        if($result=  mysqli_query($link, $query)){
            
            while($row = mysqli_fetch_array($result)){
                echo '<tr>';  
                echo '<td>'.$row['name'].'</td>'; 
                echo '<td>'.$row['age'].'</td>'; 
                echo '<td>'.$row['gender'].'</td>'; 
                echo '<td>'.$row['email'].'</td>';
                echo "<td><a href=''>view</a></td>";
                echo "<td><input type='checkbox'
                value=".$row['student_id']." class='check'></td>";
                echo '</tr>';  
            }
        }
        
    }
            ?>
                </tbody>
                
            </table>
                
            </div>
            
            <button id="delBTN">Delete</button>

        </div>
</html>

<script>
    
 window.setInterval(updatePage,1000);
 
    function updatePage(){
         var obj;
        if(window.XMLHttpRequest){
            obj = new XMLHttpRequest();
        }
        else{
            obj = new Activeobject('Microsoft.XMLHTTP');
        }
        
        obj.onreadystatechange = function(){
            
                if(obj.readyState==4 && obj.status==200){

                document.getElementById('records').innerHTML=obj.responseText;

                }
    
    
    
            }
      
       obj.open('POST','updatePage.php',true);
       obj.setRequestHeader('Content-type','application/x-www-form-urlencoded');
       obj.send();      
       
       
       
    }//end update
    
    
    
    
    
    document.getElementById('delBTN').addEventListener('click',remove);
    function remove(){
        var obj;
        if(window.XMLHttpRequest){
            obj = new XMLHttpRequest();
        }
        else{
            obj = new Activeobject('Microsoft.XMLHTTP');
        }
        
        obj.onreadystatechange = function(){
            
    if(obj.readyState==4 && obj.status==200){
        
    document.getElementById('records').innerHTML=obj.responseText;
    
    }
 }
        
       check =document.getElementsByClassName('check');
       data =[];
       v=0
       for(x=0;x<check.length;x++){
           
           if(check.item(x).checked){
               data[v]= check.item(x).value;
               v++;
           }
       }
       parameters = 'text=' +data;//2,3
       obj.open('POST','updateRecords.php',true);
       obj.setRequestHeader('Content-type','application/x-www-form-urlencoded');
       obj.send(parameters);
       //alert('successful');
       window.location.reload();
      
    }
</script>    