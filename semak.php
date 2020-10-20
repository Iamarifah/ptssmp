<?php
//CONNECTION DARABSE
require "database.php";

//BACA USERNAME DAN PASSWORD DAR FORM
$uname = $_POST['uname'];
$pass = $_POST['pass'];

//MULA IF, IF PERTAMA KALAU KATA ORANG TU ADMIN KALAU YA ADMIN DIA AKAN CHECK KAT DATABASE BETUL TAK PASSWORD DIA
if ($uname == 'admin') {
    $sql = "SELECT * FROM admin";
    $row = $conn->query($sql)->fetch_object();
    //KALAU BETUL MASUK DALAM FOLDER ADMIN SALAH POPUP USERNAME DAN PASSWORD SALAH
    if ($pass == $row->pass) {
        header('location: admin/');
    } else {
        ?>
        <script>
            alert ('Username and Password Incorrect!!!! ');
            window.location='login.php';
        </script>
        <?php
}
} else {
    //KALAU BUKAN ADMIN ELSE DIA PULAK DIA AKAN TENGOK DALAM TABLE STAFF KALAU USERNAME DALAM TABLE STAFF DIA AKAN CHECK PASSWORD PULAK
    $sql = "SELECT * FROM staff WHERE uname = '$uname'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_object();
        //DIA AKAN MASUK DALAM FOLDER STAFF KALAU BETUL STAFF PASSWORD SALAH DIA AKAN NAIK POPUP
        if ($pass == $row->pass) {
		$_SESSION['id']=$row->id;
            header('location: staff/');
        } else {
            ?>
            <script>
                alert ('Username or Password Incorrect ');
                window.location='login.php';
            </script>
            <?php
        }
    } else {
        //KALAU X JUMPA DLM TABLE STAFF DIA AKAN CARI DALAM TABLE STUDENT PULAK KALAU JUMPA DIA AKAN CHECK PASSWORD KALAU BETUL DIA AKAN MASUK DALAM FOLDER STAFF
        $sql = "SELECT * FROM student WHERE uname = '$uname'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $row = $result->fetch_object();
            //DIA AKAN MASUK DALAM FOLDER STAFF KALAU BETUL STAFF PASSWORD SALAH DIA AKAN NAIK POPUP
            if ($pass == $row->pass) {
                header('location: student/');
            } else {
                ?>
                <script>
                    alert ('Username or Password Incorrect ');
                    window.location='login.php';
                </script>
                <?php
            }
        } else {
            ?>
            <script>
                alert ('Username and Password Incorrect!!!! ');
                window.location='login.php';
            </script>
            <?php
        }
    }
}
