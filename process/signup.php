<?php
    include("../service/koneksi.php");

    $signup_message = "";

    $username = $_POST["username"];
    $password = $_POST["password"];
    echo $username;
    echo $password;

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if($db->query($sql)){
        echo "berhasil";
    }else{
        echo "gagal";
    }
    
?>