<?php

//step 1:Create connection
$connect = mysqli_connect("localhost", "root", "");

//step 2:Create database


$create_db = "create database BookYard";
if(mysqli_query($connect, $create_db)){
    echo "Database created successfully";
} else{
    echo "Error creating database: " . mysqli_error($connect);
}
