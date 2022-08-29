<?php
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $conn = mysqli_connect('localhost', 'root', '', 'pizzeria');
    if ($conn) {
        $sql = "select * from kep where id = '".$id."'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $kep = $row['kep'];
            $file = 'assets'.DIRECTORY_SEPARATOR.'image'.DIRECTORY_SEPARATOR.$kep;
            if(file_exists($file)){
                if(unlink($file)){
                    $sql = "Delete from kep where id = '".$id."'";
                    mysqli_query($conn, $sql);
                }
            }
        }
        mysqli_close($conn);
    }
}
header('Location: form.php');
