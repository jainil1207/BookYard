<?php
// step-1 : Create connection
 $conn = mysqli_connect("localhost", "root", "", "Library");

//  step-3 : select database
try{
    mysqli_connect("localhost", "root", "", "Library");
} catch(Exception){
    echo "Connection failed";
}
// step-2 : create database

// $create_db = "create database intervio";
// if (mysqli_query($conn, $create_db)){
// echo "Database created";
// } else {
// echo "Error creating database";
// }

// step-4: create table
$create_table = "create table register(id int(11) auto_increment primary key, fullname varchar(255), nationality varchar(255))";
if (mysqli_query($conn, $create_table)){
    echo "Table created";
} else {
    echo "Error creating table";
 }