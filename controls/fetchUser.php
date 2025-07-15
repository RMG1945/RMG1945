<?php
    include './controls/db.php';
    session_start();

    // ดึงข้อมูลผู้ใช้งานจาก databse
    $sql = "SELECT `id`, `first_name`, `last_name`, `address`, `phone`, `email`, `password`, `created_at` FROM `users`";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
?>