<?php
    include("connect.php");
    $user_id = $_POST["std_id"];
    $user_birth = $_POST["stu_pass"];

    $sql = "select std_id,stu_birth from student
    where std_id=$user_id AND stu_birth='$user_birth' ";

    $result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) ==1) {
    //echo "New record created successfully";
    echo "<script> window.alert('login success!'); </script>";
    echo "<script> window.location.assign('gpa_online.php?gpa_id=$user_id'); </script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        echo "<script> window.alert('Wrong password!'); </script>";
        echo "<script> window.location='student_login.php'; </script>";
}
    mysqli_close($conn);
?>