<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


</head>

<body>

</body>

</html>
<?php
require_once("model/connect.php");
?>

<?php
$sql = "SELECT * FROM products WHERE id =  '" . $_GET['id'] . "'";
$result  = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) {
?>
    <div class="detail-product" style="width: 40%; display: flex; justify-content:space-between">
        <div class="image">
            <img src="<?php echo $row['image'] ?>" alt="">
        </div>
        <div class="inf">
            <h1><?php echo $row['name'] ?></h1>
            <p>Giá sản phẩm <?php echo $row['price'] ?></p>
            <input style="background-color: yellow; color:black" type="button" value="Đặt mua">
            <p><i class="bi bi-check-circle-fill"></i>Giao hàng nhanh toàn quốc</p>
            <p><i class="bi bi-check-circle-fill"></i>Thanh toán khi nhận hàng</p>
            <p><i class="bi bi-check-circle-fill"></i>Đổi hàng trong 15 ngày</p>
        </div>
    </div>
<?php } ?>