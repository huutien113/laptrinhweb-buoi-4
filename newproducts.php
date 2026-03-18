<?php
$conn = mysqli_connect("localhost", "root", "", "quanly_shop");
if (!$conn) {
    die("Loi ket noi CSDL: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8");

require_once __DIR__ . '/modules/newproducts.php';
$dsSanPhamMoi = getSanPhamMoiNhat($conn, 5);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>San pham moi nhat</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include "includes/top.php"; ?>

    <div class="new-products-wrap">
        <h2>San pham moi nhat</h2>

        <?php if (empty($dsSanPhamMoi)): ?>
            <p>Chua co san pham.</p>
        <?php else: ?>
            <div class="new-products-grid">
                <?php foreach ($dsSanPhamMoi as $sp): ?>
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

                        <h3 class="product-name">
                            <a class="product-link" href="detail_products.php?idSanPham=<?php echo (int)$sp['id']; ?>">
                                <?php echo htmlspecialchars($sp['ten']); ?>
                            </a>
                        </h3>
                        <p class="product-price"><?php echo number_format((float)$sp['gia'], 0, ',', '.'); ?> VND</p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
