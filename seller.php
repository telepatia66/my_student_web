<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>listStudent</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <style>
    body {
      background: linear-gradient(135deg, #a2d9ff, #ffd6f6);
      font-family: "Segoe UI", sans-serif;
    }

    .container {
      background: rgba(255, 255, 255, 0.9);
      border-radius: 15px;
      padding: 20px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    /* ตกแต่ง navigation link */
    a.btn-custom, a.btn-custum {
      background-color: #87cefa;
      color: #fff;
      margin: 2px;
      padding: 8px 16px;
      transition: 0.3s;
    }
    a.btn-custom:hover, a.btn-custum:hover {
      background-color: #ff99cc;
      color: white;
    }

    .alert-success {
      background-color: #ffb6c1;
      color: #fff;
      border: none;
      font-weight: bold;
      border-radius: 10px;
    }

    u {
      font-weight: bold;
      color: #ff66b2;
    }

    .bg-info {
      background: #b3ecff !important;
      padding: 15px;
      border-radius: 10px;
    }

    .table {
      background: #fff0f5;
      border-radius: 10px;
      overflow: hidden;
    }

    .table th {
      background-color: #ff99cc;
      color: white;
      text-align: center;
    }

    .table td {
      background-color: #e6f7ff;
    }
  </style>
</head>
<body>
    <div class="container">
        <br><br>

        <!-- Navigation -->
            <a class="btn btn-custom " href="student.php" >HOME</a>
            <a class="btn btn-custum" href="seller.php">seller</a>
            <a class="btn btn-custum " href="regis_page.php">ลงทะเบียนเรียน</a>
            <a class="btn btn-custum " href="student_gpa.php">TRANSCRIP</a>
            <a class="btn btn-danger " href="student_login.php">Login-GPA</a>
            <a class="btn btn-custum" href="bar_graph.php">Graph</a>

        <div class="text-center mt-4 mb-4 h3 alert alert-success" role="alert">
          ระบบซื้อ-ขาย ร้านคณะวิศวกรรมศาสตร์
        </div>


        <?php include("connect.php"); ?>

        <div class="row">
            <!-- Input Form -->
            <div class="col-sm-6 bg-info">
                <u>ป้อนรายการซื้อ-ขาย</u>
                <form action="insert_order.php" method="post">
                    <label for="std_id">รหัสนักศึกษา</label>
                    <input type="text" name="std_id" class="form-control" placeholder="...รหัสนักศึกษา" required> <br>

                    <label for="product_id">รหัสสินค้า</label>
                    <input type="text" name="product_id" class="form-control" placeholder="...รหัสสินค้า" required> <br>

                    <label for="order_quantity">จำนวนที่ซื้อ</label>
                    <input type="text" name="order_quantity" class="form-control" placeholder="...จำนวนที่ซื้อ" required> <br>

                    <input type="submit" value="Submit" class="btn btn-success">
                    <input type="reset" value="Clear" class="btn btn-warning">
                </form>
            </div>

            <!-- Product List -->
            <div class="col-sm-6">
                <u>รายการสินค้าในร้าน</u>
                <table class="table table-striped">
                    <tr>
                        <th>รหัสสินค้า</th>
                        <th>ชื่อสินค้า</th>
                        <th>ราคาต่อหน่วย</th>
                        <th>จำนวนในสต็อก</th>
                    </tr>
                    <?php
                        $sql = "SELECT * FROM product";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>
                                        <td>{$row['product_id']}</td>
                                        <td>{$row['pro_name']}</td>
                                        <td>{$row['pro_cost']}</td>
                                        <td>{$row['pro_quantity']}</td>
                                      </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>0 results</td></tr>";
                        }
                    ?>
                </table>
            </div>
        </div>

        <!-- Latest 10 Orders -->
        <br><hr>
        <u>แสดงรายการซื้อ-ขาย ล่าสุด 10 รายการ</u>
        <table class="table table-striped">
            <tr>
                <th>รายการที่</th>
                <th>นักศึกษาผู้ซื้อ</th>
                <th>สินค้าที่ซื้อ</th>
                <th>ราคาต่อหน่วย</th>
                <th>จำนวนที่ซื้อ</th>
                <th>ราคารวม</th>
            </tr>
            <?php
                $sql = "SELECT * FROM orderstu 
                        INNER JOIN product ON orderstu.product_id = product.product_id
                        INNER JOIN student ON orderstu.std_id = student.std_id
                        ORDER BY order_id DESC LIMIT 10";

                $result = mysqli_query($conn, $sql);
                $costten = 0;

                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $total = $row["pro_cost"] * $row["order_quantity"];
                        $costten += $total;

                        echo "<tr>
                                <td>{$row['order_id']}</td>
                                <td>{$row['std_id']} - {$row['std_name']} {$row['std_lname']}</td>
                                <td>{$row['product_id']} - {$row['pro_name']}</td>
                                <td>{$row['pro_cost']}</td>
                                <td>{$row['order_quantity']}</td>
                                <td>{$total}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>0 results</td></tr>";
                }

                mysqli_close($conn);
            ?>
        </table>
        <b>รวมจำนวนเงินในการซื้อ-ขาย 10 รายการล่าสุด = <?= $costten ?> บาท</b>
    </div>
</body>
</html>
