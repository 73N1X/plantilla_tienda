<?php
$db=mysqli_connect(
    $_ENV['DB_HOST'],
    $_ENV['DB_USER'],
    $_ENV['DB_PASS'],
    $_ENV['DB_BD']
);
if(!$db){
    echo 'Could not connect to database';
    echo 'dep err: ' . mysqli_connect_errno();
    echo 'dep err: ' . mysqli_connect_error();
    exit;
}