<?php
include("connect.php");
$stu_id = $_POST["stu_id"];
$sub_id = $_POST["sub_id"];
$sub_grd = $_POST["sub_grd"];
$sql = "INSERT INTO register(stu_id,sid,sgrade)
VALUES('$stu_id','$sub_id','$sub_grd') ";
if (mysqli_query($conn, $sql)) {
//echo "New record created successfully";
echo "<script> window.alert('บันทึกลงทะเบียนสำเร็จok'); </script>";
echo "<script> window.location.assign('regis_page.php'); </script>";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
echo "<script> window.alert('ไม่สามารถบันทึกการลงทะเบียนได้'); </script>";
echo "<script> window.location='regis_page.php'; </script>";
}
mysqli_close($conn);
?>