<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
  header("Location: /ITWEB/index.php");
  exit;
}
?>
<?php
include '../backend/controls/fetch.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <!-- SweetAlert2 CDN -->
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
            <h2>จัดการผู้ใช้งาน</h2>
            <table class="table table-bordered text-conter">
                <thead class="table-dark">
                    <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>E-Mail</th>
                        <th>Tel Number</th>
                        <th>Created Data</th>
                        <th>Role</th>
                        <th>Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                        <td class="text-conter"><?= htmlspecialchars($row['id']); ?></td>
                        <td><?= htmlspecialchars($row['first_name']) . " " . htmlspecialchars($row['last_name']); ?></td>
                        <td><?= htmlspecialchars($row['email']); ?></td>
                        <td class="text-conter"><?= htmlspecialchars($row['phone']); ?></td>
                        <td class="text-conter"><?= htmlspecialchars($row['created_at']); ?></td>
                        <td class="text-conter"><?= htmlspecialchars($row['role']); ?></td>
                        <td class="text-conter">
                            <a href="edituser.php?id=<?= $row['id'] ?>" class="btn btn-sm
                            btn-warning">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <button class="btn btn-sm btn-danger" onclick="confirmDelete(<?= $row['id'] ?>)">
                                <i class="bi bi-trash"></i>
                            </button>
                            <script>
                                function confirmDelete(id) {
                                    Swal.fire({
                                        title: 'คุณแน่ใจหรือไม่?',
                                        text: "คุณต้องการลบผู้ใช้งานนี้หรือไม่?",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonText: 'ใช่, ลบเลย!',
                                        cancelButtonText: 'ยกเลิก'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = `../backend/controls/deleteUser.php?id=${id}`;
                                        }
                                    });
                                }
                            </script>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </main>
    </div>
</body>
<?php if (isset($_SESSION['success'])) : ?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'สำเร็จ',
        text: '<?= $_SESSION['success']; ?>',
        confirmButtonText: 'ตกลง'
    });
</script>
<?php unset($_SESSION['success']); ?>

<?php elseif (isset($_SESSION['error'])) : ?>
<script>
    Swal.fire({
        icon: 'error',
        title: 'เกิดข้อผิดพลาด',
        text: '<?= $_SESSION['error']; ?>',
        confirmButtonText: 'ตกลง'
    });
</script>
<?php unset($_SESSION['error']); ?>
<?php endif; ?>

</html>