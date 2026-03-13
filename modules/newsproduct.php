<?php
function getTinMoiNhat($conn, $n = 5)
{
	$limit = (int)$n;
	if ($limit <= 0) {
		$limit = 5;
	}

	$sql = "SELECT id, tieuDe, NoiDung FROM tintuc ORDER BY id DESC LIMIT $limit";
	$result = mysqli_query($conn, $sql);

	$dsTin = [];
	if ($result) {
		while ($row = mysqli_fetch_assoc($result)) {
			$dsTin[] = $row;
		}
	}

	return $dsTin;
}
