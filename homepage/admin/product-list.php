<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</head>

<body>

    <?php
	require_once("../model/connect.php");
	error_reporting(2);

	?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Thêm sản phẩm </h1>
                </div><!-- /.col-lg-12 -->

                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="productadd-back.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label> Tên sản phẩm </label>
                            <input type="text" class="form-control" name="txtName" placeholder="Nhập tên sản phẩm"
                                required />
                        </div>
                        <!-- //Tên sản phẩm -->

                        <div class="form-group">
                            <label> Danh mục sản phẩm </label>
                            <select class="form-control" name="category">
                                <?php
								$sql = "SELECT * FROM categories";
								$result = mysqli_query($conn, $sql);
								if ($result) {
									while ($row = mysqli_fetch_assoc($result)) {
								?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                <?php
									}
								}
								?>
                            </select>
                        </div>
                        <!-- //Danh mục sản phẩm -->

                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label> Giá sản phẩm </label>
                                    <input type="number" class="form-control" name="txtPrice"
                                        placeholder="Nhập giá sản phẩm" min="20000" required />
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label> Phần trăm giảm (nếu có) </label>
                                    <input type="number" class="form-control" name="txtSalePrice"
                                        placeholder="Nhập phần trăm giá giảm" value="0" min="0" max="50" />
                                </div>
                            </div>
                        </div>
                        <!-- //Giá sản phẩm -->

                        <div class="form-group">
                            <label> Số lượng sản phẩm </label>
                            <input type="number" class="form-control" name="txtNumber"
                                placeholder="Nhập số lượng sản phẩm" required />
                        </div>
                        <!-- //Số lượng sản phẩm -->

                        <div class="form-group">
                            <label> Chọn hình ảnh sản phẩm </label>
                            <input type="file" name="FileImage" required>
                            <span style="color: red"><?php echo isset($notimage) ? $notimage : '' ; ?></span>
                        </div>
                        <!-- //Chọn hình ảnh sản phẩm -->

                        <div class="form-group">
                            <label> Nhập từ cho khách hàng tìm kiếm </label>
                            <input class="form-control" name="txtKeyword" placeholder="Nhập từ khóa tìm kiếm" />
                        </div>
                        <!-- //Nhập từ cho khách hàng tìm kiếm -->

                        <div class="form-group">
                            <label> Mô tả sản phẩm </label>
                            <textarea class="form-control" rows="3" name="txtDescript"></textarea>
                        </div>
                        <!-- //Mô tả sản phẩm -->

                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <button type="submit" name="addProduct" class="btn btn-warning btn-block btn-lg"> Thêm
                                </button>
                            </div>
                            <!-- //Button Thêm -->

                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <button type="reset" class="btn btn-default btn-block btn-lg"
                                    style="background: gray; color:white;"> Thiết lập lại </button>
                            </div>
                            <!-- //Button Reset -->
                        </div>
                        <!-- /.row -->
                    </form>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /#page-wrapper -->


</body>

</html>