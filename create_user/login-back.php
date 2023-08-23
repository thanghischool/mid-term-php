<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
require_once('./model/connect.php');

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = md5('$password')";
    $res = mysqli_query($conn, $sql);

    $rows = mysqli_num_rows($res);
    if ($rows > 0) {
        $_SESSION['username'] = $username; // Initializing Session,Khởi tạo Session cho username	
        while ($row = mysqli_fetch_assoc($res)) {
            $_SESSION['id-user'] = $row['id'];
        }
        echo "<script>alert('Bạn đã nhập đúng thông tin')</script>";
        exit();
    } else {
        $_SESSION['error'] = 'Tên đăng nhập hoặc mật khẩu không hợp lệ!';

        echo "<script>alert('Bạn đã nhập sai thông tin')</script>";

        exit();
    }
}
