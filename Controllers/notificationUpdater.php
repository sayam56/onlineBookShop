<?php

try {
    $sql = "SELECT * FROM `notifications` WHERE user_id='" . $user_id . "' AND seen='0' ";
    $object = $conn->query($sql);
    $notiCount = $object->rowCount();
} catch (PDOException $e) {
    echo $e;
}
?>