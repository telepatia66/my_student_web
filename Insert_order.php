<?php
    include("connect.php");
    $std_id = $_POST["std_id"];
    $product_id = $_POST["product_id"];
    $order_quantity = $_POST["order_quantity"];
    $sql = "INSERT INTO orderstu (std_id,product_id,order_quantity)
    VALUES('$std_id','$product_id','$order_quantity') ";
    mysqli_query($conn, $sql);

    $sql = "UPDATE product
            SET pro_quantity=pro_quantity-$order_quantity
            WHERE product_id=$product_id";
if (mysqli_query($conn, $sql)) {
    //echo "New record created successfully";
    //echo "<script> window.alert('บันทึกข้อมูลส าเร็จok'); </script>";
    echo "<script> window.location.assign('seller.php'); </script>";

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        echo "<script> window.alert('ไม่สามารถบันทึกข้อมูลได้'); </script>";
        echo "<script> window.location='seller.php'; </script>";
    }
    mysqli_close($conn);
?>