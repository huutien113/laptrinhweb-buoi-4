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

function getChiTietTinTheoId($conn, $idTinTuc)
{
	$id = (int)$idTinTuc;
	if ($id <= 0) {
		return null;
	}

	$sql = "SELECT id, tieuDe, NoiDung FROM tintuc WHERE id = $id LIMIT 1";
	$result = mysqli_query($conn, $sql);

	if ($result && mysqli_num_rows($result) > 0) {
		return mysqli_fetch_assoc($result);
	}

	return null;
}
