<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
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
  


