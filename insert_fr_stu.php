<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>เพิ่มรายชื่อนักศึกษา</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="pogpog.css">
</head>
<body>

  <div class="container form-container">
    <a class="btn btn-primary mb-4" href="student.php" role="button">HOME</a>

    <div class="card shadow rounded">
      <div class="card-header bg-success text-white text-center h4">
        เพิ่มรายชื่อนักศึกษาห้อง 1
      </div>
      <div class="card-body bg-light">
        <form action="insert_sql_data.php" method="post">
          
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Name:</label>
            <div class="col-sm-9">
              <input type="text" name="std_name" class="form-control" placeholder="...ชื่อ" required>
            </div>
          </div>

          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Lastname:</label>
            <div class="col-sm-9">
              <input type="text" name="std_lname" class="form-control" placeholder="...สกุล" required>
            </div>
          </div>

          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Province:</label>
            <div class="col-sm-9">
              <input type="text" name="std_prov" class="form-control" placeholder="...จังหวัด" required>
            </div>
          </div>

          <div class="mb-4 row">
            <label class="col-sm-3 col-form-label">Salary:</label>
            <div class="col-sm-9">
              <input type="number" name="salary" class="form-control" placeholder="...เงินเดือน" required>
            </div>
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-success me-2">✅ Submit</button>
            <button type="reset" class="btn btn-warning">🧹 Clear</button>
          </div>

        </form>
      </div>
    </div>
  </div>

</body>
</html>
