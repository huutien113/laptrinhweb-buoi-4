<?php
function getSanPhamMoiNhat($conn, $n = 5)
{
    $limit = (int)$n;
    if ($limit <= 0) {
        $limit = 5;
    }

    $sql = "SELECT id, ten, gia, hinh FROM sanpham ORDER BY id DESC LIMIT $limit";
    $result = mysqli_query($conn, $sql);

    $dsSanPham = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $dsSanPham[] = $row;
        }
    }

    return $dsSanPham;
}

function getChiTietSanPhamTheoId($conn, $idSanPham)
{
    $id = (int)$idSanPham;
    if ($id <= 0) {
        return null;
    }

    $sql = "SELECT id, ten, gia, hinh, moTa, loai FROM sanpham WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    }

    return null;
}
