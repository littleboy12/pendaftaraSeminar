<?php
include_once "../config/config.php";
session_start();

$error = [];

$nama = $email = $negara = $provinsi = $alamat = $insitusi = $username = $password = $rePassword = "";

if (isset($_POST['register'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $negara = $_POST['negara'];
    $provinsi = $_POST['provinsi'];
    $alamat = $_POST['alamat'];
    $institusi = $_POST['insitusi'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $rePassword = $_POST['rePassword'];

    if ($password != $rePassword) {
        $error['errPassword'] = "Password Tidak Sama";
    } else {
        $sqlCekAccount = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'");
        if (mysqli_num_rows($sqlCekAccount) > 0) {
            $error['errUsername'] = "Username Sudah Terdaftar";
        } else {
            $sqlInsertAccount = mysqli_query($conn, "INSERT INTO `tb_user`(`nama`, `username`, `email`, `password`, `level`) VALUES ('$nama','$username','$email','$password','user')");
            
            if ($sqlCekAccount) {
                $sqlInsertData = mysqli_query($conn, "INSERT INTO `registration`(`nama`, `email`, `insitusi`, `negara`, `alamat`) VALUES ('$nama','$email','$institusi','$negara','$alamat')");
                if ($sqlInsertData) {
                    $_SESSION['username'] = $username;
                    $_SESSION['nama'] = $nama;
                    $_SESSION['level'] = 'user';

                    header("Location: ../view/beranda.php");
                    exit();
                }
            } else {
                $error['errDatabase'] = "Gagal Menginput Data";
            }
        }
    }
}
