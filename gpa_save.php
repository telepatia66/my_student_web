<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>listStudent</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" >
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .highlight { color: #ff3399; font-weight: bold; }
        .btn-custom { background-color: #ff66b2; color: white; border: none; }
        .btn-custum { background-color: #66d6ffff; color: white; border: none;}
        th.custom-header { background-color: #ffcce6; }
    </style>
</head>
<body>
    <div class="container">
    <center><img src="https://www.cpe.eng.rmutp.ac.th/wp-content/uploads/2023/10/cropped-cropped-banner.png" alt="" width="1000px"></center>
    <br><br>
    <a class="btn btn-primary" href="student_gpa.php" role="button">BACK</a>
    <div class="text-center btn-custum mt-4 mb-4 h3 alert alert-success" role="alert">
        Transcript นักศึกษาห้อง 1
    </div>
    <?php
        include("connect.php");
    ?>
        <table class="table table-striped">
        <tr class="table-info">
        <th>รหัสนักศึกษา</th> <th>ชื่อนักศึกษา</th>
        </tr>
    <?php
        $gpa_id=$_GET["gpa_id"];
        $sql = "SELECT std_id, std_name, std_lname FROM student where std_id=$gpa_id";
        $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["std_id"]."</td><td> " .$row["std_name"]."
        ".$row["std_lname"]."</td>";
        ?>
        </tr></table>
        <?php
        }
    } else {
        echo "0 results";
    }
        mysqli_close($conn);
        //ดึงรายวิชาที่ลงทะเบียน
    ?>
        <h3>ผลการเรียนรายวิชา</h3>
        <table class="table table-striped">
        <tr class="table-info">
        <th>รหัสวิชา</th> <th>ชื่อวิชา</th> <th>หน่วยกิต</th> <th>เกรด</th>
        </tr>
    <?php
        include("connect.php");
        // $gpa_id=$_GET["gpa_id"];
    $sql = "SELECT * FROM register
    INNER JOIN subject ON register.sid=subject.sid
    where stu_id=$gpa_id";
        $result = mysqli_query($conn, $sql);
        $grade["A"]=4;
        $grade["B"]=3;
        $grade["C"]=2;
        $grade["D"]=1;
        $grade["F"]=0;
        $tot=0;
        $totc=0;
        $gpa=1.11;
    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>" . $row["sid"]."</td><td>".$row["sname"] .
    "</td><td>".$row["scredit"]."</td><td>".$row["sgrade"]."</td>";
    $txtgrd=$row["sgrade"];
    $power = $row["scredit"] * $grade["$txtgrd"];
    $tot=$tot+$power;
    // echo $tot;
    $totc=$totc+$row["scredit"];
    ?>
</tr>
    <?php
    }
    } else {
    echo "0 results";
    }
        if ($totc==0){
            $gpa=0;
        }else{
            $gpa = $tot/$totc;
    }
        // echo $gpa;
        echo "<tr><td colspan='2'>รวม ". $totc ." หน่วยกิต</td>
        <td colspan='2'>GPA = ".number_format($gpa, 2, '.', ''). "</td></tr>";
        echo "</table>";
        mysqli_close($conn);
    // save gpa
        include("connect.php");
        $sql = "UPDATE student SET stu_gpa=$gpa
        WHERE std_id=$gpa_id";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
    ?>
</div>
</body>
</html>