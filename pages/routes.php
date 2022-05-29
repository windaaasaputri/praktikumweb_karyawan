<?php 
if(isset($_GET['page'])){
    $page = $_GET['page'];
    switch($page){
        case '':
            include "dashboard.php";
            break;
        case 'karyawan':
            include "karyawan.php";
            break;
        case 'bagian':
            include "bagian.php";
            break;
        default:
            include "dashboard.php";
            break;
    }
} else {
    include "dashboard.php";
}
?> 