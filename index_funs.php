<?php
$conn = mysqli_connect("localhost", "root", "", "quanly_shop");
if (!$conn) {
    die("Loi ket noi CSDL: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8");

require_once __DIR__ . '/modules/newproducts.php';
require_once __DIR__ . '/modules/product_by_category.php';

$dsSanPhamMoi = getSanPhamMoiNhat($conn, 5);
$dsNhomNoiBat = getNhomNoiBat($conn);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chu</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="home-wrapper">
        <h1 class="home-title">Giao dien trang chu</h1>

        <div class="home-board">
            <div class="home-top-area">
                <?php include "includes/top.php"; ?>
            </div>

            <h2 class="home-section-title">San pham moi nhat</h2>
            <div class="home-new-products">
                <?php if (empty($dsSanPhamMoi)): ?>
                    <p>Chua co san pham moi.</p>
                <?php else: ?>
                    <div class="home-products-grid">
                        <?php foreach ($dsSanPhamMoi as $sp): ?>
                            <article class="product-card">
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
                            </article>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="home-main-layout">
                <div class="home-left-orange">
                    <?php if (empty($dsNhomNoiBat)): ?>
                        <p>Chua co nhom san pham noi bat.</p>
                    <?php else: ?>
                        <?php foreach ($dsNhomNoiBat as $nhom): ?>
                            <?php $dsSanPhamTheoNhom = getSanPhamMoiNhatTheoNhomNoiBat($conn, $nhom['MaLoai'], 5); ?>
                            <section class="home-hot-group">
                                <h3 class="home-hot-group-title"><?php echo htmlspecialchars($nhom['TenLoai']); ?></h3>

                                <?php if (empty($dsSanPhamTheoNhom)): ?>
                                    <p>Chua co san pham trong nhom nay.</p>
                                <?php else: ?>
                                    <div class="home-products-grid">
                                        <?php foreach ($dsSanPhamTheoNhom as $sp): ?>
                                            <article class="product-card">
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
                                            </article>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </section>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <aside class="home-right-green">
                    <?php include "includes/right.php"; ?>
                </aside>
            </div>
        </div>
    </div>
</body>
</html>