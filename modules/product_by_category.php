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