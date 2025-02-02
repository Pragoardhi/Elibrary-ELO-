<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/style.css" type="text/css">

    <title>E-Library</title>
</head>

<body>
    <!-- head navbar -->
    <?php $this->load->view('template/header.php') ?>
    <!-- content -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="<?php echo base_url('assets') ?>/image/d.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?php echo base_url('assets') ?>/image/b.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?php echo base_url('assets') ?>/image/c.jpg" alt="Third slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?php echo base_url('assets') ?>/image/a.jpg" alt="Fourth slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <br>
    <div class="Title-Buku">
        <h1 class="Text-title-buku">Daftar Buku Terbaru</h1>
        <h4 class="Text-title-buku-2">Ada beberapa daftar buku yang baru masuk</h4>
        <br>
    </div>

    <div class="container" id="daftar">
        <div class="row">

            <?php
            $count  = count($listBook);

            if ($count >= 3) {
                for ($i = $count - 3; $i < $count; $i++) {
                    echo '<div class="col-lg-4" style="text-align: center">';
                    ?>
                    <img class="w-50" src="<?php echo base_url('upload/book/' . $listBook[$i]["Image"]) ?>" />
                <?php
                        echo '<br>';
                        echo '<br>';
                        echo '<h5>' . $listBook[$i]["Judul"]   . '</h5>';
                        echo '<p>'  . $listBook[$i]["Penulis"] . '</p>';
                        echo '<p>'  . $listBook[$i]["Year"]    . '</p>';
                        echo '</div>';
                    }
                } else if (($count <= 2)) {
                    for ($i = 0; $i < $count; $i++) {
                        echo '<div class="col-lg-4" style="text-align: center">';
                        ?>
                    <img class="w-50" src="<?php echo base_url('upload/book/' . $listBook[$i]["Image"]) ?>" />
            <?php
                    echo '<br>';
                    echo '<br>';
                    echo '<h5>' . $listBook[$i]["Judul"]   . '</h5>';
                    echo '<p>'  . $listBook[$i]["Penulis"] . '</p>';
                    echo '<p>'  . $listBook[$i]["Year"]    . '</p>';
                    echo '</div>';
                }
            }
            ?>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

<!-- footer -->
<?php $this->load->view('template/footer.php') ?>

</html>