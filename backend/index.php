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
    <title>Information Website</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
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
            filter: blur(2px) brightness(0.6);
        }

        main {
            background-color: rgba(255, 255, 255, 0.85);
            border-radius: 10px;
            padding: 20px;
        }
    </style>
</head>

<body>
  <video autoplay muted loop id="bg-video">
        <source src="https://motionbgs.com/media/6200/white-toyota-drifting.960x540.mp4" type="video/mp4">
        
    </video>
    <div class="d-flex">
      <?php include '../backend/components/header.php'; ?>

      <main class="p-4 flex-grow-1">
      <section id="fecth_user" class="py-5">
        <div class="container">
            <h2 class="mb-4">แสดงข้อมูลผู้ใช้งาน</h2>
            <?php if ($stmt->rowCount() > 0) : ?>
                <div class="container mt-5">
                    <div class="row">
                        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo htmlspecialchars($row['first_name'] . " " . htmlspecialchars($row['last_name'])); ?></h5>
                                        <p class="card-text"><strong>อีเมล์:</strong><?php echo htmlspecialchars($row['email']); ?></p>
                                        <p class="card-text"><strong>เบอร์โทร:</strong><?php echo htmlspecialchars($row['phone']); ?></p>
                                        <p class="card-text"><strong>ที่อยู่:</strong><?php echo htmlspecialchars($row['address']); ?></p>
                                        <p class="card-text"><strong>วันที่สมัคร:</strong><?php echo htmlspecialchars($row['created_at']); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </section>
      </main>
    </div>
</body>
</html>