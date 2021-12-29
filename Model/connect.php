
<?php

//db connection
try {
    $conn = new PDO("mysql:host=localhost;dbname=bookdb;", 'root', '');
    echo "<script>console.log('connection successful');</script>";

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "<script>window.alert('Database connection error');</script>";
}


?>