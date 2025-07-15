<?php
include 'db.php';

if($_SERVER['REQUEST_METHOD'] == 'post'){
    $depart_name = $_POST['depart_name'];

    $stmt ="INSERT INTO department (depart_name) VALUES (?, ?, ?, ?, ?, ?,)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $depart_name,

    ]);
}
?>