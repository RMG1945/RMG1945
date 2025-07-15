<?php
    session_start();
    include 'db.php';

    if ($_SERVER['REQUEST_METHOD']){
        $id = $_POST['id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        
        $stmt = $pdo->prepare("UPDATE `users` SET `first_name` = ?, `last_name` = ?, `address` = ?, `phone` = ?, `email` = ? WHERE `id` = ?");
        $result = $stmt->execute([$first_name, $last_name, $address, $phone, $email, $id]);

        if ($result) {
            $_SESSION['success'] = "แก้ไขข้อมูลผู้ใช้งานเรียบร้อยแล้ว";
            header("Location: ../user.php");
            exit();
        } else {
            $_SESSION['error'] = "เกิดข้อผิดพลาดในการแก้ไขข้อมูลผู้ใช้งาน";
            header("Location: ../edituser.php?id=" . $id);
            exit();
        }
        
        exit;
    }
?>