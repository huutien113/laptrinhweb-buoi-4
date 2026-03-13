<?php
require_once __DIR__ . '/../modules/product_by_category.php';
$dsLoai = getDanhSachLoai($conn);
?>

<ul class="main-menu">
    <li><a href="index_funs.php">Trang chủ</a></li>

    <?php foreach ($dsLoai as $loai): ?>
        <li>
            <a href="index_funs.php?maloai=<?php echo $loai['MaLoai']; ?>">
                <?php echo htmlspecialchars($loai['TenLoai']); ?>
            </a>
        </li>
    <?php endforeach; ?>

    <li><a href="#">Đăng ký</a></li>
    <li><a href="#">Giỏ hàng</a></li>
    <li><a href="#">Tin tức</a></li>
</ul>