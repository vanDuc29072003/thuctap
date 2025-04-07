<?php
session_start();
if (!isset($_SESSION['TenNhanVien'])) {
    header('Location: login.php');
    exit();
}
include 'connect.php';
if (!isset($_GET['MaLinhKien']) || empty($_GET['MaLinhKien'])) {
    die("Mã linh kiện không hợp lệ.");
}
$MaLinhKien = $_GET['MaLinhKien'];
$sql = "SELECT lk.*, dvt.TenDonViTinh, ncc.TenNhaCungCap 
        FROM linhkiensuachua lk
        LEFT JOIN donvitinh dvt ON lk.MaDonViTinh = dvt.MaDonViTinh
        LEFT JOIN nhacungcap ncc ON lk.MaNhaCungCap = ncc.MaNhaCungCap
        WHERE lk.MaLinhKien = :MaLinhKien";
$stmt = $conn->prepare($sql);
$stmt->execute(['MaLinhKien' => $_GET['MaLinhKien']]);
$linhkien = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$linhkien) {
    die("Không tìm thấy linh kiện có Mã = $MaLinhKien");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta charset="UTF-8" />
    <title>CTY TNHH IN T.KHOA</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="assets/img/logo.png" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: { "families": ["Public Sans:300,400,500,600,700"] },
            custom: { "families": ["Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['assets/css/fonts.min.css'] },
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/kaiadmin.min.css" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="assets/css/demo.css" />
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar" data-background-color="dark">
            <div class="sidebar-logo">
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="dark">
                    <a href="index.php" class="logo">
                        <img src="assets/img/logo.png" alt="navbar brand" class="navbar-brand" height="50" />
                    </a>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar">
                            <i class="gg-menu-right"></i>
                        </button>
                        <button class="btn btn-toggle sidenav-toggler">
                            <i class="gg-menu-left"></i>
                        </button>
                    </div>
                    <button class="topbar-toggler more">
                        <i class="gg-more-vertical-alt"></i>
                    </button>
                </div>
                <!-- End Logo Header -->
            </div>
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-secondary">
                        <li class="nav-item ">
                            <a href="index.php" class="collapsed" aria-expanded="false">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a data-bs-toggle="collapse" href="#phancong">
                                <i class="fa-solid fa-calendar-days"></i>
                                <p>Phân công</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="phancong">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="lichvanhanh.html">
                                            <span class="sub-item">Lịch vận hành</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="lichbaotri.html">
                                            <span class="sub-item">Lịch bảo trì</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="lichsuachua.html">
                                            <span class="sub-item">Lịch sửa chữa</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <a href="yeucau.html" class="collapsed" aria-expanded="false">
                                <i class="fa-solid fa-hammer"></i>
                                <p>Yêu cầu sửa chữa</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="may.php" class="collapsed" aria-expanded="false">
                                <i class="fa-solid fa-sliders"></i>
                                <p>Danh sách máy</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="linhkien.php" class="collapsed" aria-expanded="false">
                                <i class="fa-solid fa-gears"></i>
                                <p>Danh sách linh kiện</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#submenu">
                                <i class="fa-solid fa-clipboard-list"></i>
                                <p>Lập phiếu</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="submenu">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="phieubangiao.html">
                                            <span class="sub-item">Phiếu bàn giao</span>
                                        </a>

                                    </li>
                                    <li>
                                        <a href="phieunhap.html">
                                            <span class="sub-item">Phiếu nhập kho</span>
                                        </a>

                                    </li>
                                    <li>
                                        <a href="phieuxuat.html">
                                            <span class="sub-item">Phiếu xuất kho</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <a data-bs-toggle="collapse" href="#admin">
                                <i class="fa-solid fa-users"></i>
                                <p>Quản trị viên</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="admin">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="taikhoan.html">
                                            <span class="sub-item">Danh sách tài khoản</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <a href="logout.php" class="collapsed" aria-expanded="false">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                <p>Đăng xuất</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="main-header">
                <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
                    <div class="container-fluid">
                        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                            <li class="nav-item topbar-icon">
                                <a class="nav-link nav-link-icon" href="#">
                                    <i class="fa-solid fa-envelope-open">
                                        <span class="notification">4</span>
                                    </i>
                                </a>
                            </li>
                            <li class="nav-item topbar-icon">
                                <a class="nav-link nav-link-icon" href="#">
                                    <i class="fa-solid fa-user-gear"></i>
                                </a>
                            </li>
                            <li class="nav-item topbar-icon">
                                <b class="ms-2">Xin chào, <?php echo $_SESSION['TenNhanVien'] ?></b>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="container">
                <div class="page-inner">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="m-3">Thông Tin Linh Kien</h1>
                        </div>
                        <div class="card-body p-5">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <th scope="row">Mã Linh Kiện</th>
                                        <td><?php echo htmlspecialchars($linhkien['MaLinhKien']); ?></td>
                                        <th scope="row">Nhà Cung Cấp</th>
                                        <td><?php echo htmlspecialchars($linhkien['TenNhaCungCap']); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tên Linh Kiện</th>
                                        <td><?php echo htmlspecialchars($linhkien['TenLinhKien']); ?></td>
                                        <th scope="row">Giá Thành</th>
                                        <td><?php echo number_format($linhkien['GiaThanh'], 0, ',', '.') ?> VNĐ</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Số Lượng</th>
                                        <td><?php echo htmlspecialchars($linhkien['SoLuong']); ?></td>
                                        <th scope="row">Mô Tả</th>
                                        <td><?php echo htmlspecialchars($linhkien['MoTa']); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Đơn Vị Tính</th>
                                        <td><?php echo htmlspecialchars($linhkien['TenDonViTinh']); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <!-- Nút quay lại -->
                            <div class="m-3">
                                <a href="may.php" class="btn btn-secondary">
                                    <i class="fa fa-arrow-left"></i> Quay lại
                                </a>
                                <a href="updatelinhkien.php?MaLinhKien=<?php echo $linhkien['MaLinhKien']; ?>"
                                    class="btn btn-warning mx-3">
                                    <i class="fa fa-edit"></i> Sửa
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Panel -->
    <!--   Core JS Files   -->
    <script src="assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>



    <!-- jQuery Scrollbar -->
    <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Chart JS -->
    <script src="assets/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="assets/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- jQuery Vector Maps -->
    <script src="assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
    <script src="assets/js/plugin/jsvectormap/world.js"></script>

    <!-- Google Maps Plugin -->
    <script src="assets/js/plugin/gmaps/gmaps.js"></script>

    <!-- Sweet Alert -->
    <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Kaiadmin JS -->
    <script src="assets/js/kaiadmin.min.js"></script>
</body>

</html>