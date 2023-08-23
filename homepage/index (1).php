<?php
require_once('model/connect.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Fashion MyLiShop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="Fashion MyLiShop - fashion mylishop" />
    <meta name="description" content="Fashion MyLiShop - fashion mylishop" />
    <meta name="keywords" content="Fashion MyLiShop - fashion mylishop" />
    <meta name="author" content="Hôih My" />
    <meta name="author" content="Y Blir" />
    <link rel="icon" type="image/png" href="images/logohong.png">

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" type="text/css" href="admin/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" charset="utf-8"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'> -->

    <!-- customer js -->
    <script src='js/wow.js'></script>
    <script type="text/javascript" src="js/mylishop.js"></script>
    <!-- customer css -->
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>

<body>

    <div class="container-fluid">
        <div id="bg">
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner" style="height: 1000px;">
                    <?php
                    $sql = "SELECT image FROM slides WHERE status = 1";
                    $result = mysqli_query($conn, $sql);
                    $first = true;

                    while ($row = mysqli_fetch_array($result)) {
                        $imageSrc = $row['image'];
                        $itemClass = $first ? 'carousel-item active' : 'carousel-item';
                    ?>
                        <div class="<?php echo $itemClass; ?>" data-bs-interval="10000">
                            <img src="<?php echo $imageSrc; ?>" class="d-block w-100" alt="...">
                        </div>
                    <?php
                        $first = false;
                    }
                    ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div><!-- /background -->

    <div class="homepage">
        <?php
        $sql = "SELECT * from products";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
            echo '<div class="card" style="width:300px; height: 500px; display: inline-block">
                        <img style="height: 300px" class="card-img-top" src="' . $row['image'] . '" alt="Card image" />
                        <div class="card-body"  >
                            <h4 class="card-title">' . $row['name'] . '</h4>
                            <p class="card-text">Còn: ' . $row['quantity'] . ' sản phẩm</p>
                            <div class="__btn">
                                <a href="detail.php?id=' . $row['id'] . '" class="btn btn-primary">Xem chi tiết</a>
        <a href="#" class="btn btn-primary">Mua ngay</a>
    </div>
    </div>
    </div>';
        }
        ?>
    </div>










</body>

</html>