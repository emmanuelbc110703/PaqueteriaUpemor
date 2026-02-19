<?php

//Variables la conexion 
$server = "localhost";
$user = "root";
$password = "";
$db = "paqueteria";


// Crear variable de conexion de db

$connection = new mysqli($server,$user,$password,$db);

//Evaluar la conexion de la base de datos 

if($connection->connect_errno){
    die("Conexion fallida: ". $connection -> connect_errno);

}