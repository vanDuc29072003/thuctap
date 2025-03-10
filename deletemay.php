<?php
include 'connect.php';

if (isset($_GET['id'])) {
    $MaMay = $_GET['id'];

    // Chuẩn bị câu lệnh SQL để xóa
    $sql = "DELETE FROM may WHERE MaMay = :MaMay";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':MaMay', $MaMay, PDO::PARAM_INT);

    if ($stmt->execute()) {
        // Xóa thành công, quay lại danh sách
        header("Location:may.php");
        exit();
    } else {
        // Xóa thất bại, báo lỗi
        header("Location: danh_sach_may.php?error=delete_failed");
        exit();
    }
} else {
    // Không có ID, quay lại danh sách
    header("Location: danh_sach_may.php?error=no_id");
    exit();
}
?>
