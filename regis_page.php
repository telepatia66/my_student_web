<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    .custom-input {
        background-color: #fff0f5; /* สีพื้นกล่องข้อความ */
        border: 1px solid #ff99cc;
    }
    .custom-submit {
        background-color: #ff66b2;
        color: white;
        border: none;
    }
        .highlight { color: #ff3399; font-weight: bold; }
        .btn-custom { background-color: #ff66b2; color: white; border: none; }
        .btn-custum { background-color: #66d6ffff; color: white; border: none;}
        th.custom-header { background-color: #ffcce6; }
    
</style>
</head>
<body>
<div class="container mt-4">
    <center>
        <img src="https://www.cpe.eng.rmutp.ac.th/wp-content/uploads/2023/10/cropped-cropped-banner.png" alt="" width="1000px">
     <div class="mb-3">
            <a class="btn btn-custom " href="student.php" >HOME</a>
            <a class="btn btn-custum" href="seller.php">seller</a>
            <a class="btn btn-custum " href="regis_page.php">ลงทะเบียนเรียน</a>
            <a class="btn btn-custum " href="student_gpa.php">TRANSCRIP</a>
            <a class="btn btn-danger " href="student_login.php">Login-GPA</a>
            <a class="btn btn-custum" href="bar_graph.php">Graph</a>
        </div></center>

    <div class="alert alert-success text-center mt-4 mb-4 h3">
        การลงทะเบียนเรียน
    </div>
        
    <div class="card p-4 mb-4">

        <form action="regis_save.php" method="post">
            <div class="mb-3">
                <label for="stu_id" class="form-label">รหัสนักศึกษา</label>
                <input type="text" name="stu_id" id="stu_id" class="form-control custom-input" placeholder="...รหัสนศ" required>
            </div>
            <div class="mb-3">
                <label for="sub_id" class="form-label">รหัสวิชา</label>
                <input type="text" name="sub_id" id="sub_id" class="form-control custom-input" placeholder="...รหัสวิชา" required>
            </div>
            <div class="mb-3">
                <label for="sub_grd" class="form-label">เกรดที่ได้</label>
                <input type="text" name="sub_grd" id="sub_grd" class="form-control custom-input" placeholder="...เกรดที่ได้" required>
            </div>
            <input type="submit" value="Submit" class="btn custom-submit me-2">
            <input type="reset" value="Clear" class="btn btn-warning">
        </form>
    </div>

    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>รายการที่</th>
                <th>รหัสนศ-ชื่อนศ</th>
                <th>รหัสวิชา</th>
                <th>เกรดที่ได้</th>
            </tr>
        </thead>
        <tbody>
        <?php
        include("connect.php");
        $sql = "SELECT * FROM register 
                INNER JOIN subject ON register.sid=subject.sid
                INNER JOIN student ON register.stu_id=student.std_id
                ORDER BY regid DESC LIMIT 10";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['regid']}</td>
                        <td>{$row['std_id']} {$row['std_name']} {$row['std_lname']}</td>
                        <td>{$row['sid']} {$row['sname']}</td>
                        <td>{$row['sgrade']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>0 results</td></tr>";
        }
        mysqli_close($conn);
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
