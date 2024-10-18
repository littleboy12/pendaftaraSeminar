<?php 
include "../layout/header.php";

if (!isset($_SESSION['username'])) {
    header("Location: ./view_login.php");

    exit();
}

?>


<main class="main px-4">
    <h4>Sealmat Datang Di Beranda <?= $_SESSION['nama'] ?></h4>
</main>

<?php include "../layout/footer.php" ?>