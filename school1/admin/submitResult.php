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
    </head>
    <body>
<form enctype='multipart/form-data'>
            <label> Student
            </label>
            <select name='student' id='student'>
                <option disabled='disabled' value='' selected="selected">--Select Student's Name</option>
            </select>
            <label> English</label>
            <input type="text" name='english' placeholder="Enter English Score">
            <label> Mathematics</label>
            <input type="text" name='maths' placeholder="Enter Maths Score">
            <input type='text' value='Enter'>
        </form>
        <script>
         document.getElementById('student').addEventListener('click', 'updateName');
            function updateName(){
         var obj;
        if(window.XMLHttpRequest){
            obj = new XMLHttpRequest();
        }
        else{
            obj = new Activeobject('Microsoft.XMLHTTP');
        }
        
        obj.onreadystatechange = function(){
            
                if(obj.readyState==4 && obj.status==200){

                document.getElementById('student').innerHTML=obj.responseText;

                }
    
    
    
            }
      
      // obj.open('POST','updateStudentName.php',true);
       obj.setRequestHeader('Content-type','application/x-www-form-urlencoded');
       obj.send();      
       
       
       
    }//end update
            </script>

        <?php
        // put your code here
        ?>
    </body>
</html>
