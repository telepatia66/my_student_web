<?php
include("connect.php");
$edit_id=$_GET["edit_id"]; //รับค่า ID บรรทัดที่จะแก้ไข จากลิ้ง ใช้ GET
$sql = "SELECT std_id, std_name, std_lname,std_prov, salary FROM student where
std_id=$edit_id"; // เขียน SQL ดึงข้อมูลบรรทัดที่จะแก้ไข
$result = mysqli_query($conn, $sql); // run SQL
$row = mysqli_fetch_assoc($result); // ดึงข้อมูลใส่ Array
// เอาข้อมูลจาก Array ใส่ในตัวแปร
$edt_id = $row["std_id"];
$edt_name = $row["std_name"];
$edt_lname = $row["std_lname"];
$edt_prov = $row["std_prov"];
$edt_salary = $row["salary"];

?>
<!-- เขียนหน้าเวป แก้ไขชื่อนักศึกษา -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>แก้ไขรายชื่อนักศึกษา</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="pogpog.css">
</head>

        <!-- <div class="container">
            <div class="row">
            <div class="col-sm-6 ">
            <br><br>
            <a class="btn btn-primary" href="student.php" role="button">HOME</a>
            <div class="text-center mt-4 mb-4 h3 alert alert-success" role="alert">
            แก้ไขชื่อนักศึกษา ห้อง 1
            </div> -->

         <div class="container form-container">
      <a class="btn btn-primary mb-4" href="student.php" role="button">HOME</a>  
    <div class="card shadow rounded">
      <div class="card-header bg-success text-white text-center h4">
        แก้ไขรายชื่อนักศึกษาห้อง 1
      </div> 

    <form action="edit_sql_data.php" method="post">
    <div class="mb-3 row">
       <label class="col-sm-2 col-form-label" style="margin-right: auto;" > ID: </label>
        <div class="col-sm-10">
        <input type="text" name="std_id" class="form-control" class="col-sm-3 col-form-label" value="<?php echo $edt_id;?>" readonly>
    </div></div>


    <div class="mb-3 row">
       <label class="col-sm-2 col-form-label" style="margin-right: auto;" > Name: </label>
        <div class="col-sm-10">
        <input type="text" name="std_name" class="form-control" class="col-sm-3 col-form-label" value="<?php echo $edt_name;?>">
    </div></div>

    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label" style="margin-right: auto;" > Lastname: </label>
        <div class="col-sm-10">
        <input type="text" name="std_lname" class="form-control" class="col-sm-3 col-form-label" value="<?php echo $edt_lname;?>">
    </div></div>
    
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label" style="margin-right: auto;" > Province: </label>
        <div class="col-sm-10">
        <input type="text" name="std_prov" class="form-control" class="col-sm-3 col-form-label" value="<?php echo $edt_prov;?>">
    </div></div>
    
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label" style="margin-right: auto;" > Salary: </label>
        <div class="col-sm-10">
        <input type="text" name="salary" class="form-control" class="col-sm-3 col-form-label" value="<?php echo $edt_salary;?>">
    </div></div>

    <div class="text-center">
        <input type="submit" value="✅ Submit" class="btn btn-success">
        <a class="btn btn-primary" href="student.php" role="button">Cancle</a>
    </div>
    </form>

</body>
</html>