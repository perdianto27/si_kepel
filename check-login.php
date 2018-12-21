<?php
session_start();
require 'config.php';

if ( isset($_POST['nama_admin']) && isset($_POST['kata_sandi']) ) {
    
    $sql_check = "SELECT level_user, 
                         idadmin 
                  FROM admin 
                  WHERE 
                       nama_admin=? 
                       AND 
                       kata_sandi=? 
                  LIMIT 1";

    $check_log = $conn->prepare($sql_check);
    $check_log->bind_param('ss', $nama_admin, $kata_sandi);

    $nama_admin = $_POST['nama_admin'];
    $kata_sandi = md5( $_POST['kata_sandi'] );

    $check_log->execute();

    $check_log->store_result();

    if ( $check_log->num_rows == 1 ) {
        $check_log->bind_result($level_user, $idadmin);

        while ( $check_log->fetch() ) {
            $_SESSION['user_login'] = $level_user;
            $_SESSION['sess_id']    = $idadmin;
            
        }

        $check_log->close();

        header('location:on-'.$level_user);
        exit();

    } else {
        header('location: login.php?error='.base64_encode('nama_admin dan kata_sandi Invalid!!!'));
        exit();
    }

   
} else {
    header('location:login.php');
    exit();
}