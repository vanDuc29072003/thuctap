<?php
session_start();
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $MaNhanVien = $_POST['MaNhanVien'];
        $MatKhau = $_POST['MatKhau'];

        $sql = "SELECT * FROM taikhoan WHERE MaNhanVien = :MaNhanVien AND MatKhau = :MatKhau";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':MaNhanVien', $MaNhanVien);
        $stmt->bindParam(':MatKhau', $MatKhau);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $sql = "SELECT * FROM nhanvien WHERE MaNhanVien = :MaNhanVien";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':MaNhanVien', $MaNhanVien);
            $stmt->execute();
            $NhanVien = $stmt->fetch(PDO::FETCH_ASSOC);

            $_SESSION['TenNhanVien'] = $NhanVien['TenNhanVien'];
            $_SESSION['MaBoPhan'] = $NhanVien['MaBoPhan'];
            header('Location: index.php');
            exit;
        } else {
            $_SESSION['error'] = "Sai Mã nhân viên hoặc Mật khẩu";
            header('Location: login.php');
            exit;
        }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta charset="UTF-8" />
    <title>Đăng nhập</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta...in.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/kaiadmin.min.css" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="assets/css/demo.css" />
</head>

<body>
    <div class="wrapper">
        <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
            <div class="card w-auto">
                <div class="row">
                    <div class="col-6">
                        <img src="assets/img/login-img.jpg" alt="anh" class="img-fluid"
                            style="border-radius: 1rem;height: 65vh;" />
                    </div>
                    <div class="col-6 d-flex justify-content-center align-items-center text-center">
                        <div>
                            <div class="card-header d-flex justify-content-center align-items-center">
                                <img src="assets/img/logo.png" alt="navbar brand" class="navbar-brand m-3"
                                    height="40" />
                                <h1 class="card-title">Đăng Nhập</h1>
                            </div>
                            <div class="card-body">
                                <form method="POST">
                                    <div class="form-group text-start">
                                        <label>Mã nhân viên</label>
                                        <input type="text" class="form-control" id="manhanvien" name="MaNhanVien"
                                            placeholder="Nhập mã nhân viên" required>
                                    </div>
                                    <div class="form-group text-start">
                                        <label>Mật khẩu</label>
                                        <input type="password" class="form-control" name="MatKhau" id="matkhau"
                                            placeholder="Mật khẩu" required>
                                    </div>
                                    <div class="form-group mt-4">
                                        <button type="submit" name="submit" class="btn btn-primary">Đăng nhập</button>
                                    </div>
                                </form>
                            </div>
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
        <?php if (!empty($_SESSION['error'])): ?>
            $.notify({
                title: 'Lỗi',
                message: '<?php echo $_SESSION['error']; ?>',
                icon: 'icon-bell'
            },{
                type: 'danger',
                animate: {
                    enter: 'animated shake',
                    exit: 'animated fadeOutUp'
                },
            });
            <?php unset($_SESSION['error']) ?>
        <?php endif; ?>
    </script>

</body>

</html>