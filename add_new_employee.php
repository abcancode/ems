<?php 

require 'conn.php';
session_start();


if( !$_SESSION['u_name']){
    header('Location: login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | EMS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <!-- nav -->

    <?php require 'nav.php'; ?>

    <!-- nav -->

    <!-- main content -->

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Employees</div>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="add_new_employee.php">Add New Employee</a></li>
                        <li class="list-group-item"><a href="dash.php">View All Employees</a></li>
                    </ul>
                </div>            
            </div>
            <div class="col-lg-9 col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Employee</div>
                    <div class="panel-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control input-sm" name="e_name" placeholder="Employee Name" required>                                
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control input-sm" name="e_email" placeholder="Employee Email" required>                                
                            </div>
                            <div class="form-group">
                                <input type="tel" class="form-control input-sm" name="e_phone" placeholder="Employee Phone Number" required>                                
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-sm btn-success" value="Add Employee" name="e_add">                               
                            </div>
                        </form>
                    </div>                    
                </div>                        
            </div>
        </div>
    </div>

    <!-- main content -->

    <?php

    if(isset($_POST['e_add'])){

        $e_name = $_POST['e_name'];
        $e_email = $_POST['e_email'];
        $e_phone = $_POST['e_phone'];
        
        $sql = "INSERT INTO employees (e_name, e_email, e_phone) VALUES( '$e_name', '$e_email', '$e_phone')";
    
        if (mysqli_query($conn, $sql) ){
            header('Location: dash.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    ?>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>