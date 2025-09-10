<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-box">
        <div class="login-image"></div>
        <div class="login-content">
    <h1>Login GPA</h1>
    <form action="login_check.php" method="post">
      <label for="std_id">Student ID</label><br>
      <input type="text" name="std_id" id="std_id"><br>
      <label for="stu_pass">Password</label><br>
      <input type="password" name="stu_pass" id="stu_pass"><br><br>
      <input type="submit" value="Sign In">
      <input type="reset" value="Reset">
    </form>
    </div></div>
</body>
</html>