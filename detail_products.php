<?php
$conn = mysqli_connect("localhost", "root", "", "quanly_shop");
if (!$conn) {
    die("Loi ket noi CSDL: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8");

require_once __DIR__ . '/modules/newproducts.php';

$idSanPham = isset($_GET['idSanPham']) ? (int)$_GET['idSanPham'] : 0;
$chiTietSanPham = getChiTietSanPhamTheoId($conn, $idSanPham);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiet san pham</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include "includes/top.php"; ?>

    <div class="page-layout">
        <div class="orange-content">
            <?php if ($chiTietSanPham === null): ?>
                <h2>Khong tim thay san pham</h2>
                <p>San pham ban can xem khong ton tai hoac idSanPham khong hop le.</p>
            <?php else: ?>
                <h2><?php echo htmlspecialchars($chiTietSanPham['ten']); ?></h2>

                <div class="detail-product-box">
                    <div class="detail-product-image">
                        <?php if (!empty($chiTietSanPham['hinh'])): ?>
                            <img src="assets/images/<?php echo htmlspecialchars($chiTietSanPham['hinh']); ?>" alt="<?php echo htmlspecialchars($chiTietSanPham['ten']); ?>">
                        <?php else: ?>
                            <span>Khong co hinh</span>
                        <?php endif; ?>
                    </div>

                    <div class="detail-product-info">
                        <p class="detail-product-price"><?php echo number_format((float)$chiTietSanPham['gia'], 0, ',', '.'); ?> VND</p>
                        <div class="detail-product-desc">
                            <?php echo nl2br(htmlspecialchars((string)$chiTietSanPham['moTa'])); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="right-column">
            <?php include "includes/right.php"; ?>
        </div>
    </div>
</body>
</html>
