<?php
function getDanhSachLoai($conn)
{
    $sql = "SELECT id AS MaLoai, ten AS TenLoai FROM loai ORDER BY thuTu ASC, ten ASC";
    $result = mysqli_query($conn, $sql);

    $dsLoai = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $dsLoai[] = $row;
        }
    }

    return $dsLoai;
}

function getNhomNoiBat($conn)
{
    $sql = "SELECT id AS MaLoai, ten AS TenLoai FROM loai WHERE noiBat = 1 ORDER BY thuTu ASC, ten ASC";
    $result = mysqli_query($conn, $sql);

    $dsNhomNoiBat = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $dsNhomNoiBat[] = $row;
        }
    }

    return $dsNhomNoiBat;
}

function getSanPhamMoiNhatTheoNhomNoiBat($conn, $idLoai, $n = 5)
{
    $maLoai = (int)$idLoai;
    $limit = (int)$n;

    if ($maLoai <= 0) {
        return [];
    }

    if ($limit <= 0) {
        $limit = 5;
    }

    $sql = "SELECT id, ten, gia, hinh FROM sanpham WHERE loai = $maLoai ORDER BY id DESC LIMIT $limit";
    $result = mysqli_query($conn, $sql);

    $dsSanPham = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $dsSanPham[] = $row;
        }
    }

    return $dsSanPham;
}