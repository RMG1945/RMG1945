<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit();
}
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
            filter: blur(8px) brightness(0.6);
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
        <source src="https://motionbgs.com/media/340/speeding-black-mclaren-senna.960x540.mp4" type="video/mp4">

    </video>

    <?php include './components/header.php'; ?>

    <!-- Hero Section -->
    <section class="hero text-white text-center py-5" style="background: linear-gradient(to right,rgb(0, 0, 0),rgb(53, 56, 52)); height: 100vh;">
        <div class="container h-100 d-flex flex-column justify-content-center">
            <h1 class="display-4">Welcome ยินดีต้อนรับสู่จุดสตาร์ทรถในฝันของคุณ</h1>
            <p class="lead">สำรวจและเปรียบเทียบรถรุ่นล่าสุด พร้อมเทคโนโลยีที่เปลี่ยนอนาคตการขับขี่</p>
            <a href="#content" class="btn btn-light btn-lg mx-auto">เริ่มต้นตอนนี้</a>
        </div>
    </section>

    <!-- Content Section -->
    <section id="content" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">เกี่ยวกับเทคโนโลยีสารสนเทศ</h2>
            <p>
                เทคโนโลยีสารสนเทศ (Information Technology หรือ IT) คือการนำเทคโนโลยีมาใช้ในการจัดการข้อมูลและสารสนเทศ เพื่อเพิ่มประสิทธิภาพในการดำเนินงานของธุรกิจยานยนต์ 
                ไม่ว่าจะเป็นการพัฒนาซอฟต์แวร์ในรถยนต์ การเชื่อมต่อข้อมูลผ่านเครือข่าย หรือการรักษาความปลอดภัยของระบบอัจฉริยะภายในรถ.
            </p>
            <p>
                ในอุตสาหกรรมยานยนต์ยุคใหม่ IT มีบทบาทสำคัญในการพัฒนาแอปพลิเคชันควบคุมรถ ระบบคลาวด์ที่ซิงค์ข้อมูลแบบเรียลไทม์ 
                และการใช้ Big Data เพื่อวิเคราะห์พฤติกรรมการขับขี่ รวมถึงช่วยให้ผู้ผลิตสามารถปรับปรุงผลิตภัณฑ์และบริการได้อย่างแม่นยำ ตั้งแต่ระบบนำทางอัจฉริยะ ระบบช่วยขับขี่ ไปจนถึงรถยนต์ไฟฟ้าและไร้คนขับ 
                เทคโนโลยีสารสนเทศคือรากฐานสำคัญที่ขับเคลื่อนนวัตกรรมและยกระดับประสบการณ์ของผู้ใช้ในโลกยานยนต์ดิจิทัล.
            </p>
        </div>
    </section>

    <?php include './components/footer.php'; ?>
    <script>
        <?php if (isset($_GET['success']) && $_GET['success'] == 'true') : ?>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'You have signed in successfully!',
                footer: 'Go Away Teen'
            });
        <?php endif; ?>
    </script>
</body>

</html>