<?php
include "../layout/header.php";

$nama = $_SESSION['nama'];

$sqlCekData = mysqli_query($conn, "SELECT * FROM `registration` WHERE `nama` = '$nama'");

$data = mysqli_fetch_array($sqlCekData);
?>


<main class="main px-4">
    <div class="my-2 shadow p-2">
        <span class="text-secondary">Seminar Saya</span>
        
        <?php if($data['status'] == 'Terdaftar') : ?>
            <div class="alert alert-success my-3" role="alert">
                Anda Sudah Terdaftar Di Seminar
            </div>
        <?php endif ?>
        <?php if($data['status'] == 'belum') : ?>
            <div class="alert alert-warning my-3" role="alert">
                Data Sedang Di Periksa Admin
            </div>
        <?php endif ?>
        <?php if($data['status'] == 'Tidak') : ?>
            <div class="alert alert-danger my-3" role="alert">
                Pendaftaran Di Tolak
            </div>
        <?php endif ?>
        <?php if($data['is_delete'] == '1') : ?>
            <div class="alert alert-danger my-3" role="alert">
                Data Pendaftaran Anda Telah Di Hapus, Silahkan Hubungi Admin
            </div>
        <?php endif ?>
    </div>
</main>

<?php include "../layout/footer.php" ?>