    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
         <html lang="th">
<head>
    ...
    <style>
        body {
            font-family: 'Kanit', sans-serif;
            background: linear-gradient(135deg, red, orange, yellow, green, cyan, blue, violet);
            background-size: 400% 400%;
            animation: rainbow 10s ease infinite;
        }

        @keyframes rainbow {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .card {
            background-color: rgba(255, 255, 255, 0.8);
            border: none;
            border-radius: 1rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        h2 {
            color: white;
            text-shadow: 2px 2px 4px #000;
        }
    </style>
</head>

    </head>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <body>
        <?php include 'controls/fetchUser.php' ?>
        <section id="fetch_product" class="py-5">
            <div class="container">
                <h2 class="mb-4">แสดงข้อมูลสินค้า</h2>
                <?php if ($stmt->rowCount() > 0) : ?>
                    <div class="container mt-5">
                        <div class="row">
                            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                                <div class="col-md-4 mb-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo htmlspecialchars($row['product_name']); ?></h5>
                                            <p class="card-text"><strong>รายละเอียด:</strong> <?php echo htmlspecialchars($row['description']); ?></p>
                                            <p class="card-text"><strong>ราคา:</strong> ฿<?php echo number_format($row['price'], 2); ?></p>
                                            <p class="card-text"><strong>วันที่เพิ่มสินค้า:</strong> <?php echo htmlspecialchars($row['created_at']); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php endif ?>
            </div>
        </section>
    </body>

    </html>