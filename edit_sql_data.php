<?php
include("connect.php");
$std_id = $_POST["std_id"];
$std_name = $_POST["std_name"];
$std_lname = $_POST["std_lname"];
$std_prov = $_POST["std_prov"];
$salary = $_POST["salary"];
$sql = "UPDATE student SET std_name='$std_name' ,std_lname='$std_lname', std_prov='$std_prov',salary='$salary'
WHERE std_id=$std_id";
if (mysqli_query($conn, $sql)) {
 // run sql และ เปรียบเทียบผล ถ้าท างานส าเร็จ จะให้ผลเป็นจริง
//echo "New record created successfully";

echo "<script> window.alert('บันทึกข้อมูลเสร็จสิ้น'); </script>";
echo "<script> window.location.assign('student.php'); </script>";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
echo "<script> window.alert('บันทึกไม่ได้ไอควาย'); </script>";
echo "<script> window.location='lstudent.php'; </script>";
}
mysqli_close($conn);
?>