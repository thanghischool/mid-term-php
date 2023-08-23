<?php

require_once('../model/connect.php');


$target_dir = "images/";
$target_file = '';
$notimage = '';

if (isset($_POST['category'])) {
    $category = $_POST['category'];

    if ($category == "1") {
        $target_file = $target_dir . "fashion_boy/" . basename($_FILES["FileImage"]["name"]);
    } elseif ($category == "2") {
        $target_file = $target_dir . "fashion_girl/" . basename($_FILES["FileImage"]["name"]);
    } elseif ($category == "3") {
        $target_file = $target_dir . "hangmoive/" . basename($_FILES["FileImage"]["name"]);
    }
}


$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Kiểm tra xem tệp tin đã chọn có phải là hình ảnh không
if (isset($_POST["addProduct"])) {
    $check = getimagesize($_FILES["FileImage"]["tmp_name"]);
    if ($check === false) {
        $notimage = "File không phải là hình ảnh.";
        $uploadOk = 0;
        echo "File không phải là hình ảnh.";
    }
}

// Kiểm tra xem tệp tin đã tồn tại chưa
if (file_exists($target_file)) {
    $notimage = "Xin lỗi, tệp tin đã tồn tại.";
    $uploadOk = 0;
    echo "Xin lỗi, tệp tin đã tồn tại.";
}

// Kiểm tra kích thước tệp tin
if ($_FILES["FileImage"]["size"] > 5000000) {
    $notimage = "Xin lỗi, tệp tin của bạn quá lớn.";
    $uploadOk = 0;
    echo "Xin lỗi, tệp tin của bạn quá lớn.";
}

// Cho phép các định dạng tệp tin nhất định
if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
) {
    $notimage = "Xin lỗi, chỉ có tệp tin JPG, JPEG, PNG & GIF được chấp nhận.";
    $uploadOk = 0;
    echo "Xin lỗi, chỉ có tệp tin JPG, JPEG, PNG & GIF được chấp nhận.";
}



if ($uploadOk == 0) {
    echo "Xin lỗi, tệp tin của bạn không được tải lên.";
} else {
    if (move_uploaded_file($_FILES["FileImage"]["tmp_name"], $target_file)) {
        echo "Tệp " . htmlspecialchars(basename($_FILES["FileImage"]["name"])) . " đã được tải lên thành công.";
    } else {
        echo "Xin lỗi, đã có lỗi khi tải lên tệp tin.";
    }
}

if (isset($_POST['txtName'])) {
    $namePr = $_POST['txtName'];
}

if (isset($_POST['category'])) {
    $categoryPr = '';
    if (strtolower($_POST['category']) == "thời trang nam") {
        $categoryPr = 1;
    } else  if (strtolower($_POST['category']) == "thời trang nữ") {
        $categoryPr = 2;
    } else {
        $categoryPr = 3;
    }
}

if (isset($_POST['txtPrice'])) {
    $pricePr = $_POST['txtPrice'];
}

if (isset($_POST['txtSalePrice'])) {
    $salePricePr = $_POST['txtSalePrice'];
}

if (isset($_POST['txtNumber'])) {
    $quantityPr = $_POST['txtNumber'];
}

if (isset($_POST['txtKeyword'])) {
    $keywordPr = $_POST['txtKeyword'];
}

if (isset($_POST['txtDescript'])) {
    $descriptPr = $_POST['txtDescript'];
}



// Thực hiện truy vấn
$sql = "INSERT INTO products(name, category_id, image, description, price, saleprice, created, quantity,  keyword) 
            VALUES('$namePr', '$categoryPr', '$target_file', '$descriptPr', '$pricePr', '$salePricePr', NOW(), '$quantityPr', '$keywordPr');";
$result = mysqli_query($conn, $sql);

if ($result) {
    header("Location: ../index (1).php");
} else {
    // Nếu có lỗi thêm sản phẩm, bạn có thể xử lý theo ý muốn ở đây
}
