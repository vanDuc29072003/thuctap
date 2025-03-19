<?php
include 'connect.php';

if (isset($_GET['id'])) {
    $MaLinhKien = $_GET['id'];

    // Chuẩn bị câu lệnh SQL để xóa
    $sql = "DELETE FROM linhkiensuachua WHERE MaLinhKien = :MaLinhKien";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':MaLinhKien', $MaLinhKien, PDO::PARAM_INT);

    if ($stmt->execute()) {
        // Xóa thành công, quay lại danh sách
        header("Location:linhkien.php");
        exit();
    } else {
        // Xóa thất bại, báo lỗi
        header("Location: linhkien.php?error=delete_failed");
        exit();
    }
} else {
    // Không có ID, quay lại danh sách
    header("Location: linhkien.php?error=no_id");
    exit();
}
?>
ưư