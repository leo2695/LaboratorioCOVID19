<?php


$conn=new mysqli('localhost:3307','root','root','laboratorio');//forma orientada a objetos

if($conn->connect_error){
    echo $error->$conn->connect_error;
}
?>