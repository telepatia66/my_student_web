<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
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

    <div class="alert alert-info text-center mt-4 mb-4">
        <h2><strong>รายชื่อนักศึกษา ปคพ66/1</strong></h2>
    </div>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "iamsohandsome";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

    $sql = "SELECT std_id, std_name, std_lname, std_prov, salary, stu_gpa FROM student";
    $result = $conn->query($sql);

    if ($result -> num_rows > 0) {
    ?>
        <!-- <a class="btn btn-success " href="insert_fr_stu.php">Add+</a> -->
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="custom-header">ID</th>
                    <th class="custom-header">Firstname</th>
                    <th class="custom-header">Lastname</th>
                    <th class="custom-header">Province</th>
                    <th class="custom-header">Salary</th>
                    <th class="custom-header">ผลการเรียน</th>
                    <!-- <th class="custom-header">Delete</th> -->
                </tr>
            </thead>
            <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["std_id"] . "</td>";
                echo "<td>" . $row["std_name"] . "</td>";
                echo "<td>" . $row["std_lname"] . "</td>";
                echo "<td>" . $row["std_prov"] . "</td>";
                echo "<td>" . $row["salary"] . "</td>";
            ?>
                <td>
                    <a class="btn btn-info"
                    href="gpa_save.php?gpa_id=<?php echo $row['std_id']; ?>">GPA</a>
                <?php
                //say gpa
                    echo  $row['stu_gpa'];

                ?>
                </td>
            <?php
                echo "</tr>";   
            }
            ?>
            </tbody>
        </table>
    <?php
    } else {
        echo "<p class='text-center'>0 results</p>";
    }
    $conn->close();
    ?>

    <center><h4>♟️Anas Sangmanee 125-1♟️</h4></center>
</div>
</body>
</html>
