<?php
include  "dbconnect.php";

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
       if($username == "" || $password == ""){
           echo "<h2 style='color: red'>The input field must not be blank</h2>";
           return;
       }else{
           $query = "INSERT INTO mydb.login (username, password) values ('$username','$password')";
           $result = mysqli_query($con, $query);
           if($result){
               echo "<h3 style='color: aqua'>Login Successful</h3>";
               return;
           }
       }
    }
  /*
   * Query to retrieve User From Database and Display it on a table
   */
 $query1 = "SELECT * FROM mydb.login";
 $query_result = mysqli_query($con, $query1);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
                <input type="submit" name="submit" class="btn btn-primary" value="Login">
            </form>
        </div>
        <div class="col-sm-6">
        <table class="table-responsive table">
            <thead>
            <tr>
                <th>ID</th>
                <th>User Name</th>
                <th>Password</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php while ($row = mysqli_fetch_assoc($query_result)) :?>
                <td><?php ?></td>
              <?php endwhile; ?>
            </tr>
            </tbody>
        </table>
        </div>
    </div>
</div>
</body>
</html>
