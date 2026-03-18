<?php
$conn = mysqli_connect("localhost", "root", "", "quanly_shop");
if (!$conn) {
    die("Loi ket noi CSDL: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8");

require_once __DIR__ . '/modules/newsproduct.php';

$idTinTuc = isset($_GET['idTinTuc']) ? (int)$_GET['idTinTuc'] : 0;
$tinChiTiet = getChiTietTinTheoId($conn, $idTinTuc);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiet tin tuc</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include "includes/top.php"; ?>

    <div class="page-layout">
        <div class="orange-content">
            <?php if ($tinChiTiet === null): ?>
                <h2>Khong tim thay tin tuc</h2>
                <p>Tin ban can xem khong ton tai hoac idTinTuc khong hop le.</p>
            <?php else: ?>
                <h2><?php echo htmlspecialchars($tinChiTiet['tieuDe']); ?></h2>
                <div class="news-detail-body">
                    <?php echo nl2br(htmlspecialchars((string)$tinChiTiet['NoiDung'])); ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="right-column">
            <?php include "includes/right.php"; ?>
        </div>
    </div>
</body>
</html>
