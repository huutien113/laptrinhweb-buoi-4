<?php
$conn = mysqli_connect("localhost", "root", "", "quanly_shop");
if (!$conn) {
    die("Loi ket noi CSDL: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8");

require_once __DIR__ . '/modules/product_by_category.php';
$dsNhomNoiBat = getNhomNoiBat($conn);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>San pham theo nhom noi bat</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include "includes/top.php"; ?>

    <div class="hot-products-wrap">
        <h2>Nhom san pham noi bat</h2>

        <?php if (empty($dsNhomNoiBat)): ?>
            <p>Chua co nhom noi bat.</p>
        <?php else: ?>
            <?php foreach ($dsNhomNoiBat as $nhom): ?>
                <?php $dsSanPham = getSanPhamMoiNhatTheoNhomNoiBat($conn, $nhom['MaLoai'], 5); ?>
                <section class="hot-group-block">
                    <h3 class="hot-group-title"><?php echo htmlspecialchars($nhom['TenLoai']); ?></h3>

                    <?php if (empty($dsSanPham)): ?>
                        <p>Chua co san pham trong nhom nay.</p>
                    <?php else: ?>
                        <div class="hot-products-grid">
                            <?php foreach ($dsSanPham as $sp): ?>
                                <div class="product-card">
                                    <div class="product-image">
                                        <?php if (!empty($sp['hinh'])): ?>
                                            <a href="detail_products.php?idSanPham=<?php echo (int)$sp['id']; ?>">
                                                <img src="assets/images/<?php echo htmlspecialchars($sp['hinh']); ?>" alt="<?php echo htmlspecialchars($sp['ten']); ?>">
                                            </a>
                                        <?php else: ?>
                                            <span>Khong co hinh</span>
                                        <?php endif; ?>
                                    </div>

                                    <h4 class="product-name">
                                        <a class="product-link" href="detail_products.php?idSanPham=<?php echo (int)$sp['id']; ?>">
                                            <?php echo htmlspecialchars($sp['ten']); ?>
                                        </a>
                                    </h4>
                                    <p class="product-price"><?php echo number_format((float)$sp['gia'], 0, ',', '.'); ?> VND</p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </section>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>
</html>
