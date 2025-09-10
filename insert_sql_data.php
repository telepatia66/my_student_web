<?php
$std_name = $_POST["std_name"];
$std_lname = $_POST["std_lname"];
$std_prov = $_POST["std_prov"];
$salary = $_POST["salary"];

// echo $std_name . $std_lname . $std_prov . $salary ;
include("connect.php");
        //$del_id=$_GET["del_id"]; //รับค่า id จากปุ่ม มาใส่ไวใ้นตวัแปร $del_id
        
        $sql = "insert into student (std_name, std_lname, std_prov, salary)
        value('$std_name','$std_lname','$std_prov',$salary)";

        if (mysqli_query($conn, $sql)) {
            //แจ้งการลบข้อมูลส าเร็จ แล้วให้กดปุ่ม OK จะกลับไปแสดงขอ้มูลท้งัหมด ที่หน้า student.php
            echo "<script> window.alert('Add data success'); </script>";
            echo "<script> window.location.assign('student.php');
        
        </script>";
            } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            echo "<script> window.alert('Can not add data'); </script>";
            echo "<script> window.location='student.php'; </script>";
            }
        mysqli_close($conn);

?>