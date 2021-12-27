<?php

if (isset($_SESSION['user_id'])) {
    //if the user is logged in
    try {
        $sql2 = "SELECT * FROM `cart` WHERE user_id='" . $user_id . "'";
        $object2 = $conn->query($sql2);
        $cartCount = $object2->rowCount();
    } catch (PDOException $e) {
        echo $e;
    }
}

?>