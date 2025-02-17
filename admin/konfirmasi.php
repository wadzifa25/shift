<?php
include("../proses.php");
$db = new Connect_db();
if (!isset($_SESSION["login_admin"])) {
    header("Location: loginadmin.php");
    exit;
}
$id_nama      = $_SESSION["login_admin"];
$result_data  = $db->db_From_Id("SELECT * FROM admin WHERE id = '$id_nama'");
$result_table = $db->db_From_Id("SELECT * FROM user_order WHERE status = 'pending'");
$no           = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        include("sidebar.html");
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                include("topbar.html");
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Konfirmasi Pesanan</h1> 
                    <p class="mb-4">Harap konfirmasi pesanan yang sudah masuk, jika semua informasi yang diberikan sudah benar, silahkan klik verify pada kolom yang sesuai</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-warning">Data Pesanan Tertunda</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">ID Tiket</th>
                                            <th class="text-center">Nama Event</th>
                                            <th class="text-center">Username</th>
                                            <th class="text-center">WA / Email</th>
                                            <th class="text-center">Catatan</th>
                                            <th class="text-center">Rek Pengirim</th>
                                            <th class="text-center">Bank Penerima</th>
                                            <th class="text-center">Total Pembayaran</th>
                                            <th class="text-center">Bukti Pembayaran</th>
                                            <th class="text-center">Waktu Pesanan</th>
                                            <th class="text-center">Konfirmasi</th>
                                            <th class="text-center">Tolak</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($result_table as $data): ?>
                                        <?php $no++?>
                                        <tr>
                                            <td class="text-center"><?php echo $no ?></td>
                                            <td class="text-center"><?php echo $data["id_tiket"]?></td>
                                            <td class="text-center"><?php echo $data["nama_event"]?></td>
                                            <td class="text-center"><?php echo $data["order_id"]?></td>
                                            <td class="text-center"><?php echo $data["email"]?></td>
                                            <td class="text-center"><?php echo $data["catatan"]?></td>
                                            <td class="text-center"><?php echo $data["bank_pengirim"]?> <?php echo $data["rek_pengirim"]?> <?php echo $data["namarek_pengirim"]?></td>
                                            <td class="text-center"><?php echo $data["bank_penerima"]?></td>
                                            <td class="text-center"><?php echo $data["total_pembayaran"]?></td>
                                            <td class="text-center"><img src="../db_images/<?php echo $data["bukti_pembayaran"]?>" width="1500px" class="img-fluid img-thumbnail" alt="..."></td>
                                            <td class="text-center"><?php echo $data["waktu_pesanan"]?></td>
                                            <td class="text-center"><a class="btn btn-success" 
                                            href="ifconfirm.php?id=<?php echo $data['id']?>">Terima</a></td>
                                            <td class="text-center"><a class="btn btn-danger" href="ifreject.php?id=<?php echo $data['id']?>">Tolak</a></td>
                                        </tr>
                                    <?php endforeach; ?>    
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
                        <span>Copyright &copy; SHIFT <?= date('Y'); ?></span>
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

    

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>