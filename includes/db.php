<?php

const HOST = "localhost";
const USER = "root";
const PASSWORD = "";
CONST DB_NAME = "cms";

$connection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME);

if($connection) {
  /* echo "DB connected"; */
}
?>