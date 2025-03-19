<?php
session_start();
include 'connect.php'; // Kết nối database

function hasPermission($MaBoPhan,$TenPhanQuyen, $conn) {
    $stmt = $conn->prepare("
        SELECT COUNT(*) FROM phanquyen 
        WHERE MaBoPhan = ? AND TenPhanQuyen = ?
    ");
    $stmt->execute([$MaBoPhan, $TenPhanQuyen]);
    return $stmt->fetchColumn() > 0;
}

function requirePermission($TenPhanQuyen, $conn) {
    
    if (!hasPermission($_SESSION['MaBoPhan'], $TenPhanQuyen, $conn)) {
        $_SESSION['errorPermission'] = "Bạn không có quyền truy cập trang này"; 
        if (isset($_SERVER['HTTP_REFERER'])) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } else {
            // Nếu không có trang trước đó, chuyển hướng về trang chủ
            header("Location: index.php");
        }
        
        exit;
    }
}
?>