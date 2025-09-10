<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iamsohandsome";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}  //คือรวมการติดต่อเซิฟตเ์วอร์11 บรรทัดแรก ไว้ในไฟล์connect.php
        $del_id=$_GET["del_id"]; //รับค่า id จากปุ่ ม มาใส่ไวใ้นตวัแปร $del_id
        $sql = "DELETE FROM student where std_id=$del_id"; //ภาษาSQL ลบ
        if (mysqli_query($conn, $sql)) {
            //แจ้งการลบข้อมูลส าเร็จ แล้วให้กดปุ่ ม OK จะกลับไปแสดงขอ้มูลท้งัหมด ที่หน้า student.php
            echo "<script> window.alert('การลบข้อมูลสำเร็จ ok'); </script>";
            echo "<script> window.location.assign('student.php');
        
        </script>";
            } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            echo "<script> window.alert('ไม่สามารถลบข้อมูลได้'); </script>";
            echo "<script> window.location='student.php'; </script>";
            }
        mysqli_close($conn);
?>