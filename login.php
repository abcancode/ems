<?php  

require 'conn.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | EMS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

</head>
<body>
    
    <!-- login -->
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-lg-push-4 col-md-push-4">
                <div class="panel panel-default" style="margin-top: 50px;">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control input-sm" name="u_name" required placeholder="Username" style="margin-top: 10px;">
                                <input type="password" class="form-control input-sm" name="u_pass" required placeholder="Password" style="margin-top: 10px;">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success btn-sm" name="u_login" value="Login as Admin">
                                <a href="register.php" class="btn btn-info btn-sm">Register</a>
                            </div>                        
                        </form>
                    </div>
                </div>
            </div>
        </div>    
    </div>
    <!--login-->

    
    <?php

    
    if (isset($_POST['u_login'])){

        $u_name = $_POST['u_name'];
        $u_pass = md5($_POST['u_pass']);
        
        $sql = "SELECT * FROM users WHERE u_name='$u_name'";
        $result =mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0) {
            
            while($user = mysqli_fetch_assoc($result)){
                if($u_name == $user['u_name'] && $u_pass == $user['u_pass']){
                    $_SESSION['u_name'] = $u_name;
                    header('Location: dash.php');
                }else {
                    echo "<script>alert('Incorrect Username or Password');</script>";
                }
            }
        } else {
            echo "0 results";
        }

    }
    
    ?>
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>