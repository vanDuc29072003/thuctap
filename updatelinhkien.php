<?php
session_start();
if (!isset($_SESSION['TenNhanVien'])) {
    header('Location: login.php');
}
include 'connect.php';

if (!isset($_GET['MaLinhKien'])) {
  die("Thiếu tham số MaLinhKien trên URL");
}
$MaLinhKien = $_GET['MaLinhKien'];

// 2. Lấy dữ liệu cũ của máy từ bảng `linhkiensuachua` theo `MaLinhKien`
$sql = "
  SELECT 
      lk.*, 
      dvt.TenDonViTinh, 
      ncc.TenNhaCungCap
  FROM linhkiensuachua lk
  LEFT JOIN donvitinh dvt ON lk.MaDonViTinh = dvt.MaDonViTinh
  LEFT JOIN nhacungcap ncc ON lk.MaNhaCungCap = ncc.MaNhaCungCap  WHERE MaLinhKien = :MaLinhKien LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->execute(['MaLinhKien' => $MaLinhKien]);
$linhkien = $stmt->fetch(PDO::FETCH_ASSOC);

// Nếu không tìm thấy máy, báo lỗi
if (!$linhkien) {
  die("Không tìm thấy linh kiện có Mã = $MaLinhKien");
}
if (isset($_GET['success']) && $_GET['success'] == 1) {
  $error1 = "Cập nhật thông tin linh kiện thành công";
}

// 3. Nếu người dùng nhấn nút cập nhật (method=POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
  $TenLinhKien = $_POST['TenLinhKien'];
  $MoTa = $_POST['MoTa'];
  $GiaThanh = $_POST['GiaThanh'];
  $SoLuong = $_POST['SoLuong'];
  $MaDonViTinh = $_POST['MaDonViTinh'];
  $MaNhaCungCap = $_POST['MaNhaCungCap'];

  $sqlUpdate = "UPDATE linhkiensuachua SET
      TenLinhKien = :TenLinhKien,
      MoTa = :MoTa,
      GiaThanh = :GiaThanh,
      SoLuong = :SoLuong,
      MaDonViTinh = :MaDonViTinh,
      MaNhaCungCap = :MaNhaCungCap
  WHERE MaLinhKien = :MaLinhKien";

  $stmtUpdate = $conn->prepare($sqlUpdate);
  $stmtUpdate->bindParam(':MaLinhKien', $MaLinhKien);
  $stmtUpdate->bindParam(':TenLinhKien', $TenLinhKien);
  $stmtUpdate->bindParam(':MoTa', $MoTa);
  $stmtUpdate->bindParam(':GiaThanh', $GiaThanh);
  $stmtUpdate->bindParam(':SoLuong', $SoLuong);
  $stmtUpdate->bindParam(':MaDonViTinh', $MaDonViTinh);
  $stmtUpdate->bindParam(':MaNhaCungCap', $MaNhaCungCap);

  if ($stmtUpdate->execute()) {
      header("Location: updatelinhkien.php?MaLinhKien=$MaLinhKien&success=1");
      exit();
  } else {
      $error1 = "Cập nhật thất bại!";
  }
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
              <a href="logout.php" id="btn-logout" class="collapsed" aria-expanded="false">
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
                <b class="ms-2">Xin chào, <?php echo $_SESSION['TenNhanVien']?></b>
              </li>
            </ul>
          </div>
        </nav>
      </div>
      <div class="container">
        <div class="page-inner">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <!-- Cột 1 -->
                <div class="col-md-6">
                  <h1>Chỉnh sửa thông tin linh kiện</h1>
                </div>
                <div class="col-md-6">
                  <?php if (!empty($error1)): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong><?php echo $error1; ?></strong>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form method="POST">
                <div class="row">
                  <!-- Cột 1 -->
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="TenLinhKien">Tên Linh Kiện</label>
                      <input type="text" class="form-control" id="TenLinhKien" name="TenLinhKien"
                        value="<?php echo htmlspecialchars($linhkien['TenLinhKien']); ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="MaNhaCungCap">Nhà Cung Cấp</label>
                      <select class="form-control" id="MaNhaCungCap" name="MaNhaCungCap" required>
                        <?php
                        $sqlNhaCungCap = "SELECT * FROM nhacungcap";
                        $stmtNhaCungCap = $conn->prepare($sqlNhaCungCap);
                        $stmtNhaCungCap->execute();
                        $nhaCungCaps = $stmtNhaCungCap->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($nhaCungCaps as $nhaCungCap): ?>
                          <option value="<?php echo $nhaCungCap['MaNhaCungCap']; ?>" 
                            <?php echo $nhaCungCap['MaNhaCungCap'] == $linhkien['MaNhaCungCap'] ? 'selected' : ''; ?>>
                            <?php echo $nhaCungCap['TenNhaCungCap']; ?>
                          </option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <!-- Cột 2 -->
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="SoLuong">Số Lượng</label>
                      <input type="number" class="form-control" id="SoLuong" name="SoLuong"
                        value="<?php echo htmlspecialchars($linhkien['SoLuong']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="MaDonViTinh">Đơn Vị Tính</label>
                        <select class="form-control" id="MaDonViTinh" name="MaDonViTinh" required>
                          <?php
                          // Truy vấn danh sách đơn vị tính
                          $sqlDonViTinh = "SELECT * FROM donvitinh";
                          $stmtDonViTinh = $conn->prepare($sqlDonViTinh);
                          $stmtDonViTinh->execute();
                          $donViTinhs = $stmtDonViTinh->fetchAll(PDO::FETCH_ASSOC);

                          foreach ($donViTinhs as $donViTinh): ?>
                            <option value="<?php echo $donViTinh['MaDonViTinh']; ?>" 
                              <?php echo $donViTinh['MaDonViTinh'] == $linhkien['MaDonViTinh'] ? 'selected' : ''; ?>>
                              <?php echo $donViTinh['TenDonViTinh']; ?>
                            </option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                  <!-- Cột 3 -->
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="GiaThanh">Giá Thành</label>
                      <div class="input-group">
                        <input type="number" class="form-control" id="GiaThanh" name="GiaThanh"
                          value="<?php echo htmlspecialchars($linhkien['GiaThanh']); ?>" required>
                        <span class="input-group-text">VNĐ</span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="MoTa">Mô Tả</label>
                      <textarea class="form-control" id="MoTa" name="MoTa" rows="3" required><?php echo htmlspecialchars($linhkien['MoTa']); ?></textarea>
                    </div>
                  </div>
                  <div class="form-group mt-4">
                    <button type="submit" name="update" class="btn btn-primary">
                      <i class="fa fa-save"></i> Cập nhật
                    </button>
                    <a href="linhkien.php" class="btn btn-secondary">Trở lại</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


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
  <script>
      document.getElementById('btn-logout').addEventListener('click', function(event) {
          event.preventDefault();
          var logout = confirm("Bạn có chắc chắn muốn đăng xuất?");
          if (logout) {
              window.location.href = 'logout.php';
          }
      });
  </script>
</body>

</html>