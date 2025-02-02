<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Daftar Buku</title>

    <!-- Custom fonts for this template -->
    <link href="<?php echo base_url('assets') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets') ?>/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?php echo base_url('assets') ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.bootstrap4.min.css">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php $this->load->view("admin/template_admin/sidebar.php") ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $this->load->view("admin/template_admin/topbar.php") ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->

                    <!-- alert -->
                    <?php if ($this->session->flashdata('databukuada') == TRUE) { ?>
                        <div role="alert" id="alert" class="alert alert-danger alert-dismissible" style="text-align:center">
                            <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true" class="fa fa-times"></span>
                            </button>
                            <p><?php echo $this->session->flashdata('databukuada') ?></p>
                        </div>
                        <script>
                            window.setTimeout(function() {
                                $("#alert").fadeTo(500, 0).slideUp(500, function() {
                                    $(this).remove();
                                });
                            }, 3000);
                        </script>
                    <?php }
                    if ($this->session->flashdata('databukuberhasil') == TRUE) { ?>
                        <div role="alert" id="alert" class="alert alert-success alert-dismissible" style="text-align:center">
                            <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true" class="fa fa-times"></span>
                            </button>
                            <p><?php echo $this->session->flashdata('databukuberhasil') ?></p>
                        </div>
                        <script>
                            window.setTimeout(function() {
                                $("#alert").fadeTo(500, 0).slideUp(500, function() {
                                    $(this).remove();
                                });
                            }, 3000);
                        </script>
                    <?php } ?>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold text-primary">Daftar Buku <button class="btn btn-primary" data-toggle="modal" data-target="#tambahModal" style="float:right">Tambah Buku</button></h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="bookTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Cover</th>
                                            <th>Judul</th>
                                            <th>Tipe</th>

                                            <th>Tahun</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Cover</th>
                                            <th>Judul</th>
                                            <th>Tipe</th>

                                            <th>Tahun</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $count  = count($listbuku);

                                        for ($i = 0; $i < $count; $i++) {
                                            $number = $i + 1;
                                            echo '<tr>';
                                            echo '<td>' . $number . '</td>';
                                            ?>
                                            <td>
                                                <img src="<?php echo base_url('upload/book/' . $listbuku[$i]["Image"]) ?>" width="64" />
                                            </td>
                                            <?php
                                                echo '<td>' . $listbuku[$i]["Judul"] . '</td>';
                                                echo '<td>' . $listbuku[$i]["Tipe"] . '</td>';

                                                ?>

                                            <?php
                                                echo '<td>' . $listbuku[$i]["Year"] . '</td>';
                                                ?>

                                            <td style="display: inline-block">
                                                <button class="btn btn-secondary" id="edibtn" type="button" data-toggle="modal" data-target="#editModal<?php echo $i; ?>"> <i class="fas fa-edit"></i></button>
                                                <button class="btn btn-primary" onclick="location.href='<?= base_url() ?>Admin/Detailbuku/<?php echo $listbuku[$i]["Judul"] ?>'"><i class="fas fa-align-justify"></i></button>
                                                <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#deleteModal<?php echo $i; ?>"><i class="fas fa-trash"></i></button>
                                            </td>
                                            </tr>
                                            <!-- edit modal -->
                                            <div class="modal fade" id="editModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="well form-horizontal" method="post" action="<?= base_url('Admin/SaveeditBuku') ?>" enctype="multipart/form-data">
                                                                <fieldset>
                                                                    <div class="form-group" hidden>
                                                                        <span></span>
                                                                        <label class="control-label">No</label>
                                                                        <div class="inputGroupContainer">
                                                                            <div class="input-group"><span class="input-group-addon"></span><input id="editid" name="editid" placeholder="Id" class="form-control" required="true" value="<?php echo $listbuku[$i]["ID"]; ?>" readonly="readonly"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <span></span>
                                                                        <label class="control-label">Judul</label>
                                                                        <div class="inputGroupContainer">
                                                                            <div class="input-group"><span class="input-group-addon"></span><input id="editjudul" name="editjudul" placeholder="Judul" class="form-control" required="true" value="<?php echo $listbuku[$i]["Judul"]; ?>"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="ontrol-label">Tipe</label>
                                                                        <div class="inputGroupContainer">
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"></span>
                                                                                <!-- <input id="edittipe" name="edittipe" placeholder="Tipe" class="form-control" required="true" value=""> -->
                                                                                <?php $counttipe = count($listtipe); ?>
                                                                                <select id="edittipe" name="edittipe" class="form-control">
                                                                                    <?php for ($j = 0; $j < $counttipe; $j++) { ?>
                                                                                        <option value="<?php echo $listtipe[$j]["id"] ?>"><?php echo $listtipe[$j]["Tipe"] ?></option>
                                                                                    <?php  } ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="ontrol-label">Bahasa</label>
                                                                        <div class="inputGroupContainer">
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"></span>
                                                                                <!-- <input id="edittipe" name="edittipe" placeholder="Tipe" class="form-control" required="true" value=""> -->
                                                                                <?php $countbahasa = count($listbahasa); ?>
                                                                                <select id="editbahasa" name="editbahasa" class="form-control">
                                                                                    <?php for ($j = 0; $j < $countbahasa; $j++) { ?>
                                                                                        <option value="<?php echo $listbahasa[$j]["id"] ?>"><?php echo $listbahasa[$j]["bahasa"] ?></option>
                                                                                    <?php  } ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="ontrol-label">Penulis</label>
                                                                        <div class="inputGroupContainer">
                                                                            <div class="input-group"><span class="input-group-addon"></span><input id="editpenulis" name="editpenulis" placeholder="Penulis" class="form-control" required="true" value=""></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="ontrol-label">Penerbit</label>
                                                                        <div class="inputGroupContainer">
                                                                            <div class="input-group"><span class="input-group-addon"></span><input id="editpenerbit" name="editpenerbit" placeholder="Penerbit" class="form-control" required="true" value=""></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="ontrol-label">ISBN</label>
                                                                        <div class="inputGroupContainer">
                                                                            <div class="input-group"><span class="input-group-addon"></span><input id="editisbn" name="editisbn" placeholder="ISBN" class="form-control" required="true" value=""></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="ontrol-label">Harga</label>
                                                                        <div class="inputGroupContainer">
                                                                            <div class="input-group"><span class="input-group-addon"></span><input id="editharga" name="editharga" placeholder="Harga" class="form-control" required="true" value="" type="number"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="ontrol-label">Keterangan</label>
                                                                        <div class="inputGroupContainer">
                                                                            <div class="input-group"><span class="input-group-addon"></span><textarea id="editketerangan" name="editketerangan" placeholder="Keterangan" class="form-control" value=""></textarea></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">Cover buku</label>
                                                                        <img class="img-thumbnail" id="imageedit<?php echo $i ?>" width="1020" />
                                                                        <div class="inputGroupContainer">
                                                                            <div class="input-group"><span class="input-group-addon"></span><input id="editgambar<?php echo $i ?>" name="editgambar" placeholder="Gambar" class="form-control-file" value="" type="file"></div>
                                                                        </div>
                                                                    </div>
                                                                    <script>
                                                                        document.getElementById("editgambar<?php echo $i ?>").onchange = function() {
                                                                            var readeredit = new FileReader();

                                                                            readeredit.onload = function(e) {
                                                                                // get loaded data and render thumbnail.
                                                                                document.getElementById("imageedit<?php echo $i ?>").src = e.target.result;
                                                                            };
                                                                            // read the image file as a data URL.
                                                                            readeredit.readAsDataURL(this.files[0]);
                                                                        }
                                                                    </script>
                                                                    <div class="form-group">
                                                                        <label class="control-label">Tahun</label>
                                                                        <div class="inputGroupContainer">
                                                                            <div class="input-group"><span class="input-group-addon"></span><input id="edittahun" name="edittahun" placeholder="Tahun" class="form-control" required="true" value=""></div>
                                                                        </div>
                                                                    </div>
                                                                </fieldset>


                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-primary" id="buttonSubmit">Save</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Delete Modal-->
                                            <div class="modal fade" id="deleteModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus "<?php echo $listbuku[$i]["Judul"] ?>"?</h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">Pilih "Hapus" untuk menghapus <?php echo $listbuku[$i]["Judul"] ?> dari daftar buku.</div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                            <a class="btn btn-primary" href="<?= base_url() ?>Admin/Deletebuku/<?php echo $listbuku[$i]["ID"] ?>">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2019</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Tambah modal -->
    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Buku</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="well form-horizontal" method="post" action="<?= base_url('Admin/Addbuku') ?>" enctype="multipart/form-data">
                        <fieldset>
                            <div class="form-group" hidden>
                                <span></span>
                                <label class="control-label">No</label>
                                <div class="inputGroupContainer">
                                    <div class="input-group"><span class="input-group-addon"></span><input id="tambahid" name="tambahtid" placeholder="id" class="form-control" required="true" value="<?php echo count($listbuku) + 1; ?>" readonly="readonly"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <span></span>
                                <label class="control-label">Judul</label>
                                <div class="inputGroupContainer">
                                    <div class="input-group"><span class="input-group-addon"></span><input id="tambahjudul" name="tambahjudul" placeholder="Judul" class="form-control" required="true" value=""></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Tipe</label>
                                <div class="inputGroupContainer">
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <!-- <input id="tambahtipe" name="tambahtipe" placeholder="Tipe" class="form-control" required="true" value=""> -->
                                        <?php $count = count($listtipe); ?>
                                        <select class="form-control" id="tambahtipe" name="tambahtipe">
                                            <?php for ($i = 0; $i < $count; $i++) { ?>
                                                <option value="<?php echo $listtipe[$i]["id"] ?>"><?php echo $listtipe[$i]["Tipe"] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Bahasa</label>
                                <div class="inputGroupContainer">
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <!-- <input id="tambahtipe" name="tambahtipe" placeholder="Tipe" class="form-control" required="true" value=""> -->
                                        <?php $count = count($listbahasa);
                                        ?>
                                        <select class="form-control" id="tambahbahasa" name="tambahbahasa">
                                            <?php for ($i = 0; $i < $count; $i++) { ?>
                                                <option value="<?php echo $listbahasa[$i]["id"] ?>"><?php echo $listbahasa[$i]["bahasa"] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Penulis</label>
                                <div class="inputGroupContainer">
                                    <div class="input-group"><span class="input-group-addon"></span><input id="tambahpenulis" name="tambahpenulis" placeholder="Penulis" class="form-control" required="true"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Penerbit</label>
                                <div class="inputGroupContainer">
                                    <div class="input-group"><span class="input-group-addon"></span><input id="tambahpenerbit" name="tambahpenerbit" placeholder="Penerbit" class="form-control" required="true" value=""></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">ISBN</label>
                                <div class="inputGroupContainer">
                                    <div class="input-group"><span class="input-group-addon"></span><input id="tambahisbn" name="tambahisbn" placeholder="ISBN" class="form-control" required="true" value=""></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Harga</label>
                                <div class="inputGroupContainer">
                                    <div class="input-group"><span class="input-group-addon"></span><input id="tambahharga" name="tambahharga" placeholder="Harga" class="form-control" required="true" value="" type="number"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Keterangan</label>
                                <div class="inputGroupContainer">
                                    <div class="input-group"><span class="input-group-addon"></span><textarea id="tambahketerangan" name="tambahketerangan" placeholder="Keterangan" class="form-control" value=""></textarea></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Cover buku</label>
                                <img class="img-thumbnail" id="imagetambah" width="1020" />
                                <div class="inputGroupContainer">
                                    <div class="input-group"><span class="input-group-addon"></span><input id="tambahgambar" name="tambahgambar" placeholder="Gambar" class="form-control-file" value="" type="file"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Tahun</label>
                                <div class="inputGroupContainer">
                                    <div class="input-group"><span class="input-group-addon"></span><input id="tambahtahun" name="tambahtahun" placeholder="Tahun" class="form-control" required="true" value=""></div>
                                </div>
                            </div>
                        </fieldset>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="buttonSubmit">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        document.getElementById("tambahgambar").onchange = function() {
            var reader = new FileReader();

            reader.onload = function(e) {
                // get loaded data and render thumbnail.
                document.getElementById("imagetambah").src = e.target.result;
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        }
    </script>
    <script>
        var hargatambah = document.getElementById("tambahharga");

        function validateHargaTambah() {
            if (hargatambah.value < 0) {
                hargatambah.setCustomValidity("Harga tidak boleh dibawah 0");
            } else if (hargatambah.value > 9999999999) {
                hargatambah.setCustomValidity("Harga terlalu tinggi");
            } else {
                hargatambah.setCustomValidity('');
            }
        }
        hargatambah.onkeyup = validateHargaTambah;
        hargatambah.onchange = validateHargaTambah;
    </script>
    <script>
        var harga = document.getElementById("editharga");

        function validateHarga() {
            if (harga.value < 0) {
                harga.setCustomValidity("Harga tidak boleh dibawah 0");
            } else if (harga.value > 9999999999) {
                harga.setCustomValidity("Harga terlalu tinggi");
            } else {
                harga.setCustomValidity('');
            }
        }
        harga.onkeyup = validateHarga;
        harga.onchange = validateHarga;
    </script>
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('assets') ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('assets') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assets') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets') ?>/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url('assets') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('assets') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url('assets') ?>/js/demo/datatables-demo.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.colVis.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#bookTable').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [0, 2, 3, 4]
                        },
                        className: 'btn btn-success'
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [0, 2, 3, 4]
                        },
                        className: 'btn btn-danger'
                    }
                ]
            });
        });
    </script>

</body>

</html>