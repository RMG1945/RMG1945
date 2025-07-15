<?php
    session_start();
    include '../controls/db.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
        $result = $stmt->execute([$id]);

        if ($result) {
            $_SESSION['success'] = "ลบผู้ใช้งานเรียบร้อยแล้ว";
            header("Location: ../user.php");
        } else {
            $_SESSION['error'] = "เกิดข้อผิดพลาดในการลบผู้ใช้งาน";
            header("Location: ../user.php");
        }
    exit;
    }
?>