<?php
require_once __DIR__ . '/../modules/newsproduct.php';
$dsTinMoi = getTinMoiNhat($conn, 5);
?>

<div class="right-news">
	<h3>Tin moi nhat</h3>

	<?php if (empty($dsTinMoi)): ?>
		<p>Chua co tin tuc.</p>
	<?php else: ?>
		<ul>
			<?php foreach ($dsTinMoi as $tin): ?>
				<li>
					<a href="detail_news.php?idTinTuc=<?php echo (int)$tin['id']; ?>">
						<?php echo htmlspecialchars($tin['tieuDe']); ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
</div>
