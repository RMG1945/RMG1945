<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: /ITWEB/index.php");
    exit;
}

include '../backend/controls/db.php'; // เชื่อมต่อฐานข้อมูล

// ตรวจสอบว่าได้ส่ง id มาเพื่อแก้ไขหรือยัง
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$id]);
    $users = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$users) {
        echo "<p>ไม่พบผู้ใช้งานที่ระบุ</p>";
        exit;
    }
} else {
    echo "<p>ไม่ได้ระบุผู้ใช้งาน</p>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="./assets/css/style.css">

    <style>
        #bg-video {
            position: fixed;
            top: 0;
            left: 0;
            min-width: 100vw;
            min-height: 100vh;
            object-fit: cover;
            z-index: -1;
            filter: blur(8px) brightness(0.6);
        }

        main {
            background-color: rgba(204, 202, 202, 0.85);
            border-radius: 10px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <?php include '../backend/components/header.php'; ?>

        <main class="p-4 flex-grow-1">
            <h2>แก้ไขผู้ใช้งาน</h2>
            <form action="../backend/controls/edituser.php" method="POST">
                <input type="hidden" name="id" value="<?= $users['id']; ?>">

                <div class="mb-3">
                    <label for="">Firstname</label>
                    <input type="text" name="first_name" class="form-control" value="<?= htmlspecialchars($users['first_name']); ?>">
                </div>

                <div class="mb-3">
                    <label for="">LastName</label>
                    <input type="text" name="last_name" class="form-control" value="<?= htmlspecialchars($users['last_name']); ?>">
                </div>

                <div class="mb-3">
                    <label for="">Address</label>
                    <textarea name="address" class="form-control"><?= htmlspecialchars($users['address']); ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="">Phone</label>
                    <input type="text" name="phone" class="form-control" value="<?= htmlspecialchars($users['phone']); ?>">
                </div>

                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($users['email']); ?>">
                </div>

                <button type="submit" class="btn btn-primary">บันทึกการเปลี่ยนแปลง</button>
                <button type="submit" class="btn btn-danger">รีเซ็ต</button>
                <a href="user.php" class="btn btn-secondary">ย้อนหลัง</a>
            </form>
        </main>
    </div>
</body>
</html>
