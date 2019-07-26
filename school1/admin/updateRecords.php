<?php
$text = $_POST['text'];
$array = explode(',', $text);
require '../includes/parameters.php';
if($link=  mysqli_connect($host, $user, $password, $database)){
    for($x=0;$x<count($array);$x++){
//       $q2 = "select photo from students where student_id='$array[$x]'";
//        $result = mysqli_query($link, $q2);
//        $rw = mysqli_fetch_array($result);
//        if(!empty($rw['photo'])){
//            unlink("../".$rw['photo']);
//        }
    $query = "delete from students where student_id='$array[$x]'";
        if(mysqli_query($link, $query)){
            
        }
    }
}



/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

