<?php
require '../../config.php';
// Không hiện warming và lỗi của database
// error_reporting(0);

//Kiểm tra Session đã bắt đầu hay chưa -> bắt đâu
if (session_id() == '') session_start();

// Kiểm tra xem người dùng có nhấn nút đăng nhập k?
if (isset($_POST['username'])) {

    // Lấy thông tin đăng nhập
    $username = trim($_POST['username']);
    $password = md5($_POST['password']);

    // Kết nối tới server
    $connect = new mysqli($server, $username_db, $password_db, $dbname);

    // Trường hợp đăng nhập sai
    if ($connect->connect_error) {
        // die("Không thể nối:" . $connect->connect_error);
        echo "Lỗi: Not Found Database";
        // Đăng nhập đúng
    } else {
        // Lấy tên người dùng
        $sqlcmd = "Select TENNV, position from users u join nhanvien t on u.user=t.sdt where (user=? and pass=?)";
        $stmt = $connect->prepare($sqlcmd);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $stmt->bind_result($fullName, $position);
        $stmt->fetch();
        // Nếu tài khoản mật khẩu đúng
        if ($fullName != null ) {
           // $_SESSION['fullName'] = $fullName;
            // echo $position;
            // Xem tài khoản thuộc đối tượng nào
            switch ($position) {
                
                    // Là thành viên
                case "1":
                    $_SESSION['position'] = "Thành viên";
                    break;
                    // Là nhân viên
                default:
                    $_SESSION['position'] = "Nhân viên";
                    break;
            }

            // Lưu dữ liệu vào session để làm việc khác
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;

            // Tạo cookie để lưu tên thành viên
            setcookie("abc", $fullName, 0, "/");

            // Thông báo thành công
            echo "ok";
        } else {
            echo "Thông tin tài khoản mật khẩu không chính xác";
        }

        // Đóng  kết nối
        $connect->close();
    }
} else {
    // Nếu người dùng truy cấp vào file này thì trả về trang chủ
    header("Location: ./");
}